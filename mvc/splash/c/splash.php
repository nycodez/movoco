<?php
class Splash extends Controller
{
	public function __construct()
	{
	}
	public function Splash_Default($ym = false)
	{
		$user = $_SESSION['uid'];
		if(!$ym)
		{
			$ym = date("Y-n");
		}

		$arr['records'] = ModelLoad::Load('record', 'search', array('user'=>$user,'status'=>'open'));
		$arr['events'] = ModelLoad::Load('event', 'search', array('user'=>$user));
		$arr['ym'] = $ym;
		$user = false;
		$view = new View('splash', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
}
