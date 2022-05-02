<?php 

namespace Engine\Core\View;

class View
{
	/**
	 * View Page
	 * @param  string $pathToPage
	 * @param  array  $data
	 */
	public function viewPage(string $pathToPage, array $data = [])
	{
		if $data != [] ? extract($data) : null;
		
		require $pathToPage;
	}
}