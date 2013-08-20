<?php
class Settings_Model extends Model
{
	public $tabs = array
		(
		 '{mySettings}'=>'/settings',
		);
	public function __construct($coll)
	{
		parent::__construct($coll);
	}
	public function defaultModel($coll)
	{
		$user = $_SESSION['uid'];
		$result = $this->db->Search('settings', array('user'=>$user));
		return $result;
	}
	public function GetClassFormElements($class)
	{
		$r = $this->db->Search('settings', array('type'=>'formFields','class'=>$class), true);
		return $r['fields'];
	}
}
