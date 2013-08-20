<?php
class Help_Model extends Model
{
	public function __construct($coll)
	{
		parent::__construct($coll);
	}
	public function defaultTab($coll)
	{
		$arr = array();
		$r = $this->db->GetMine('help');
		return $r;
	}
	public function recentlyAdded($coll)
	{
		$arr = array();
		$r = $this->db->GetNewest('help', 5);
		return $r;
	}
}
