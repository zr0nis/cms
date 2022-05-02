<?php 

namespace App\Controller;

class HomeController extends AbstractController
{
	
	public function index()
	{
		$data = [
			'title' => 'Title',
			'name' => 'Jone',
			'var1' => 'lorem',
			'var2' => 'ipsum'
		];

		$pathToPage = ROOT_DIR . 'content/views/example_page.php';
		
		$this->view->viewPage($pathToPage, $data);
	}
	public function test($id)
	{
		echo "page " . $id;
	}

}