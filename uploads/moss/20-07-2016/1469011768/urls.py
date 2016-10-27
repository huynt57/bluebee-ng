from django.conf.urls import patterns

urlpatterns = patterns('',
	(r'^manage_tournaments/$', 'esports.views.manage_tournaments'),
	(r'^tournament_profile/([0-9]+)/$', 'esports.views.tournament_profile'),
	(r'^create_tournament/$', 'esports.views.create_tournament'),
	(r'^create_tournament_submit/$', 'esports.views.create_tournament_submit'),
	(r'^update_tournament/([0-9]+)/$', 'esports.views.update_tournament'),
	(r'^update_tournament_submit/([0-9]+)/$', 'esports.views.update_tournament_submit'),
	(r'^reorder_tournaments/$', 'esports.views.reorder_tournaments'),
    (r'^arrange_tournaments/$', 'esports.views.arrange_tournaments'),
	(r'^tournament_teams/([0-9]+)/$', 'esports.views.tournament_teams'),
	(r'^change_tournament_teams/$', 'esports.views.change_tournament_teams'),
    (r'^archive_tournament/([0-9]+)/$', 'esports.views.archive_tournament'),
    (r'^change_tournament_leader_board_ajax/$', 'esports.views.change_tournament_leader_board_ajx'),
    (r'^change_tournament_status_ajax/$', 'esports.views.change_tournament_status_ajax'),

	(r'^manage_teams/$', 'esports.views.manage_teams'),
	(r'^create_team/$', 'esports.views.create_team'),
	(r'^create_team_submit/$', 'esports.views.create_team_submit'),
	(r'^update_team/([0-9]+)/$', 'esports.views.update_team'),
	(r'^update_team_submit/([0-9]+)/$', 'esports.views.update_team_submit'),
    (r'^team_profile/([0-9]+)/$', 'esports.views.team_profile'),

	(r'^manage_match_by_tournament/([0-9]+)/$', 'esports.views.manage_match_by_tournament'),
	(r'^manage_match_by_tournament_ajax/([0-9]+)/([0-9]+)/([0-9]+)/$', 'esports.views.manage_match_by_tournament_ajax'),
	(r'^create_match/([0-9]+)/$', 'esports.views.create_match'),
	(r'^create_match_submit/$', 'esports.views.create_match_submit'),
	(r'^match_profile/([0-9]+)/$', 'esports.views.match_profile'),
	(r'^update_match/([0-9]+)/$', 'esports.views.update_match'),
	(r'^update_match_submit/$', 'esports.views.update_match_submit'),


	(r'^manage_score_board/$', 'esports.views.manage_score_board'),
	(r'^get_lol_realm/$', 'esports.views.get_lol_realm'),
	(r'^get_team_members/([0-9]+)/$', 'esports.views.get_team_members')
)