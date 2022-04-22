<?php 

namespace App;

class App
{
	/**
	 * @var DI
	 */
	private $di;

	/**
	 * @param DI
	 */
	public function __constuct($di)
	{
		$this->$di = $di;
	}

	/**
	 * run App
	 */
	public function run()
	{
		echo "Hellow CMS!";
	}
}