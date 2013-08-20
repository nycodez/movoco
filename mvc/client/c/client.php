<?php
class Client extends Controller
{
	public $tabs = array
		(
		 '{myClients}' => '/client',
//		 '{recentlyAdded}' => '/client/added',
		 '{all}' => '/client/active',
		 '{inactive}' => '/client/inactive',
		 '{addNew}' => '/client/new',
		 '{custom}' => '/client/custom',
		);
	public $headers = array
		(
		 '{name}' => '/client/view/{_id}',
		 '{userName}' => '',
		 '{industry}' => '',
		 '{account}' => '',
		);

	public function Client_Default()
	{
		$user = $_SESSION['uid'];
		$arr['clients'] = ModelLoad::Load('client', 'search', array('type'=>'client','user'=>$user));
		$arr['currentTab'] = '/client';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('client', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Client_Active()
	{
		$arr['clients'] = ModelLoad::Load('client', 'search', array('type'=>'client'));
		$arr['currentTab'] = '/client/active';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('client', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Client_Inactive()
	{
		$arr['clients'] = ModelLoad::Load('client', 'search', array('type'=>'client','ifActive'=>false));
		$arr['currentTab'] = '/client/inactive';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('client', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Client_All()
	{
		$arr['clients'] = ModelLoad::Load('client', 'search');
		$view = new View('client', 'all', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Client_Contacts()
	{
		$view = new View('contact', 'search');
		$view->BuildHeaders();
		echo $view->Render();
	}

	public function Client_New()
	{
		$arr['currentTab'] = '/client/new';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('client', 'new', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Client_Add()
	{
//		$new = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$new = $_POST[$_POST['formName']];
		$new['ifActive'] = true;
		$new['type'] = 'client';
		$new['userName'] = ModelLoad::Load('user', 'getName', $new['user']);
		$result = ModelLoad::Load('client', 'add', $new);
//		Logger::Write('add', 'client', $r['_id']);
		$view = new View('client');
		$view->Redirect();
	}
	public function Client_View($id)
	{
		$arr['currentTab'] = '/client/view';
		$arr['tabs'] = $this->tabs;
		$arr['vals'] = ModelLoad::Load('client', 'get', $id);
		$arr['headers'] = $this->headers;
		$arr['contacts'] = ModelLoad::Load('contact', 'search', array('client'=>$id));
		$arr['records'] = ModelLoad::Load('record', 'search', array('status'=>'open','client'=>$id));
		$view = new View('client', 'view', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Client_Update()
	{
//		$info = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info = $_POST[$_POST['formName']];
		$info['userName'] = ModelLoad::Load('user', 'getName', $info['user']);
		$old = ModelLoad::Load('client', 'get', $info['_id']);

		$result = ModelLoad::Load('client', 'save', $info);
		Logger::Write('update', 'entity', 'client', $info['_id'], $old);
		$view = new View('client');
		$view->Redirect();
	}
	public function Client_Custom()
	{
		$page = ModelLoad::Load('record', 'search', array('customPage'=>'client'));
		$arr['tabs'] = $this->tabs;
		$arr['currentTab'] = '/client/custom';
		foreach($page as $k => $v)
		{
			$arr['page'] = $v['page'];
		}
		$view = new View('client', 'custom', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Client_CustomEdit()
	{
		$page = ModelLoad::Load('record', 'search', array('customPage'=>'client'));
		$arr['tabs'] = $this->tabs;
		$arr['currentTab'] = '/client/customEdit';
		foreach($page as $k => $v)
		{
			$arr['_id'] = (string) $v['_id'];
			$arr['page'] = $v['page'];
		}
		$view = new View('client', 'customEdit', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Client_CustomUpdate()
	{
		$info = $_POST[$_POST['formName']];
		$result = ModelLoad::Load('record', 'save', $info);
//		Logger::Write('update', 'record', 'customPage', $info['_id'], $old);
		$view = new View('client', 'custom');
		$view->Redirect();
	}
	public function Client_Delete($id)
	{
		ModelLoad::Load('client', 'delete', $id);

		$view = new View('client', 'default');
		echo $view->Redirect();
	}
}
