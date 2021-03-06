<?php 

namespace Engine\Service\View;

use Engine\Service\AbstractProvider;
use Engine\Core\View\View;


class Provider extends AbstractProvider
{
	/**
	 * @var string
	 */
	public $serviceName = 'view';

	/**
	 * New View temletes service init
	 */
	public function init()
	{		
		$view = new View();

		$this->di->set($this->serviceName, $view);
	}
}