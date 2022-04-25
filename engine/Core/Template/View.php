<?php

namespace Engine\Core\Template;

class View
{
	
	function __construct()
	{
		// code...
	}

	public function render($template, $vars = [])
	{
		// todo
		$templatePath =  __DIR__ . '/../../../content/themes/' . $template . '.php';

		if (!is_file($templatePath))
		{
			throw new \InvalidArgumentException(
				sprintf('Temlate "%s" not found in "%s"', $template, $templatePath)
			);
			
		}

		extract($vars);

		ob_start();
		ob_implicit_flush(0);

		try {
			require $templatePath;
		} catch (\Exception $e) {
			ob_end_clean();
			throw $e;
		}

		echo ob_get_clean();
	}
}