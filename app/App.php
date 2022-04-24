<?php 

namespace App;

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
		print_r($this->di);
	}
}