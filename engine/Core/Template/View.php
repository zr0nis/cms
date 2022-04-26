<?php

namespace Engine\Core\Template;

class View
{
	protected $theme;
	
	function __construct()
	{
		$this->theme = new Theme();
	}

	public function render($template, $vars = [])
	{
		// todo
		$this->theme->pathToTheme = __DIR__ . '/../../../content/themes/' . $template;
		$templatePath = $this->theme->pathToTheme . '/main.php';
		// ---

		// ---
		
		if (!is_file($templatePath))
		{
			throw new \InvalidArgumentException(
				sprintf('Temlate "%s" not found in "%s"', $template, $templatePath));	
		}

		// ---
		
		$this->theme->setVars($vars);
		extract($vars);

		// ---

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