<?php

return array(
	'news/([0-9]+)' => 'news/view/$1',
	
	'fighters/page-([0-9]+)' => 'fighters/index/$1',
	'fighters_search' => 'search/fighters',
	'fighters' => 'fighters/index',
	'fighters/([0-9]+)' => 'fighters/view/$1',

	
	'register' => 'user/register',
	'login' => 'user/login',
	'logout' => 'user/logout',
	'restore' => 'user/restore',
	'cabinet/edit' => 'cabinet/edit',
	'cabinet' => 'cabinet/index',
	
	'search' => 'search/index',

	'admin/news/delete/([0-9]+)' => 'adminNews/destroy/$1',
	'admin/news/edit/([0-9]+)' => 'adminNews/edit/$1',
	'admin/news/create' => 'adminNews/create',
	'admin/news' => 'adminNews/index',


	'admin/fighters/delete/([0-9]+)' => 'adminFighters/destroy/$1',
	'admin/fighters/edit/([0-9]+)' => 'adminFighters/edit/$1',
	'admin/fighters/create' => 'adminFighters/create',
	'admin/fighters' => 'adminFighters/index',

	'admin' => 'admin/index',
	
	
	'search/page-([0-9]+)' => 'search/index/$1',
	'page-([0-9]+)' => 'site/index/$1',
	'' => 'site/index',
);