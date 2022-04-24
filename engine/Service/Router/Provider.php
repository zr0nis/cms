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
		$router = new Router('http://cms.zro/');

		$this->di->set($this->serviceName, $router);
	}
}