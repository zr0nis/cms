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
	 * @param regex $pattern
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
	 * Registration new urn in $routes
	 * @param  str $method [GET, POST, ...]
	 * @param  str $pattern [urn -> regex]
	 * @param  str $controller
	 */
	public function register($method, $pattern, $controller)
	{
		$pattern = $this->convertPattern($pattern);
		$this->routes[strtoupper($method)][$pattern] = $controller;
	}

	/**
	 * Detection & processing params in uri
	 * @param  [type] $pattern
	 * @return [type]
	 */
	private function convertPattern($pattern)
	{
		if (strpos($pattern, '(') === false)
		{
			return $pattern;
		}

		return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
	}

	/**
	 * Callback func for $self->convertPattern
	 * Replacing pattern on param
	 * @param  array $matches
	 * @return str
	 */
	private function replacePattern($matches)
	{
		return '(?<' . $matches[2] . '>' . strtr($matches[1], $this->patterns) . ')';
	}

	/**
	 * Unset int keys in $parameters
	 * @param  array $parameters
	 * @return array $parameters
	 */
	private function processParam($parameters)
	{
		foreach ($parameters as $key => $value)
		{
			if (is_int($key))
			{
				unset($parameters[$key]);
			}
		}
		return $parameters;
	}

	/**
	 * Return new route object
	 * @param  str $method [GET, POST, ...]
	 * @param  str $uri
	 * @return Engine\Core\Router\DispadchetRoute object
	 */
	public function dispatch($method, $uri)
	{
		$routes = $this->routes[strtoupper($method)];

		if (array_key_exists($uri, $routes))
		{
			return new DispadchetRoute($routes[$uri]);
		}

		return $this->doDispatch($method, $uri);
	}

	/**
	 * Make new route object with parameters from regex
	 * @param  str $method [GET, POST, ...]
	 * @param  str $uri
	 * @return Engine\Core\Router\DispadchetRoute object
	 */
	private function doDispatch($method, $uri)
	{
		foreach ($this->routes[$method] as $route => $controller)
		{
			$pattern = '#^' . $route . '$#s';
			if (preg_match($pattern, $uri, $parameters))
			{	
				return new DispadchetRoute($controller, $this->processParam($parameters));
			}
		}
	}
}