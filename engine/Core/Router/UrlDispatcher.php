<?php 

namespace Engine\Core\Router;

class UrlDispatcher
{

	/**
	 * Methods list
	 * @var array
	 */
	private $methods = [
		'GET',
		'POST'
	];

	/**
	 * Routes list for every method
	 * @var 2d assoc array
	 */
	private $routes = [
		'GET'	=> [],
		'POST'	=> []
	];
	
	/**
	 * Regex patterns
	 * @var assoc array
	 */
	private $patterns = [
		'int'	=> '[0-9]+',
		'str'	=> '[a-zA-Z\.\-_%]+',
		'any'	=> '[a-zA-Z0-9\.\-_%]+'
	];

	/**
	 * Set new pattern in $patterns
	 * @param str $key    
	 * @param str $pattern
	 */
	public function addPattern($key, $pattern)
	{
		$this->patterns[$key] = $pattern;
	}

	/**
	 * Return routes list for method
	 * @param  str $method [GET, POST, ...]
	 * @return assoc array / []
	 */
	private function routes($method)
	{
		return isset($this->routes[$method]) ? $this->routes[$method] : [];
	}

	/**
	 * [register description]
	 * @param  str $method [GET, POST, ...]
	 * @param  Regex $pattern
	 * @param  [type] $controller [description]
	 * @return [type]             [description]
	 */
	public function register($method, $pattern, $controller)
	{
		$this->routes[strtoupper($method)][$pattern] = $controller;
	}

	/**
	 * [dispatch description]
	 * @param  str $method [GET, POST, ...]
	 * @param  str $uri
	 * @return Engine\Core\Router\DispadchetRoute object
	 */
	public function dispatch($method, $uri)
	{
		$routes = $this->routes(strtoupper($method));

		if (array_key_exists($uri, $routes))
		{
			return new DispadchetRoute($routes[$uri])
		}
	}

	private function doDispatch($method, $uri)
	{
		// code...
	}
}