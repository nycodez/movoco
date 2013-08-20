<?php
class Report extends Controller
{
	public $tabs = array
		(
		 '{myReports}'=>'/report',
		);
	public $headers = array
		(
		 '{name}'=>'',
		 '{user}'=>'',
		 '{dateLastRan}'=>'',
		);

	public function Report_Default()
	{
		$arr['reports'] = ModelLoad::Load('report', 'defaultModel');
		$arr['currentTab'] = '/report';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('report', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Report_Active()
	{
		$arr['reports'] = ModelLoad::Load('report', 'defaultModel');
		$arr['currentTab'] = '/report/active';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('report', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Report_Inactive()
	{
		$arr['reports'] = ModelLoad::Load('report', 'defaultModel');
		$arr['currentTab'] = '/report/inactive';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('report', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
}
