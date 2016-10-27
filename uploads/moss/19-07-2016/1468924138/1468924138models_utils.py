'''
Created on 28 Aug, 2014

@author:  Matthew Garena
'''
from django.db.models.signals import pre_delete
from django.dispatch import receiver
from .models import *
from common.dbcache import DBCache

def myfilter(**argument):
	'''
		skip argument if it's none
	'''
	pop_list = []
	for k, v in argument.items():
		if v is None:
			pop_list.append(k)
	for k in pop_list:
		argument.pop(k, None)
	return argument

# ----- Cache -------


class AppCache(DBCache):
	TABLE = app_model
	get_app_by_id = DBCache.generate_get_one_method(lambda args, entry: entry.app_id == args[0])
	get_app_by_name = DBCache.generate_get_one_method(lambda args, entry: entry.app_name == args[0])

	def get_all_app(self):
		#Get all
		return self._get_data(lambda d: True)

django_app_cache = AppCache()


class ListCache(DBCache):
	TABLE = list_model
	get_list_by_appid = DBCache.generate_get_method(lambda args, entry: entry.app_id_id == args[0]) #Parameters: app_id
	get_list_by_listid = DBCache.generate_get_one_method(lambda args, entry: entry.list_id == args[0]) #Parameters: list_id
	get_list_by_appid_listname = DBCache.generate_get_one_method(lambda args, entry: entry.app_id_id == args[0] and\
																					entry.list_name == args[1]) #Parameters: app_id, list_name
	def get_all_list(self):
		return self._get_data(lambda d: True)

django_list_cache = ListCache()


class ContentCache(DBCache):
	TIMEOUT = 30
	TABLE = content_model
	get_content_by_listid = DBCache.generate_get_method(lambda args, entry: entry.list_id_id == args[0]) #Parameters: list_id
	get_content_by_listid_typeid = DBCache.generate_get_method(lambda args, entry: entry.list_id_id == args[0] and
																				entry.type == args[1])  # Parameters: list_id, type_id
	def get_all_content(self):
		return self._get_data(lambda d: True)

django_content_cache = ContentCache()


class TemplateCache(DBCache):
	TABLE = template_model
	get_template_by_appid = DBCache.generate_get_method(lambda args, entry: entry.app_id_id == args[0]) #Parameters: app_id
	get_template_by_id = DBCache.generate_get_one_method(lambda args, entry: entry.template_id == args[0]) #Parameters: template_id
	def get_all_template(self):
		return self._get_data(lambda d: True)

django_template_cache = TemplateCache()

@receiver(pre_delete, sender=list_model)
def _my_list_model_delete_handle(sender, instance, **kwargs):
	delete_permission_group(instance.app_id.app_name, instance.list_name, perm_type='list')


@receiver(pre_delete, sender=app_model)
def _my_app_model_delete_handle(sender, instance, **kwargs):
	delete_permission_group(instance.app_name, '', perm_type='template')