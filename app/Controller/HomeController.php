<?php 

namespace App\Controller;

class HomeController extends AbstractController
{
	
	public function index()
	{
		//todo ^ >AbstractController
		$theme = 'default';
		
		// todo
		$vars = [
			'name' => 'Jhon',
			'status' => 'whealthy'
		];
		// ---
			
		$this->view->render($theme, $vars);
	}

}