<?php 

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
		print_r($this->di->get('test1'));
	}
}