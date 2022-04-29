<?php

namespace Engine\Core\Template;

class Theme
{
	const RULES_NAME_FILE = [
		'header' => 'header-%s',
		'footer' => 'footer-%s',
		'sidebar' => 'sidebar-%s'
	];

	/**
	 * Url curent theme
	 * @var string
	 */
	public $pathToTheme = '';

	/**
	 * user data
	 * @var array
	 */
	protected $vars = [];
	
	/**
	 * $vars getter
	 * @return array
	 */
	public function getVars()
	{
		return $this->vars;
	}

	/**
	 * $vars setter
	 * @param array
	 */
	public function setVars($vars)
	{
		$this->vars = $vars;
	}

	/**
	 * View header block
	 * @param  string $name [header-$name.php]
	 * @param  array  $data [user data]
	 */
	public function header(string $name = '', $data = [])
	{
		$file = 'header';

		if ($name != '')
		{
			$file = sprintf(self::RULES_NAME_FILE['header'], $name);
		}

		$this->loadTemplateFile($file, $data);
	}

	/**
	 * View footer block
	 * @param  string $name [footer-$name.php]
	 * @param  array  $data [user data]
	 */
	public function footer(string $name = '', $data = [])
	{
		$file = 'footer';

		if ($name != '')
		{
			$file = sprintf(self::RULES_NAME_FILE['footer'], $name);
		}

		$this->loadTemplateFile($file, $data);
	}

	/**
	 * View sidebar block
	 * @param  string $name [sidebar-$name.php]
	 * @param  array  $data [user data]
	 */
	public function sidebar(string $name = '', $data = [])
	{
		$file = 'sidebar';

		if ($name != '')
		{
			$file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
		}

		$this->loadTemplateFile($file, $data);
	}

	/**
	 * View block
	 * @param  string $name [$name.php]
	 * @param  array  $data [user data]
	 */
	public function block(string $name, $data = [])
	{
		$this->loadTemplateFile($name, $data);
	}

	/**
	 * Require file $namefile & extract vars form $data
	 * @param  str $nameFile
	 * @param  array $data
	 */
	private function loadTemplateFile($nameFile, $data)
	{
		$templateFile = $this->pathToTheme . '/' . $nameFile . '.php';

		if (is_file($templateFile))
		{
			extract($this->vars);
			$data != [] ? extract($data) : null;
			require $templateFile;
		}
		else
		{
			throw new \Exception(sprintf("View file %s don't exist", $templateFile));
		}

	}
}