<?php 

namespace Engine\DI;

/**
 * Dependency injaction
 */
class DI
{
	/**
	 * DI container
	 * @var	array
	 */
	private $container = [];
	
	/**
	 * Set dependence
	 * @param	$key
	 * @param	$value
	 * @return	$this
	 */
	public function set($key, $value)
	{
		$this->container[$key] = $value;
	}

	/**
	 * Get dependence
	 * @param	$key
	 * @return	bool/mixed [null/ dependence array]
	 */
	public function get($key)
	{
		return $this->has($key);
	}

	/**
	 * Checking key existence
	 * @param	$key
	 * @return	bool/mixed [null/ dependence array]
	 */
	public function has($key)
	{
		return isset($this->container[$key]) ? $this->container[$key] : null;
	}

}