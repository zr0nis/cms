<?php 

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;


class Provider extends AbstractProvider
{
	/**
	 * @var string
	 */
	public $serviceName = 'router';

	/**
	 * New Router service init
	 */
	public function init()
	{
		$config = require __DIR__ . '/../../Config/Routes.php';
		
		$router = new Router($config['host']);

		foreach ($config['routes'] as $key => $value) {
			
			$router->add(
				$key, 
				$value['pattern'], 
				$value['controller'], 
				array_key_exists('method', $value) ?  $value['method'] : 'GET'
			);
		}

		$this->di->set($this->serviceName, $router);
	}
}