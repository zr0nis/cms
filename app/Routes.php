<?php


$this->router->add('home',		'/',								'HomeController:index');
$this->router->add('news_main', '/news/',							'HomeController:news_main');
$this->router->add('news',		'/news/(id:int)/',					'HomeController:news');
$this->router->add('user',		'/user/(id:int)/(username:str)/',	'HomeController:user');
