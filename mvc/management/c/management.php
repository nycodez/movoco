<?php
class Management extends Controller
{
	public $tabs = array
		(
		 '{myClients}' => '/management',
		 '{associations}' => '/management/associations',
		);
	public $headers = array
		(
		 '{name}' => '/management/view/{_id}',
		 '{streetCity}' => '',
		);

	public function Management_Default()
	{
		$user = $_SESSION['uid'];
		$arr['myAssociations'] = ModelLoad::Load('management', 'search', array('type'=>'association','manager'=>$user));
		$arr['currentTab'] = '/management';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('management', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Management_Associations()
	{
		$arr['associations'] = ModelLoad::Load('management', 'search', array('type'=>'association'));
		$arr['currentTab'] = '/management/associations';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('management', 'associations', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Management_View($id)
	{
		$arr['vals'] = ModelLoad::Load('management', 'get', $id);
		$arr['currentTab'] = '/management/view';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('management', 'view', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
}
