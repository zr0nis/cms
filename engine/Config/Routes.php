<?php

return [
	'host' => 'http://cms.zro/', 
	'routes' => [
		'home' => [
			'pattern' => '/', 
			'controller' => 'HomeController:index'
		],
		'admin' => [
			'pattern' => '/admin', 
			'controller' => 'AdminController:index'
		],
		'admin_login' => [
			'pattern' => '/admin/login', 
			'controller' => 'LoginController:form'
		],
		'test' => [
			'pattern' => '/test/(int:id)/', 
			'controller' => 'HomeController:test'
		]

	]
];

