<?php
class User extends Controller
{
	public $tabs = array
		(
		 '{all}'=>'/user',
		 '{recentlyAdded}'=>'/user/added',
		 '{inactive}'=>'/user/inactive',
		 '{addNew}'=>'/user/new',
		);
	public $headers = array
		(
		 '{name}'=>'/user/view/{_id}',
		 '{role}'=>'',
		 '{phone}'=>'',
		 '{ext}'=>'',
		 '{email}'=>'',
		);

	public function User_Default()
	{
		$arr['users'] = ModelLoad::Load('user', 'search', array('type'=>'user'));
		$arr['currentTab'] = '/user';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('user', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function User_Added()
	{
		$arr['users'] = ModelLoad::Load('user', 'search', array('type'=>'user'));
		$arr['currentTab'] = '/user/added';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('user', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function User_Inactive()
	{
		$arr['users'] = ModelLoad::Load('user', 'search', array('type'=>'user','ifActive'=>false));
		$arr['currentTab'] = '/user/inactive';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('user', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}

	public function User_New()
	{
		$arr['currentTab'] = '/user/new';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('user', 'new', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function User_Add()
	{
//		$new = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info = $_POST[$_POST['formName']];
		$info['ifActive'] = true;
		$info['type'] = 'user';
		$info['secret'] = md5($info['secret']);
		$result = ModelLoad::Load('user', 'add', $info);
//		Logger::Write('add', 'user', $r['_id']);
		$view = new View('user');
		$view->Redirect();
	}

	public function User_View($id)
	{
		$arr['currentTab'] = '/user/view';
		$arr['tabs'] = $this->tabs;
		$arr['vals'] = ModelLoad::Load('user', 'get', $id);
		$view = new View('user', 'view', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function User_Update()
	{
//		$info = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info = $_POST[$_POST['formName']];
		if(isset($info['secret']))
			$info['secret'] = md5($info['secret']);
		$result = ModelLoad::Load('user', 'save', $info);
//		Logger::Write('update', 'user', $info['_id']);
		$view = new View('user');
		$view->Redirect();
	}
}
