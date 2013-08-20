<?php
class Logger
{
	public static function Write($action, $bucket, $type, $id = '', $old = array())
	{
		$base = dirname(dirname(__FILE__));
		$date = date("Y-m-d h:i:s");
		$user = $_SESSION['uid'];

		if($id)
		{
			$new = ModelLoad::Load($type, 'get', $id);
		}
		else
		{
			$diffs = array($new);
		}
		$diffs = array_merge(array_diff($old, $new), array_diff($new, $old));
		$arr = array
			(
			 'action' => $action,
			 'collection' => $bucket,
			 'type' => $type,
			 'id' => $id,
			 'name' => ModelLoad::Load($type, 'getName', $id),
			 'date' => $date,
			 'user' => new MongoID($user),
			 'differences' => json_encode($diffs),
			);
		ModelLoad::Load('default', 'WriteLog', $arr);
	}
}
