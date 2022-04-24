<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use App\App;
use Engine\DI\DI;

try {

	// Dependency injaction
	$di = new DI();

	$services = require __DIR__ . '/Config/Service.php';

	// Services init
	foreach ($services as $service)
	{
		$provider = new $service($di);
		$provider->init();
	}

	$app = new App($di);
	$app->run();

} catch (\ErrorException $e) {
	echo $e->getMassage();
}
