<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use App\App;
use Engine\DI\DI;


try {

	// Dependency injaction
	$di = new DI();

	// test 
	$di->set('test1', ['db' => 'db_object', 'db_table' => 'table']);
	$di->set('test2', ['mail' => 'mail_object']);
	// --- 

	$app = new App($di);
	$app->run();


} catch (\ErrorException $e) {
	echo $e->getMassage();
}