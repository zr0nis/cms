<?php 

namespace Engine\Serveice;



abstract class AbstractProvider
{
	/**
	 * @var Engine\DI\Di
	 */
	protected $di;

	/**
	 * [AbstractProvider constructor]
	 * @param Engine\DI\Di $di
	 */
	function __construct(Engine\DI\Di $di)
	{
		$this->di = $di;
	}

	/**
	 * [New sercice init]
	 * @return mixed
	 */
	abstract function init();
}