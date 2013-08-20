<?php
class Report_Model extends Model
{
	public function __construct($coll)
	{
		parent::__construct($coll);
	}
	public function defaultModel($coll)
	{
		$user = $_SESSION['uid'];
		$r = $this->db->Search('report', array('user'=>$user));
		return $r;
	}
}
