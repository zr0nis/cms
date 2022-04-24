<?php 

namespace Engine\DI;

/**
 * Dependency injaction
 */
class DI
{
	/**
	 * [DI container]
	 * @var	array
	 */
	private $container = [];
	
	/**
	 * [Set dependence]
	 * @param	$kay
	 * @param	$value
	 * @return	$this
	 */
	public function set($kay, $value)
	{
		$this->container[$kay] = $value;
	}

	/**
	 * [Get dependence]
	 * @param	$kay
	 * @return	bool/mixed [null/ dependence array]
	 */
	public function get($kay)
	{
		return $this->has($kay);
	}

	/**
	 * [Checking key existence]
	 * @param	$kay
	 * @return	bool/mixed [null/ dependence array]
	 */
	public function has($kay)
	{
		return isset($this->container[$kay]) ? $this->container[$kay] : null;
	}

}