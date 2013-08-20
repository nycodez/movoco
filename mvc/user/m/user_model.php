<?php
class User_Model extends Model
{
	public function defaultModel()
	{
//		$r = $this->db->GetActiveRecords('user');
		$r = $this->db->GetAllRecords('user');
		return $r;
	}
	public function getActiveUsers()
	{
		$r = $this->db->Search('entity', array('type'=>'user','ifActive'=>true));
		return $r;
	}
	public function checkForAnyUsers()
	{
		$r = $this->db->Search('entity', array('type'=>'user','ifActive'=>true));
		return $r->count();
	}
}
