<?php 

namespace Engine\Core\Router;

class Router
{
	/**
	 * @var array str
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

	/**
	 * Router constructor
	 * @param string $host
	 */
	function __construct($host)
	{
		$this->host = $host;
	}

	/**
	 * adder for @routes
	 * @param string $key        
	 * @param string $pattern    
	 * @param string $controller 
	 * @param string $method [GET default]
	 */
	public function add($key, $pattern, $controller, $method)
	{
		$this->routes[$key] = [
			'pattern'		=> $pattern,
			'controller'	=> $controller,
			'method'		=> $method
		];
	}

	/**
	 * Dispatch new route
	 * @param  str $method [GET, POST, ...]
	 * @param  str $uri    
	 * @return Engine\Core\Router\DispadchetRoute object
	 */
	public function dispatch($method, $uri)
	{
		return $this->getDispatcher()->dispatch($method, $uri);
	}

	/**
	 * Dispatcher ? Dispatcher : new Dispatcher
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