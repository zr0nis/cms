<?php 

namespace App;

class App
{
	/**
	 * @var DI container
	 */
	private $di;

	/**
	 * @param DI container
	 */
	public function __construct($di)
	{
		$this->di = $di;
	}

	/**
	 * run App
	 */
	public function run()
	{

	}
}