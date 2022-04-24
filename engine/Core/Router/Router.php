<?php 

namespace Engine\Core\Router;

class Router
{
	/**
	 * @var array
	 */
	private $routes = [];
	
	/**
	 * @var str
	 */
	private $host;

	/**
	 * @var Engine\Core\Router\UrlDispatcher
	 */
	private $dispatcher;

	
	function __construct($host)
	{
		$this->host = $host;
	}

	
	public function add($key, $pattern, $controller, $method = 'GET')
	{
		$this->routes[$key] = [
			'pattern'		=> $pattern,
			'controller'	=> $controller,
			'method'		=> $method
		];
	}

	/**
	 * [dispatch description]
	 * @param  str $method [GET, POST, ...]
	 * @param  str $uri    [description]
	 * @return Engine\Core\Router\UrlDispatcher [with reqistred routes]
	 */
	public function dispatch($method, $uri)
	{
		return $this->getDispatcher()->dispatch($method, $uri);
	}

	/**
	 * [getDispatcher description]
	 * @return Engine\Core\Router\UrlDispatcher [with reqistred routes]
	 */
	public function getDispatcher()
	{

		if ($this->dispatcher == null) 
		{
			$this->dispatcher = new UrlDispatcher();

			foreach ($this->routes as $route)
			{
				$this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
			}
		}

		return $this->dispatcher;	
	}
}