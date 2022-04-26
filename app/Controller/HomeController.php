<?php 

namespace App\Controller;

class HomeController extends AbstractController
{
	
	public function index()
	{
		//todo
		$theme = 'defailt';

		$this->view->render($theme, $vars);
	}

}