<?php
class ModelLoad
{
	public static function Load($name, $method, $arg = false)
	{
		global $base;
		global $modelMapping;

		$bucket = $modelMapping[$name];
		$modelFile = $base.'/'.$name.'/m/'.$name.'_model.php';
		require_once($modelFile);

		$class = ucwords($name).'_Model';

		$m = new $class($bucket);
		$arr = $m->$method($arg);
		$m->bucket = $bucket;
		$m->type = $name;

		return $arr;
	}
}
abstract class Model
{
	public $coll;

	public function __construct($coll)
	{
		global $db;
		$this->db = $db;
		$this->coll = $coll;
	}
	public function search($arr2 = false)
	{
		if(!$arr2)
			$arr2 = array();
		$arr1 = array('ifActive'=>true);
		$arr = array_merge($arr1, $arr2);
		$result = $this->db->Search($this->coll, $arr);
		return $result;
	}
	public function get($id)
	{
		$result = $this->db->Get($this->coll, $id);
		return $result;
	}
	public function add($arr)
	{
		$result = $this->db->Put($this->coll, $arr);
		return $result; //new id in $['_id']
	}
	public function save($arr)
	{
		$result = $this->db->Save($this->coll, $arr);
		return $result;
	}
	public function getName($id)
	{
		if(!$id)
			return '';
		$result = $this->db->Get($this->coll, $id);
		return $result['name'];
	}

	public function storeFile($meta)
	{
		$r = $this->db->StoreFile($meta);
		return $r;
	}
	public function getFile($id)
	{
		$r = $this->db->GetFile(new MongoId($id));
		return $r;
	}
/*
	public function getOne($id)
	{
		$r = $this->db->Get($this->coll, $id);
		return $r;
	}
	public function deleteOne($id)
	{
		$r = $this->db->DeleteOneRecordById($this->coll, $id);
		return $r;
	}
	public function addMany($arr)
	{
		$r = $this->db->PutOneRecord($this->coll, $arr);
		return $r;
	}
	public function updateMany($arr)
	{
		$r = $this->db->SaveOneRecord($this->coll, $arr);
		return $r;
	}
	public function getMany($arr)
	{
		$r = $this->db->GetAllRecordsBySearch($this->coll, $arr);
		return $r;
	}
	public function deleteMany($arr)
	{
		$r = $this->db->DeleteOneRecordById($this->coll, $arr);
		return $r;
	}

	public function defaultModel()
	{
		$user = $_SESSION['uid'];
		$r = $this->db->GetMine($this->coll, array('user'=>$user));
		return $r;
	}
	public function recentlyViewed($limit = 2)
	{
		$r = $this->db->GetNewest($this->coll, $limit);
		return $r;
	}

*/
}
