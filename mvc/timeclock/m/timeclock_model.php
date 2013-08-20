<?php
class Timeclock_Model extends Model
{
	public function __construct($coll)
	{
		parent::__construct($coll);
	}
	public function timeclockGetUserStatus($user)
	{
		$r = $this->db->GetUserStatus($user);
		return $r;
	}
	public function timeclockIn($user)
	{
		$userResult = $this->db->GetUserStatus($user);
		if($userResult['status'] !== 'In')
		{
			$userName = ModelLoad::Load('user', 'getName', $user);
			$arr = array('user'=>$user,'userName'=>$userName,'in'=>new MongoDate(),'out'=>false,'status'=>'In');
			$r = $this->db->Put('timeclock', $arr);
			if($r['ok'])
				return true;
			else
				return false;
		}
		else
			return false;
	}
	public function timeclockOut($user)
	{
		$userResult = $this->db->GetUserStatus($user);
		if($userResult['status'] !== 'Out')
		{
			$id = (string) $userResult['_id'];
			$arr = array('_id'=>$id,'out'=>new MongoDate(),'status'=>'Out');
			$r = $this->db->Save('timeclock', $arr);
			if($r['ok'])
				return true;
			else
				return false;
		}
		else
			return false;
	}
}
