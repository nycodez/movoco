<?php
class Settings extends Controller
{
	public $tabs = array
		(
		 '{mySettings}'=>'/settings',
		);
	public function Settings_Default()
	{
		$arr['settings'] = ModelLoad::Load('settings', 'defaultModel');
		$arr['tabs'] = $this->tabs;
		$arr['currentTab'] = '/settings';
		$view = new View('settings', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
}
