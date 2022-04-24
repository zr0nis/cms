<?php

namespace Engine\Core\Router;

class DispadchetRoute
{
	/**
	 * @var str
	 */
	private $controller;
	
	/**
	 * @var array
	 */
	private $parameters;

	/**
	 * DispadchetRoute constructor 
	 * @param s$controller
	 * @param array  $parameters
	 */
	function __construct($controller, $parameters = [])
	{
		$this->controller = $controller;
		$this->parameters = $parameters;
	}

	/**
	 * @return $controller
	 */
	public function getController()
	{
		return $this->controller;
	}

	/**
	 * @return $parameters
	 */
	public function getParameters()
	{
		$this->parameters;
	}
}