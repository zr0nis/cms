<?php 

namespace Engine\Serveice\Database;

use Engine\Serveice\AbstractProvider;
use Engine\Core\Database\Connection;


class Provider extends AbstractProvider
{
	/**
	 * @var string
	 */
	public $serviceName = 'db';

	
	public function init()
	{
		$db = new Connection();

		$this->di->set($this->serviceName, $db);
	}
}