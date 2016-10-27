"""
Created on 25 Aug, 2014

@author:  Matthew Garena
"""

class ContentType(object):

	WEB_PAGE = 1
	TEXT = 2
	IMAGE = 3
	LINK = 4
	HTML = 5
	JSON = 6
	TEMPLATE = 9

	VALUE_TO_NAME = dict((v,k) for k,v in locals().items() if not k.startswith('_'))
	NAME_TO_VALUE = dict((value,key) for key,value in VALUE_TO_NAME.items())


class VisibleType(object):

	INVISIBLE = 0
	VISIBLE = 1

	VALUE_TO_NAME = dict((v,k) for k,v in locals().items() if not k.startswith('_'))
	NAME_TO_VALUE = dict((value,key) for key,value in VALUE_TO_NAME.items())


class JobType(object):

	FUTURE_UPDATE = 0

	VALUE_TO_NAME = dict((v,k) for k,v in locals().items() if not k.startswith('_'))
	NAME_TO_VALUE = dict((value,key) for key,value in VALUE_TO_NAME.items())

class JobStatus(object):

	WAITING = 0
	FINISHED = 1

	VALUE_TO_NAME = dict((v,k) for k,v in locals().items() if not k.startswith('_'))
	NAME_TO_VALUE = dict((value,key) for key,value in VALUE_TO_NAME.items())


