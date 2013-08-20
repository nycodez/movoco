<?php
class Timeclock extends Controller
{
	public $tabs = array
		(
		 '{myTimeclock}'=>'/timeclock',
		);
	public $headers = array
		(
		 '{name}'=>'',
		 '{status}'=>'',
		);

	public function Timeclock_Default()
	{
		$users = ModelLoad::Load('user', 'search', array('type'=>'user'));
		foreach($users as $k => $v)
		{
			$id = (string) $v['_id'];
			$arr['timeclocks'][$id]['name'] = $v['name'];
			$arr['timeclocks'][$id]['login'] = $v['login'];
			$statusResult = ModelLoad::Load('timeclock', 'timeclockGetUserStatus', $id);
			$arr['timeclocks'][$id]['status'] = '<span class="timeclockStatus-'. $statusResult['status'] .'">'. $statusResult['status'] .'</span>';
		}
		$arr['tabs'] = $this->tabs;
		$arr['currentTab'] = '/timeclock';
		$arr['headers'] = $this->headers;
		$view = new View('timeclock', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Timeclock_In()
	{
		$user = $_SESSION['uid'];
		$statusResult = ModelLoad::Load('timeclock', 'timeclockIn', $user);
		if($statusResult)
			$arr['message'] = 'Clock in succesful';
		else
			$arr['message'] = 'Clock in unsuccesful';

		$users = ModelLoad::Load('user', 'search', array('type'=>'user'));
		foreach($users as $k => $v)
		{
			$id = (string) $v['_id'];
			$arr['timeclocks'][$id]['name'] = $v['name'];
			$arr['timeclocks'][$id]['login'] = $v['login'];
			$statusResult = ModelLoad::Load('timeclock', 'timeclockGetUserStatus', $id);
			$arr['timeclocks'][$id]['status'] = '<span class="timeclockStatus-'. $statusResult['status'] .'">'. $statusResult['status'] .'</span>';
		}
		$arr['headers'] = $this->headers;
		$view = new View('timeclock', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Timeclock_Out()
	{
		$user = $_SESSION['uid'];
		$statusResult = ModelLoad::Load('timeclock', 'timeclockOut', $user);
		if($statusResult)
			$arr['message'] = 'Clock out succesful';
		else
			$arr['message'] = 'Clock out unsuccessful';

		$users = ModelLoad::Load('user', 'search', array('type'=>'user'));
		foreach($users as $k => $v)
		{
			$id = (string) $v['_id'];
			$arr['timeclocks'][$id]['name'] = $v['name'];
			$arr['timeclocks'][$id]['login'] = $v['login'];
			$statusResult = ModelLoad::Load('timeclock', 'timeclockGetUserStatus', $id);
			$arr['timeclocks'][$id]['status'] = '<span class="timeclockStatus-'. $statusResult['status'] .'">'. $statusResult['status'] .'</span>';
		}
		$arr['headers'] = $this->headers;
		$view = new View('timeclock', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
}
