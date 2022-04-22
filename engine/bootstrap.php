<?php

// ToDo composer autoload 
require_once __DIR__ . '/../vendor/autoload.php';
use Engine\DI\DI;
use App\App;

try {

	// Dependency injaction
	$di = new DI();

	// test 
	$di->set('test1', ['db' => 'db_object']);
	$di->set('test2', ['mail' => 'mail_object']);
	
	// --- 

	$app = new App($di);
	$app->run();


} catch (\ErrorException $e) {
	echo $e->getMassage();
}