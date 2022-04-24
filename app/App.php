<?php 

namespace App;

use Engine\Helper\Common;

class App
{
	/**
	 * @var Engine\DI\DI DI container
	 */
	private $di;

	/**
	 * @var Engine\Core\Router\Router
	 */
	public $router;

	/**
	 * @param Engine\DI\DI DI container
	 */
	public function __construct($di)
	{
		$this->di = $di;
		$this->router = $this->di->get('router');
	}

	/**
	 * run App
	 */
	public function run()
	{
		$routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
		print_r($routerDispatch);
	}
}