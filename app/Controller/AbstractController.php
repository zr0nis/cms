<?php 

namespace App\Controller;

abstract class AbstractController
{
	/**
	 * @var Engine\DI\Di
	 */
	protected $di;

	/**
	 * @var Engine\Core\Template\View
	 */
	protected $view;

	/**
	 * AbstractController constructor
	 * @param Engine\DI\Di $di
	 */
	function __construct(\Engine\DI\Di $di)
	{
		$this->di = $di;
		$this->view = $di->get('view');
	}

}