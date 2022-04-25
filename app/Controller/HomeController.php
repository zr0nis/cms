<?php 

namespace App\Controller;

class HomeController extends AbstractController
{
	
	public function index()
	{
		$vars = ['name' => 'username'];
		$this->view->render('default/example', $vars);
	}

}