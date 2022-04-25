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
			require_once 'Routes.php';
			
			// --------
			
			/**
			 * dispatch current route
			 * @var Engine\Core\Router\DispadchetRoute $routerDispatch
			 */
			$routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
			
			// --------
			
			/**
			 * if page dont exist show 404
			 */
			if ($routerDispatch == null)
			{
				$routerDispatch = new DispadchetRoute('ErrorController:page404');
			}
			
			// --------
			
			/**
			 * show routed page from controller
			 */
			list($class, $action) = explode(':', $routerDispatch->getController(), 2);

			$controller = '\\App\\Controller\\' . $class;
			$parameters = $routerDispatch->getParameters();

			call_user_func_array([new $controller($this->di), $action], $parameters);

			// -------- 
						
		} catch (Exception $e) {
			echo "Exception in \app\App.php:run():route<br>";
			echo $e->getMassage();
			exit;
		}
	}
}