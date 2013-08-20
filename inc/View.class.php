<?php
class View
{
	public $contents = '';
	public $this = array();
	public $controller;
	public $method;
	public $id;
	public $base;

	public function __construct($controller, $method, $array = array(), $id = false)
	{
		global $base;
		$this->base = $base;
		$this->controller = $controller;
		$this->method = $method;
		$this->array = $array;
		$this->id = $id;
	}
	public function BuildHeaders($showHeader = true)
	{
		if($showHeader)
		{
			if(file_exists($this->base.'/'.$this->controller.'/v/header.php'))
			{
				$this->headerFile = $this->base.'/'.$this->controller.'/v/header.php';
			}
			else if(file_exists($this->base.'/default/v/header.php'))
			{
				$this->headerFile = $this->base.'/default/v/header.php';
			}
		}

		extract($this->array, EXTR_SKIP | EXTR_REFS);
		ob_start();
		try
		{
			if($showHeader)
			{
				include $this->headerFile;
			}
		}
		catch (Exception $e)
		{
			ob_end_clean();
			throw $e;
		}
		$this->contents .= ob_get_clean();
	}
	private function LoadLanguage($template, $vars)
	{
		$keys = array_keys($vars);
		$vals = array_values($vars);
		$template = str_replace($keys, $vals, $template);
		return $template;
	}
	public function Render()
	{
		if(file_exists($this->base.'/'.$this->controller.'/v/'.$this->method.'.php'))
		{
			$this->bodyFile = $this->base.'/'.$this->controller.'/v/'.$this->method.'.php';
		}
		extract($this->array, EXTR_SKIP | EXTR_REFS);
		ob_start();
		try
		{
			include $this->bodyFile;
		}
		catch (Exception $e)
		{
			ob_end_clean();
			throw $e;
		}
		$this->contents .= ob_get_clean();

		global $lang;
		$languageFile = $lang->ReturnDefinitions();

		return $this->LoadLanguage($this->contents, $languageFile);
	}
	public function Redirect()
	{
		$this->redirectFile = $_SERVER['HTTP_HOST'] .'/'. $this->controller .'/'. $this->method;
		header("Location: http://{$this->redirectFile}");
	}
}
