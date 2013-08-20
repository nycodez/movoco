<?php
class Contact extends Controller
{
	public $tabs = array
		(
		 '{myContacts}' => '/contact',
		 '{all}' => '/contact/active',
		 '{inactive}' => '/contact/inactive',
		 '{addNew}' => '/contact/new',
		);
	public $headers = Array
		(
		 'name' => '/contact/view/{_id}',
		 'title' => '',
		 'clientName' => '/client/view/{client}',
		 'phone' => '',
		 'email' => '',
		);

	public function Contact_Default()
	{
		$user = $_SESSION['uid'];
		$arr['contacts'] = ModelLoad::Load('contact', 'contactsForUser', $user);
		$arr['currentTab'] = '/contact';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('contact', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Contact_Added()
	{
		$arr['contacts'] = ModelLoad::Load('contact', 'search', array('type'=>'contact'));
		$arr['currentTab'] = '/contact/added';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('contact', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Contact_Viewed()
	{
		$arr['contacts'] = ModelLoad::Load('contact', 'search', array('type'=>'contact'));
		$arr['currentTab'] = '/contact/viewed';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('contact', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Contact_Active()
	{
		$arr['contacts'] = ModelLoad::Load('contact', 'search', array('type'=>'contact'));
		$arr['currentTab'] = '/contact/active';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('contact', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Contact_Inactive()
	{
		$arr['contacts'] = ModelLoad::Load('contact', 'search', array('type'=>'contact','ifActive'=>false));
		$arr['currentTab'] = '/contact/inactive';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('contact', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}

	public function Contact_New()
	{
		$arr['currentTab'] = '/contact/new';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('contact', 'new', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Contact_Add()
	{
		//		$new = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info= $_POST[$_POST['formName']];
		$info['clientName'] = ModelLoad::Load('client', 'getName', $info['client']);
		$info['ifActive'] = true;
		$info['type'] = 'contact';
		$result = ModelLoad::Load('contact', 'add', $info);
		//		Logger::Write('add', 'contact', $r['_id']);
		$view = new View('contact');
		$view->Redirect();
	}
	public function Contact_View($id)
	{
		$arr['contact'] = ModelLoad::Load('contact', 'get', $id);
		$arr['currentTab'] = '/contact/view';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('contact', 'view', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Contact_Update()
	{
		//		$info = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info = $_POST[$_POST['formName']];
		$info['clientName'] = ModelLoad::Load('client', 'getName', $info['client']);
		$result = ModelLoad::Load('contact', 'save', $info);
		//		Logger::Write('update', 'contact', $info['_id']);
		$view = new View('contact');
		$view->Redirect();
	}
}
