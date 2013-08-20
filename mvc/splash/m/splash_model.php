<?php
class Splash_Model extends Model
{
	public function __construct($coll)
	{
		parent::__construct($coll);
	}
	public function getOpenRecords($user = false)
	{
		if(!$user)
			$user = $_SESSION['uid'];
		$arr = array
			(
			 'status' => 'Open',
//			 'user' => new MongoID($user),
			);
		$r = $this->db->GetAllRecordsBySearch('record', $arr);

		foreach($r as $k => $v)
		{
			if($v['bookmarked'])
				$result['bookmarked'][$k] = $v;
			if($v['type'] == 'Call')
				$result['calls'][$k] = $v;
		}

		$arr2 = array
			(
			 'user' => new MongoID($_SESSION['uid']),
			);
		$s = $this->db->GetAllRecordsBySearch('log', $arr2);

		foreach($s as $k => $v)
		{
			$result['tasks'][$k] = $v;
		}

		return $result;
	}
}
