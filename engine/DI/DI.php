<?php 
namespace Engine\DI;

/**
 * 
 */
class DI
{
	/**
	 * @var	array
	 */
	private $container = [];
	
	/**
	 * @param	$kay
	 * @param	$value
	 * @return	$this
	 */
	public function set($kay, $value)
	{
		$this->container[$kay] = $value;
	}

	/**
	 * @param	$kay
	 * @return	mixed
	 */
	public function get($kay)
	{
		return $this->has($kay);
	}

	/**
	 * @param	$kay
	 * @return	bool
	 */
	public function has($kay)
	{
		return isset($this->container[$kay]) ? $this->container[$kay] : null;
	}

}