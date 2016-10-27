'''
Created on 28 Aug, 2014

@author:  Matthew Garena
'''
from common.jsonutils import from_json_safe
from .models_utils import django_app_cache, django_list_cache, django_content_cache, django_template_cache, myfilter
from .models import *


def get_app(app_id):
	app_id = int(app_id)
	return app_model.objects.get(app_id=app_id)

def get_app_by_name(app_name):
	apps = app_model.objects.filter(app_name=app_name)
	if apps:
		return apps[0]
	else:
		return None

def get_all_app():
	return app_model.objects.all()


def get_list(app_id=None, list_id=None):
	if app_id is not None:
		app_id = int(app_id)
		ret_list = list_model.objects.filter(app_id_id=app_id)
		for l in ret_list:
			l.ext = from_json_safe(l.extra_data)
		return ret_list
	elif list_id is not None:
		list_id = int(list_id)
		ret_list = list_model.objects.filter(list_id=list_id)
		for l in ret_list:
			l.ext = from_json_safe(l.extra_data)
		return ret_list
	else:
		return []


def get_all_list():
	return list_model.objects.all()


def get_contents(list_id, use_cache=False):
	list_id = int(list_id)
	if not use_cache:
		return content_model.objects.filter(list_id_id=list_id)
	else:
		return django_content_cache.get_content_by_listid(list_id)


def get_all_content():
	return content_model.objects.all()


def get_contents_filter_by_type(list_id, type_id):
	list_id = int(list_id)
	type_id = int(type_id)
	return content_model.objects.filter(list_id_id=list_id, type=type_id)


def get_content_by_id(content_id):
	content_id = int(content_id)
	return content_model.objects.get(content_id=content_id)


def get_contents_by_name(app_name, list_name):
	# get app_id by app_name
	app = app_model.objects.filter(app_name=app_name)
	if app is None or len(app) == 0:
		return [], -1, None
	else:
		app_id = app[0].app_id

	# get list_id by app_id, list_name
	cmslist = list_model.objects.filter(**myfilter(app_id_id=app_id, list_name=list_name))
	if cmslist is None or len(cmslist) == 0:
		return [], -1, None
	else:
		list_id = cmslist[0].list_id

	# return by content_id
	return get_contents(list_id), cmslist[0].list_name, cmslist[0]


def get_all_templates():
	return template_model.objects.all()


def get_templates(app_id):
	app_id = int(app_id)
	return template_model.objects.filter(app_id_id=app_id)


def get_template_by_id(template_id):
	template_id = int(template_id)
	return template_model.objects.get(template_id=template_id)


def clear_content_cache():
	django_content_cache.clear_cache()


def clear_template_cache():
	django_template_cache.clear_cache()