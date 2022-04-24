<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use App\App;
use Engine\DI\DI;
use Engine\Core\Database\Connection;

try {

	// Dependency injaction
	$di = new DI();

	$app = new App($di);
	$app->run();

	// <Test> 
	
	//</Test>

} catch (\ErrorException $e) {
	echo $e->getMassage();
}
