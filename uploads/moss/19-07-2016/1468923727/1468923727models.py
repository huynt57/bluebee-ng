'''
Created on 15 Aug, 2014

@author:  Matthew Garena
'''
import json
import random

from django.db import models
from django.contrib.auth.models import Group
import time


# format = {model}_{app_name}__{list_name}_group
# prefix using for recheck, so split it from string
app_prefix = '%s_al_%s__'
list_prefix = '%s_al_%s__%s_'
template_prefix = '%s_tp_%s_%s_template'

# auto_create_app_perm = (app_prefix % ('view', '%d'), + 'group',
#                         app_prefix % ('edit', '%d'), + 'group', )

auto_create_list_perm = (list_prefix % ('view', '%d', '%d') + 'group',
							list_prefix % ('edit', '%d', '%d') + 'group', )

auto_create_template_perm = (template_prefix % ('view', '%d', '%d'),
								template_prefix % ('edit', '%d', '%d'), )

def json_loads(s):
	try:
		return json.loads(s)
	except Exception as ex:
		return {}

APP_PERM_ID = 0
TEMPLATE_PERM_ID = -1
_EXTRA_DATA_STATE_ORIGINAL_ = 1
_EXTRA_DATA_STATE_STRING_ = 2
_EXTRA_DATA_STATE_DICT_ = 3

class ModelWithExtraData(models.Model):
	_extra_data_string = ''
	_extra_data_dict = {}
	_extra_data_state = _EXTRA_DATA_STATE_ORIGINAL_

	# Note: we do overriding instead of registering for the pre_save signal because the latter will be called for
	# every model, but we only want to process the ModelWithExtraData.
	def save(self, *args, **kwargs):
		if self.__dict__.has_key('extra_data'):
			self.__dict__['extra_data'] = self.extra_data_string
		super(ModelWithExtraData, self).save(*args, **kwargs)

	# Do not use this because it is called for every model.
	# @receiver(pre_save)
	# def pre_save(sender, instance, **kwargs):
	# 	if hasattr(instance, 'extra_data') and hasattr(instance, '_extra_data_string'):
	# 		instance.extra_data = instance.extra_data_string

	@property
	def extra_data_string(self):
		if self._extra_data_state != _EXTRA_DATA_STATE_STRING_:
			if self._extra_data_state == _EXTRA_DATA_STATE_DICT_:
				self._extra_data_string = json.dumps(self._extra_data_dict)
			elif self._extra_data_state == _EXTRA_DATA_STATE_ORIGINAL_:
				self._extra_data_string = self.__dict__['extra_data'] or ''
			else:
				self._extra_data_string = ''
		self._extra_data_state = _EXTRA_DATA_STATE_STRING_
		self._extra_data_dict = {}
		self.__dict__['extra_data'] = ''
		return self._extra_data_string
	@extra_data_string.setter
	def extra_data_string(self, value):
		if value is None:
			value = ''
		self._extra_data_state = _EXTRA_DATA_STATE_STRING_
		self._extra_data_dict = {}
		self.__dict__['extra_data'] = ''
		self._extra_data_string = value

	@property
	def extra_data_dict(self):
		if self._extra_data_state != _EXTRA_DATA_STATE_DICT_:
			if self._extra_data_state == _EXTRA_DATA_STATE_STRING_:
				self._extra_data_dict = json_loads(self._extra_data_string or '{}')
			elif self._extra_data_state == _EXTRA_DATA_STATE_ORIGINAL_:
				self._extra_data_dict = json_loads(self.__dict__['extra_data'] or '{}')
			else:
				self._extra_data_dict = {}
		self._extra_data_string = ''
		self.__dict__['extra_data'] = ''
		self._extra_data_state = _EXTRA_DATA_STATE_DICT_
		return self._extra_data_dict
	@extra_data_dict.setter
	def extra_data_dict(self, value):
		if value is None:
			value = {}
		self._extra_data_state = _EXTRA_DATA_STATE_DICT_
		self._extra_data_string = ''
		self.__dict__['extra_data'] = ''
		self._extra_data_dict = value

	@property
	def extra_data(self):
		self.__dict__['extra_data'] = self.extra_data_string
		self._extra_data_dict = {}
		self._extra_data_string = ''
		self._extra_data_state = _EXTRA_DATA_STATE_ORIGINAL_
		return self.__dict__['extra_data']

	@extra_data.setter
	def extra_data(self, value):
		if value is None:
			value = ''
		self._extra_data_state = _EXTRA_DATA_STATE_ORIGINAL_
		self._extra_data_dict = {}
		self._extra_data_string = ''
		self.__dict__['extra_data'] = value

	class Meta:
		abstract = True

def init_perm_loop_group(perm_type):
	loopgroup = []
	if perm_type == 'list':
		loopgroup = auto_create_list_perm
	elif perm_type == 'template':
		loopgroup = auto_create_template_perm
	return loopgroup


def init_permission_group(app_id, list_id, perm_type='list'):
	loopgroup = init_perm_loop_group(perm_type)
	for perm in loopgroup:
		try:
			new_group = Group(name=perm % (app_id, list_id))
			new_group.save()
		except Exception:
			pass


def delete_permission_group(app_id, list_id, perm_type='list'):
	loopgroup = init_perm_loop_group(perm_type)
	for perm in loopgroup:
		try:
			need_del_group = Group.objects.get(name=perm % (app_id, list_id))
			need_del_group.delete()
		except Exception:
			pass


class app_model(ModelWithExtraData):
	app_id = models.AutoField(primary_key=True)
	app_name = models.CharField(max_length=128)
	app_desc = models.CharField(max_length=256, default="", null="", blank=True)
	create_time = models.PositiveIntegerField(editable=False)
	update_time = models.PositiveIntegerField(editable=False)
	extra_data = models.TextField(default="", null="", blank=True)

	def save(self):
		if not self.app_id:
			self.create_time = int(time.time())
			# add permission
			# init template permission
			init_permission_group(self.app_id, TEMPLATE_PERM_ID, perm_type='template')
		self.update_time = int(time.time())
		super(app_model, self).save()

	class Meta:
		# managed = False
		db_table = 'app_tab'

	def __unicode__(self):
		return self.app_name

class template_model(models.Model):
	template_id = models.AutoField(primary_key=True)
	app_id = models.ForeignKey(app_model, db_column="app_id")
	template_name = models.CharField(max_length=128)
	content = models.TextField()
	create_time = models.PositiveIntegerField(editable=False)
	update_time = models.PositiveIntegerField(editable=False)
	extra_data = models.TextField(default="", null="", blank=True)

	def save(self):
		if not self.template_id:
			self.create_time = int(time.time())
		self.update_time = int(time.time())
		super(template_model, self).save()

	class Meta:
		# managed = False
		db_table = 'template_tab'

	def __unicode__(self):
		return self.template_name


class list_model(ModelWithExtraData):
	list_id = models.AutoField(primary_key=True)
	app_id = models.ForeignKey(app_model, db_column="app_id")
	list_name = models.CharField(max_length=128)
	base_url = models.CharField(max_length=256, default="", null="", blank=True)
	ftp_path = models.CharField(max_length=256, default="", null="", blank=True)
	default_template = models.ForeignKey(template_model, db_column="template", default=1, blank=True)
	create_time = models.PositiveIntegerField(editable=False)
	update_time = models.PositiveIntegerField(editable=False)
	extra_data = models.TextField(default="", null="", blank=True)

	read_db_connection = 'ccms_db'
	write_db_connection = 'ccms_db'
	contents = []

	def save(self):
		need_add_perm = False
		if not self.list_id:
			# new list
			self.create_time = int(time.time())
			# add permission
			need_add_perm = True

		self.update_time = int(time.time())
		super(list_model, self).save()
		if need_add_perm:
			init_permission_group(self.app_id.app_id, self.list_id, perm_type='list')

	class Meta:
		# managed = False
		db_table = 'list_tab'

	def __unicode__(self):
		return self.list_name


def get_next_autoincrement(mymodel):
	last_index = mymodel.objects.all().order_by("-content_id")[0]
	if last_index:
		return last_index.content_id + 1
	return random.randint(1000, 1000000)


class content_model(models.Model):
	content_id = models.AutoField(primary_key=True)
	list_id = models.ForeignKey(list_model, db_column="list_id")
	file_name = models.CharField(max_length=128, default="", null="", blank=True)
	type = models.PositiveIntegerField()
	title = models.CharField(max_length=256)
	visible = models.PositiveIntegerField()
	flag = models.PositiveIntegerField(default=0, null=0, blank=True)
	image = models.CharField(max_length=256, default="", null="", blank=True)
	link = models.CharField(max_length=256)
	id = models.CharField(max_length=256, default="", null="", blank=True)
	content = models.TextField()
	create_time = models.PositiveIntegerField(editable=False)
	update_time = models.PositiveIntegerField(editable=False)
	extra_data = models.TextField(default="", null="", blank=True)

	def save(self):
		if not self.content_id:
			self.create_time = int(time.time())
		self.update_time = int(time.time())
		super(content_model, self).save()

	class Meta:
		# managed = False
		db_table = 'content_tab'

	def __unicode__(self):
		return self.file_name


class job_model(ModelWithExtraData):
	id = models.AutoField(primary_key=True)
	source_id = models.CharField(max_length=128)
	type = models.PositiveIntegerField()
	status = models.PositiveIntegerField()
	create_time = models.PositiveIntegerField()
	update_time = models.PositiveIntegerField()
	execute_time = models.PositiveIntegerField()
	finish_time = models.PositiveIntegerField(default=0, null=0, blank=True)
	extra_data = models.TextField()

	def save(self):
		if not self.id:
			self.create_time = int(time.time())
		self.update_time = int(time.time())
		super(job_model, self).save()

	class Meta:
		# managed = False
		db_table = 'job_tab'

	def __unicode__(self):
		return self.id
