<?php
if(!class_exists('MongoClient'))
	die("MongoClient not installed. Download <a href='http://docs.mongodb.org/manual/installation/'>here</a>");
$parts = explode(".", $_SERVER['SERVER_NAME']);
$dbname = 'nubular_'. $parts[0];

$db = new MongoDatabase($dbname);
class MongoDatabase
{
	public function __construct($dbname)
	{
		$this->conn = new MongoClient();
		$this->db = $this->conn->$dbname;
	}
	public function Search($coll, $arr = array(), $one = false, $sort = false)
	{
		$collection = $this->db->$coll;
		if($one)
			$result = $collection->findOne($arr);
		else
			$result = $collection->find($arr);

		if($sort)
			$result->sort($sort);

		return $result;
	}
	public function Get($coll, $id)
	{
		$collection = $this->db->$coll;
		$result = $collection->findOne(array('_id' => new MongoID($id)));
		return $result;
	}
	public function Put($coll, $arr)
	{
		$collection = $this->db->$coll;
		$result = $collection->insert($arr);
		$result['_id'] = $arr['_id'];
		return $result;
	}
	public function Save($coll, $arr)
	{
		$id = new MongoID($arr['_id']);
		unset($arr['_id']);
		$arr = array('$set'=>$arr);

		$collection = $this->db->$coll;
		$result = $collection->update(array('_id'=>$id), $arr);
		return $result;
	}
	public function StoreFile($meta)
	{
		$file = $meta['file']['tmp_name'];
		$grid  = $this->db->GetGridFS();
		$result = $grid->storeFile($file, $meta);
		return $result;
	}
	public function GetFile($id)
	{
		$grid  = $this->db->GetGridFS();
		$result = $grid->get($id);
		return $result;
	}
	public function GetUserStatus($id)
	{
		$collection = $this->db->timeclock;
		$result = $collection->find(array('user'=>$id))->sort(array('_id'=>-1))->limit(1);
		foreach($result as $k => $v)
		{
			$r = $v;
		}
		return $r;
	}






/*
	public function DeleteOneRecordById($coll, $id)
	{
		$collection = $this->db->$coll;
		$result = $collection->remove(array('_id' => new MongoId($id)));
		return $result;
	}
	public function GetOneRecordBySearch($coll, $arr)
	{
		$collection = $this->db->$coll;
		$result = $collection->findOne($arr);
		return $result;
	}
	public function GetAllRecords($coll)
	{
		$collection = $this->db->$coll;
		$result = $collection->find();
		return $result;
	}
	public function GetActive($coll)
	{
		$collection = $this->db->$coll;
		$result = $collection->find(array('active'=>true));
		return $result;
	}
	public function GetInactive($coll)
	{
		$collection = $this->db->$coll;
		$result = $collection->find(array('active'=>false));
		return $result;
	}
	public function GetAllRecordsBySearch($coll, $arr)
	{
		$collection = $this->db->$coll;
		$result = $collection->find($arr);
		return $result;
	}
	public function GetNewest($coll, $limit = 10)
	{
		$collection = $this->db->$coll;
		$result = $collection->find(array('active'=>true))->sort(array('_id'=>-1))->limit($limit);
		return $result;
	}
	public function GetMine($coll, $arr)
	{
		$collection = $this->db->$coll;
		$result = $collection->find($arr);
		return $result;
	}

*/
}
