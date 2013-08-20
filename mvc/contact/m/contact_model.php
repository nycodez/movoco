<?php
class Contact_Model extends Model
{
	public function __construct($coll)
	{
		parent::__construct($coll);
	}
	public function allContacts()
	{
		$r = $this->db->GetAllRecordsBySearch('contact', array('active'=>true));
		return $r;
	}
	public function clientList($client)
	{
		$r = $this->db->GetAllRecordsBySearch('contact', array('client'=>$client));
		return $r;
	}
	public function contactsForUser($user)
	{
		$result = $this->db->Search('entity', array('user'=>$user,'type'=>'client'));
		$arr = array();
		$arr2 = array();
		foreach($result as $v)
		{
			$id = (string) $v['_id'];
			$arr[] = $id;
		}
		foreach($arr as $v)
		{
			$result2 = $this->db->Search('entity', array('client'=>$v));
			foreach($result2 as $v)
			{
				$arr2[] = $v;
			}
		}
		return $arr2;
	}
}
