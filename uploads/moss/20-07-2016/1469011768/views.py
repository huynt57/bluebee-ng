from django.shortcuts import render, render_to_response
from django.http import HttpResponse, HttpResponseRedirect, Http404
from django.template import RequestContext
from django.core.urlresolvers import reverse
from django.contrib.auth.decorators import login_required
import forms
import constants
from tournament_libs import helpers
from tournament_libs import esports_manager
from common.logger import log
from datetime import datetime
from tournament_libs import json_schemas
from common.jsonutils import from_json, to_json
import base64
from tournament_libs.helpers import view_error_page
from django.conf import settings

# Create your views here.

@login_required
@view_error_page
def manage_tournaments(request):
	tournaments = esports_manager.get_all_sorted_tournaments()
	hidden_tournaments = esports_manager.get_all_hidden_tournaments()
	create_perm, arrange_perm = helpers.get_manage_tournament_permission()
	return render_to_response('manage_tournaments.html', locals(),
							  context_instance=RequestContext(request))
@login_required
@view_error_page
def tournament_profile(request, id):
	tournament  = esports_manager.get_tournament(id)
	update_perm, manage_schedule_perm, archive_perm = helpers.get_tournament_profile_permission()
	return render_to_response('tournament_profile.html', locals(),
							  context_instance=RequestContext(request))
@login_required
@view_error_page
def create_tournament(request):
	form = forms.TournamentCreateForm()
	return render_to_response('create_tournament.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def create_tournament_submit(request):
	if request.method == 'POST':
		form = forms.TournamentCreateForm(request.POST, request.FILES)
		if form.is_valid():
			name = form.cleaned_data['name']
			suffix = form.cleaned_data['suffix']
			description = form.cleaned_data['description']

			icon = request.FILES['icon']
			icon_url = helpers.upload_icon(constants.ADMIN_UID, icon)
			banner = request.FILES.get('banner', None)
			banner_url = helpers.upload_image(constants.ADMIN_UID, banner) if banner else None
			leaderboard = request.FILES.get('leaderboard', None)
			leaderboard_url = helpers.upload_image(constants.ADMIN_UID, leaderboard) if leaderboard else None

			esports_manager.create_tournament(name=name, suffix=suffix, description=description,
											 icon=icon_url, banner=banner_url, leaderboard=leaderboard_url)
			return HttpResponseRedirect(reverse(manage_tournaments))

	return render_to_response('create_tournament.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def archive_tournament(request, id):
	esports_manager.update_tournament(tournament_id=id, status=2)
	return HttpResponseRedirect(reverse(manage_tournaments))

@login_required
@view_error_page
def update_tournament(request, id):
	form = forms.TournamentUpdateForm()
	tournament = esports_manager.get_tournament(id)
	return render_to_response('update_tournament.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def update_tournament_submit(request, id):
	if request.method == "POST":
		form = forms.TournamentUpdateForm(request.POST, request.FILES)
		if form.is_valid():
			name = form.cleaned_data['name']
			suffix = form.cleaned_data['suffix']
			description = form.cleaned_data['description']
			icon = request.FILES.get('icon', None)
			banner = request.FILES.get('banner', None)
			leaderboard = request.FILES.get('leaderboard', None)
			icon_url = helpers.upload_icon(constants.ADMIN_UID, icon) if icon else None
			banner_url = helpers.upload_image(constants.ADMIN_UID, banner) if banner else None
			leaderboard_url = helpers.upload_image(constants.ADMIN_UID, leaderboard) if leaderboard else None
			esports_manager.update_tournament(tournament_id=id, name=name, suffix=suffix, description=description, icon=icon_url, banner=banner_url, leaderboard=leaderboard_url)
			return HttpResponseRedirect(reverse(tournament_profile, args=(id,)))

	return render_to_response('update_tournament.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def arrange_tournaments(request):
	tournaments = esports_manager.get_all_sorted_tournaments()
	return render_to_response('arrange_tournaments.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def reorder_tournaments(request):
	if request.method == "POST":
		form = forms.TournamentReorderForm(request.POST)
		if form.is_valid():
			order = form.cleaned_data['order']
			tournament_orders = order.split(',')
			order_dict = {index + 1: id for index, id in enumerate(tournament_orders)}
			for rank, id in order_dict.iteritems():
				tournament = esports_manager.get_tournament(id)
				esports_manager.update_tournament(tournament_id=tournament['id'], rank=rank)
			return HttpResponseRedirect(reverse(manage_tournaments))

	return HttpResponseRedirect(reverse(arrange_tournaments))

@login_required
@view_error_page
def tournament_teams(request, id):
	tournament = esports_manager.get_tournament(id)
	other_teams = esports_manager.get_teams_info_not_in_tournament(id)
	other_teams = sorted(other_teams, key=lambda team:team['name'])
	my_teams = esports_manager.get_teams_info_in_tournament(id)
	my_teams = sorted(my_teams, key=lambda team:team['name'])
	return render_to_response('tournament_teams.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def change_tournament_teams(request):
	if request.method == "POST":
		my_teams = request.POST.getlist('my_teams')
		id = int(request.POST.get('tournament_id'))
		my_teams = [int(team) for team in my_teams]
		esports_manager.change_teams_in_tournament(tournament_id=id, team_ids=my_teams)
		return HttpResponseRedirect(reverse(tournament_profile, args=(id,)))
	return HttpResponseRedirect(reverse(manage_tournaments))

@login_required
@view_error_page
def change_tournament_leader_board_ajx(request):
	if request.method == "POST":
		try:
			status = request.POST.get('status', '')
			id = int(request.POST.get('tournament_id'))
			if not status or status not in settings.LEADER_BOARD_STATUS_MAP:
				return HttpResponse('invalid_status', status=404)
			flag = settings.LEADER_BOARD_STATUS_MAP[status]
			esports_manager.update_tournament(tournament_id=id, flag=flag)
		except Exception as ex:
			return HttpResponse(ex.message, status=404)
		return HttpResponse('ok')
	return HttpResponse('ok')

@login_required
@view_error_page
def change_tournament_status_ajax(request):
	if request.method == "POST":
		try:
			status = request.POST.get('status', '')
			id = int(request.POST.get('tournament_id'))
			if not status or status not in settings.TOURNAMENT_STATUS_MAP:
				return HttpResponse('invalid_status', status=404)
			status = settings.TOURNAMENT_STATUS_MAP[status]
			print 'id, status', id, status
			esports_manager.update_tournament(tournament_id=id, status=status)
		except Exception as ex:
			return HttpResponse(ex.message, status=404)
		return HttpResponse('ok')
	return HttpResponse('ok')

@login_required
@view_error_page
def manage_teams(request):
	teams = esports_manager.get_all_teams()
	teams = sorted(teams, key=lambda team: team['name'].lower())
	create_perm = helpers.get_manage_team_permission()
	return render_to_response('manage_teams.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def create_team(request):
	form = forms.TeamCreateForm()
	return render_to_response('create_team.html', locals(),
							  context_instance=RequestContext(request))


@login_required
@view_error_page
def create_team_submit(request):
	if request.method == 'POST':
		form = forms.TeamCreateForm(request.POST, request.FILES)
		if form.is_valid():
			name = form.cleaned_data['name']
			description = form.cleaned_data['description']
			icon = request.FILES['icon']
			country = form.cleaned_data['country']
			members = request.POST.getlist('member_name')

			new_url = helpers.upload_icon(constants.ADMIN_UID, icon)
			esports_manager.create_team(name=name, description=description, icon=new_url, country=country,  members=members)

			return HttpResponseRedirect(reverse(manage_teams))
	return render_to_response('create_team.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def update_team(request,id):
	form = forms.TeamUpdateForm()
	team = esports_manager.get_team(id)
	team_len = 0
	if 'extra_data' in team and 'members' in team['extra_data']:
		team_len = len(team['extra_data']['members'])
	return render_to_response('update_team.html', locals(),
							  context_instance=RequestContext(request))


@login_required
@view_error_page
def update_team_submit(request, id):
	if request.method == 'POST':
		form = forms.TeamUpdateForm(request.POST, request.FILES)
		if form.is_valid():
			name = form.cleaned_data['name']
			description = form.cleaned_data['description']
			country = form.cleaned_data['country']
			icon = request.FILES.get('icon', None)
			members = request.POST.getlist('member_name')
			new_url = helpers.upload_icon(constants.ADMIN_UID, icon) if icon else None

			esports_manager.update_team(team_id=id, name=name, description=description, icon=new_url, country=country, members=members)
	return HttpResponseRedirect(reverse(team_profile, args=(id,)))

@login_required
@view_error_page
def team_profile(request, id):
	team = esports_manager.get_team(id)
	team_len = 0
	if 'extra_data' in team and 'members' in team['extra_data']:
		team_len = len(team['extra_data']['members'])
	update_perm = helpers.get_team_profile_permission()
	return render_to_response("team_profile.html", locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def manage_match_by_tournament(request, tournament_id):
	country_code = settings.COUNTRY_CODE
	last_match_timestamp, last_match_date = esports_manager.get_latest_match_in_tournament(tournament_id, country_code)
	create_perm = helpers.get_manage_match_permission()

	return render_to_response('manage_match_by_tournament.html', locals(),
							  context_instance=RequestContext(request))


@login_required
@view_error_page
def manage_match_by_tournament_ajax(request, tournament_id, pre_last_match_timestamp, pre_last_match_date):
	country_code = settings.COUNTRY_CODE
	match_calendar, last_match_date, last_match_timestamp = esports_manager.get_tournament_all_matches(tournament_id, country_code)
	anchor_date = esports_manager.get_anchor_date(match_calendar, country_code)
	return render_to_response('manage_match_by_tournament_ajax.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def create_match(request, tournament_id):
	tournament = esports_manager.get_tournament(tournament_id)
	tournament_teams = esports_manager.get_teams_info_in_tournament(tournament_id)
	team_sequence = ['1', '2', '3', '4', '5']
	match_teams = ['team-a-name', 'team-b-name']
	return render_to_response('create_match.html', locals(),
							  context_instance=RequestContext(request))

@login_required
@view_error_page
def create_match_submit(request):
	if request.method == 'POST':
		try:
			match_result = request.POST.get('match_result')
			match_result = from_json(match_result)

			team_a_id, team_b_id, match_timestamp = esports_manager.validate_match_result(match_result)
			tournament_id = match_result['tournament_id']
			match_data = to_json(match_result['match_data'])

			esports_manager.create_match(tournament_id=tournament_id, team_a_id=team_a_id, team_b_id=team_b_id, match_timestamp=match_timestamp, match_data=match_data)
		except Exception as ex:
			return HttpResponse(ex.message, status=404)

		return HttpResponseRedirect(reverse(manage_match_by_tournament, args=(tournament_id,)))

	return render_to_response('create_match.html', locals(),
							  context_instance=(RequestContext(request)))

@login_required
@view_error_page
def match_profile(request, match_id):
	country_code = settings.COUNTRY_CODE
	match_info = esports_manager.get_match(match_id, country_code)

	match_data= match_info['match_data']
	tournament = esports_manager.get_tournament(match_info['tournament_id'])
	team_a = esports_manager.get_team(match_info['team_a_id'])
	team_b = esports_manager.get_team(match_info['team_b_id'])
	#schedule_datetime is utc timestamp
	match_datetime = esports_manager.timestamp_to_datetime(match_info['match_timestamp'], country_code).strftime("%Y-%m-%d %H:%M:%S")
	tournament_teams = esports_manager.get_teams_info_in_tournament(tournament['id'])
	team_sequence = ['1', '2', '3', '4', '5']
	new_round_num = len(match_data['match_body']) + 1
	match_data = esports_manager.parse_lol_icons(match_data)
	return render_to_response('match_profile.html', locals(),
							  context_instance=(RequestContext(request)))

@login_required
@view_error_page
def update_match(request, match_id):
	country_code = settings.COUNTRY_CODE
	match_info = esports_manager.get_match(match_id, country_code)

	match_data = match_info['match_data']
	tournament = esports_manager.get_tournament(match_info['tournament_id'])
	team_a = esports_manager.get_team(match_info['team_a_id'])
	team_b = esports_manager.get_team(match_info['team_b_id'])
	#match_datetime is utc timestamp
	match_datetime = esports_manager.timestamp_to_datetime(match_info['match_timestamp'], country_code).strftime("%Y-%m-%d %H:%M:%S")
	tournament_teams = esports_manager.get_teams_info_in_tournament(tournament['id'])
	tournament_id = match_info['tournament_id']
	new_round_num = len(match_data['match_body']) + 1
	team_sequence = ['1', '2', '3', '4', '5']
	match_teams = ['team-a-name', 'team-b-name']
	match_data = esports_manager.parse_lol_icons(match_data)
	return render_to_response('update_match.html', locals(),
							  context_instance=(RequestContext(request)))

@login_required
@view_error_page
def update_match_submit(request):
	if request.method == 'POST':
		match_result = request.POST.get('match_result')
		match_result = from_json(match_result)

		team_a_id, team_b_id, match_timestamp = esports_manager.validate_match_result(match_result)
		match_id = match_result['match_id']
		tournament_id = match_result['tournament_id']
		match_data = to_json(match_result['match_data'])

		esports_manager.update_match(match_id=match_id, team_a_id=team_a_id, team_b_id=team_b_id, match_timestamp=match_timestamp, match_data=match_data, tournament_id=tournament_id)
		return HttpResponseRedirect(reverse(match_profile, args=(match_id,)))

	return render_to_response('update_match.html', locals(),
							  context_instance=(RequestContext(request)))

@login_required
@view_error_page
def manage_score_board(request):
	lol_realm = esports_manager.get_lol_realm()
	return HttpResponse(lol_realm)

@login_required
@view_error_page
def get_lol_realm(request):
	lol_realm = esports_manager.get_lol_realm()
	return HttpResponse(lol_realm)

@login_required
@view_error_page
def get_team_members(request, team_id):
	team = esports_manager.get_team(team_id)
	members = []
	if 'extra_data' in team:
		if 'members' in team['extra_data']:
			members = team['extra_data']['members']
	members = to_json(members)
	return HttpResponse(members)


