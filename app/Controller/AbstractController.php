<?php 

namespace App\Controller;

abstract class AbstractController
{
	/**
	 * @var Engine\DI\Di
	 */
	protected $di;

	// protected $db;

	/**
	 * AbstractController constructor
	 * @param Engine\DI\Di $di
	 */
	function __construct(\Engine\DI\Di $di)
	{
		$this->di = $di;
	}

}