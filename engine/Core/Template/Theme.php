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

	protected $vars = [];
	
	public function getVars()
	{
		return $this->vars;
	}

	public function setVars($vars)
	{
		$this->vars = $vars;
	}

	public function header(string $name = '', $data = [])
	{
		$file = 'header';

		if ($name != '')
		{
			$file = sprintf(self::RULES_NAME_FILE['header'], $name);
		}

		$this->loadTemplateFile($file, $data);
	}

	public function footer(string $name = '', $data = [])
	{
		// $name = (string) $name;
		$file = 'footer';

		if ($name != '')
		{
			$file = sprintf(self::RULES_NAME_FILE['footer'], $name);
		}

		$this->loadTemplateFile($file, $data);
	}

	public function sidebar(string $name = '', $data = [])
	{
		$file = 'sidebar';

		if ($name != '')
		{
			$file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
		}

		$this->loadTemplateFile($file, $data);
	}

	public function block(string $name, $data = [])
	{
		$this->loadTemplateFile($name, $data);
	}

	private function loadTemplateFile($nameFile, $data)
	{
		$templateFile = $this->pathToTheme . '/' . $nameFile . '.php';

		if (is_file($templateFile))
		{
			extract($this->vars);
			$data != [] ? extract($data) : null;
			require_once $templateFile;
		}
		else
		{
			throw new \Exception(sprintf("View file %s don't exist", $templateFile));
		}

	}
}