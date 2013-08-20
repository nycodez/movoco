<?php
class Event extends Controller
{
	public $tabs = array
		(
		 '{myEvents}'=>'/event',
		 '{all}'=>'/event/active',
		 '{addNew}'=>'/event/new',
		);
	public $headers = array
		(
		 '{name}' => '/event/view/{_id}',
		 '{clientName}' => '/client/view/{client}',
		 '{userName}' => '/user/view/{user}',
		 '{date}'=>'/event/day/{date}',
		);

	public function Event_Default($ym = false)
	{
		$user = $_SESSION['uid'];
		if(!$ym)
			$ym = date("Y-m");
                $arr['events'] = ModelLoad::Load('event', 'search', array('type'=>'event','user'=>$user,'yearmonth'=>$ym));
		$arr['ym'] = $ym;
		$arr['currentTab'] = '/event';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('event', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Event_Active($ym = false)
	{
		if(!$ym)
			$ym = date("Y-m");
                $arr['events'] = ModelLoad::Load('event', 'search', array('type'=>'event','yearmonth'=>$ym));
		$arr['ym'] = $ym;
		$arr['currentTab'] = '/event/active';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('event', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Event_Inactive($ym = false)
	{
		if(!$ym)
			$ym = date("Y-m");
                $arr['events'] = ModelLoad::Load('event', 'search', array('type'=>'event','ifActive'=>false,'yearmonth'=>$ym));
		$arr['ym'] = $ym;
		$arr['currentTab'] = '/event/inactive';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('event', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}

	function Event_New()
	{
		$arr['currentTab'] = '/event/new';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('event', 'new', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	function Event_Add()
	{
//		$new = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$new = $_POST[$_POST['formName']];
		$new['ifActive'] = true;
		$new['type'] = 'event';
		$new['yearmonth'] = date("Y-m", strtotime($new['date']));
		$new['day'] = date("d", strtotime($new['date']));
		$new['clientName'] = ModelLoad::Load('client', 'getName', $new['client']);
		$new['userName'] = ModelLoad::Load('user', 'getName', $new['user']);
		$r = ModelLoad::Load('event', 'add', $new);
//		Logger::Write('add', 'event', $r['_id']);
		$view = new View('event');
		$view->Redirect();
	}
	function Event_View($id)
	{
		$arr['currentTab'] = '/event/view';
		$arr['tabs'] = $this->tabs;
		$arr['vals'] = ModelLoad::Load('event', 'get', $id);
		$view = new View('event', 'view', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	function Event_Day($date)
	{
		$arr['currentTab'] = '/event/day';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$arr['events'] = ModelLoad::Load('event', 'search', array('date'=>$date));
		$view = new View('event', 'day', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	function Event_Update()
	{
//		$info = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info = $_POST[$_POST['formName']];
		$info['yearmonth'] = date("Y-m", strtotime($info['date']));
		$info['day'] = date("d", strtotime($info['date']));
		$info['clientName'] = ModelLoad::Load('client', 'getName', $info['client']);
		$info['userName'] = ModelLoad::Load('user', 'getName', $info['user']);
		$result = ModelLoad::Load('event', 'save', $info);
//		Logger::Write('update', 'event', $info['_id']);
		$view = new View('event');
		$view->Redirect();
	}
}
