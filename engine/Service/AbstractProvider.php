<?php 

namespace Engine\Service;



abstract class AbstractProvider
{
	/**
	 * @var Engine\DI\Di
	 */
	protected $di;

	/**
	 * AbstractProvider constructor
	 * @param Engine\DI\Di $di
	 */
	function __construct(\Engine\DI\Di $di)
	{
		$this->di = $di;
	}

	/**
	 * New service init
	 */
	abstract function init();
}