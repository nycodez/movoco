<?php
require_once('inc/config.inc.php');
require_once 'inc/MongoDB.class.php';
require_once 'inc/Model.class.php';
class Api
{
	public $type;
	public $id;
	public $arr;

	public function Get()
	{
		$result = ModelLoad::Load($this->type, 'get', $this->id);
		$result['_id'] = (string) $result['_id'];
		echo json_encode($result);
	}
	public function Search()
	{
		$r = ModelLoad::Load($this->type, 'search', $this->arr);
		foreach($r as $k => $v)
		{
			$v['_id'] = (string) $v['_id'];
			$result['results'][] = $v;
		}
		$result['count'] = count($result['results']);
		echo json_encode($result);
	}
	public function Put()
	{
		$result = ModelLoad::Load($this->type, 'add', $this->arr);
		echo json_encode($result);
	}
}
if(isset($_REQUEST['func']))
{
	$type = $_REQUEST['type'];

	if(isset($_REQUEST['id']))
		$id = $_REQUEST['id'];

	if(isset($_REQUEST['arr']))
	{
		$arr = json_decode($_REQUEST['arr'], true);
		$arr['type'] = $type;
		$arr['ifActive'] = true;
		if(isset($arr['user']))
		{
			$arr['userName'] = ModelLoad::Load('user', 'getName', $arr['user']);
		}
	}

	switch($_REQUEST['func'])
	{
		case 'get':
			$api = new Api();
			$api->type = $type;
			$api->id = $id;
			$api->Get();
			break;
		case 'search':
			$api = new Api();
			$api->type = $type;
			$api->arr = $arr;
			$api->Search();
			break;
		case 'put':
			$api = new Api();
			$api->type = $type;
			$api->arr = $arr;
			$api->Put();
			break;
	}
}
