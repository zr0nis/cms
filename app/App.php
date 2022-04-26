<?php 

namespace App;

use Engine\Helper\Common;
use Engine\Core\Router\DispadchetRoute;


class App
{
	/**
	 * @var Engine\DI\DI DI container
	 */
	private $di;

	/**
	 * @var Engine\Core\Router\Router
	 */
	public $router;

	/**
	 * @param Engine\DI\DI DI container
	 */
	public function __construct($di)
	{
		$this->di = $di;
		$this->router = $this->di->get('router');
	}

	/**
	 * run App
	 */
	public function run()
	{
		try 
		{			
			// --------
			
			/**
			 * dispatch current route
			 * @var Engine\Core\Router\DispadchetRoute $dispadchetRoute
			 */
			$dispadchetRoute = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
			
			// --------
			
			/**
			 * if page dont exist show 404
			 */
			if ($dispadchetRoute == null)
			{
				$dispadchetRoute = new DispadchetRoute('ErrorController:page404');
			}
			
			// --------
			
			/**
			 * show routed page from controller
			 */
			list($class, $action) = explode(':', $dispadchetRoute->getController(), 2);

			$controller = '\\App\\Controller\\' . $class;
			$parameters = $dispadchetRoute->getParameters();

			call_user_func_array([new $controller($this->di), $action], $parameters);

			// -------- 
						
		} catch (\Exception $e) {
			echo $e->getMessage();
			exit;
		}
	}
}