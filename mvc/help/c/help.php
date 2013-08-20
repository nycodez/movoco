<?php
class Help extends Controller
{
	public $headers = array
		(
		 '{fileName}'=>'',
		);
	public function Help_Default()
	{
		$arr['help'] = ModelLoad::Load('help', 'Search');
		$arr['headers'] = $this->headers;
		$view = new View('help', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
}
