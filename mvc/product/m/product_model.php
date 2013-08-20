<?php
class Product_Model extends Model
{
	public function __construct($coll)
	{
		parent::__construct($coll);
	}
	public function defaultModel()
	{
		$arr = array();
		$r = $this->db->GetActive('product');
		return $r;
	}
	public function recentlyAdded()
	{
		$arr = array();
		$r = $this->db->GetNewest('product', 5);
		return $r;
	}
}
