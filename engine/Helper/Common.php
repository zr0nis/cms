<?php 

namespace Engine\Helper;

class Common
{
	/**
	 * @return (REQUEST_METHOD == POST) ? true : false
	 */
	static public function isPost()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			return true;
		}

		return false;
	}

	/**
	 * @return REQUEST_METHOD
	 */
	static public function getMethod()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	/**
	 * Cut uri to '?'
	 * @return URL path
	 */
	static public function getPathUrl()
	{
		$pathUrl = $_SERVER['REQUEST_URI'];

		if ($position = strpos($pathUrl, '?'))
		{
			$pathUrl = substr($pathUrl, 0, $position);
		}

		return $pathUrl;
	}
}