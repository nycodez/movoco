<?php
class Default_Model extends Model
{
	public function WriteLog($arr)
	{
		$result = $this->db->Put('log', $arr);
		return $result;
	}
}
