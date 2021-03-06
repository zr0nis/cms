<?php 

namespace Engine\Core\Database;

use \PDO;

class Connection
{
	/**
	 * @var PDO object
	 */
	private $link;

	/**
	 *  Connection constructor
	 */
	function __construct($config)
	{
		$this->connect($config);
	}

	/**
	 * Make connection
	 * @param array $config
	 * @return $this 
	 */
	private function connect($config)
	{	
		$dsn = 	'mysql:host='	. $config['host'] 
			.	';dbname='		. $config['db_name'] 
			.	';charset='		. $config['charset'];
		
		$this->link = new PDO($dsn, $config['username'], $config['password']);

		return $this;
	}

	/**
	 * SQL execution
	 * @param  string $sql [request identifier]
	 * @var PDOStatement $sth [prepared request identifier object]
	 * @return PDOStatement $sth [executed request identifier object]
	 */
	public function execute($sql) 
	{
		$sth = $this->link->prepare($sql);

		$sth->execute();
 
		return $sth;
	}

	/**
	 * Query return
	 * @param  sring $sql [request identifier]
	 * @var PDOStatement $exec [executed request identifier object]
	 * @return array [request ? assoc_array : []]
	 */
	public function query($sql)
	{
		$exec = $this->execute($sql);
		
		$result = $exec->fetchAll(PDO::FETCH_ASSOC);

		if($result === false)
		{
			return [];
		}

		return $result;
	}
}
