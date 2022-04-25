<?php 

namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;


class Provider extends AbstractProvider
{
	/**
	 * @var string
	 */
	public $serviceName = 'db';

	/**
	 * New Database service init
	 */
	public function init()
	{
		$config = require __DIR__ . '/../../Config/Database.php';
		$db = new Connection($config);

		$this->di->set($this->serviceName, $db);
	}
}