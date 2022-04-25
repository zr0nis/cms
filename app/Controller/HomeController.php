<?php 

namespace App\Controller;

class HomeController extends AbstractController
{
	
	public function index()
	{
		echo "index page";
	}

	public function news_main()
	{
		echo "main News page";
	}

	public function news($id)
	{
		echo "News page " . $id;
	}

	public function user($id, $username)
	{
		echo $username . "'s puplic page " . $id;
	}
}