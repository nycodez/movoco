<?php
class Client_Model extends Model
{
	public function __construct($coll)
	{
		parent::__construct($coll);
	}
	public function getActiveClients()
	{
		$r = $this->db->Search('entity', array('type'=>'client','ifActive'=>true));
		return $r;
	}
}
