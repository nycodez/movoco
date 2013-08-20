<?php
class Sale extends Controller
{
	public $tabs = array
		(
		 '{mySales}' => '/sale',
		 '{leads}' => '/sale/lead',
		 '{conversions}' => '/sale/conversion',
		);
	public $headers = array
		(
		 '{name}' => '/client/view/{_id}',
		 '{userName}' => '',
		 '{industry}' => '',
		 '{account}' => '',
		);

	public function Sale_Default()
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
}
