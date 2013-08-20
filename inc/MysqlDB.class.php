<?php
define('DBNAME', 'movoco');
define('DBUSER', 'movoco_user');
define('DBPASS', 'm0v0c0_p4ss');
define('DBHOST', '127.0.0.1');
class MysqlDatabase
{
	function __construct($database = DBNAME, $user = DBUSER, $pass = DBPASS, $hostname = DBHOST)
	{
		$conn = @mysql_connect($hostname, $user, $pass);

		if($conn)
			mysql_select_db($database, $conn);

		$this->Connection = $conn;
	}
	public function StraightQuery($query)
	{
		$r = array('query'=>$query);
		$d = mysql_query($query, $this->Connection);
		$r['count'] = mysql_num_rows($d);
		while($row = mysql_fetch_assoc($d))
		{
			$r['results']['customers'][] = $row;
		}
		return $r;
	}
	public function GetRecords($array = array())
	{
		extract($array);
		$q = array();

		$query = "select\n"; 

		if(is_array($select))
		{
			$query .= implode($select, ",");
		}

		$query .= " from `$table`\n";

		if(is_array($where))
		{
			if(count($where) == 1)
			{
				foreach($where as $column => $condition)
				{
					$query .= "where `$column` = '$condition'\n";
				}
			}
			else if(count($where) > 1)
			{
				$thisIteration = "where";
				foreach($where as $column => $condition)
				{
					$query .= "$thisIteration `$column` = '$condition'\n";
					$thisIteration = "and";
				}
			}
		}

		if($limit)
		{
			$query .= "limit $limit\n";
		}

		$q['query'] = $query;

		$q['results'] = array
			(
			 'customers' => array(
				 0 => array(
					 'Name' => 'Andy Gonzales'
					 ),
				 1 => array(
					 'Name' => 'Che Pug'
					 ),
				 ),
			);
		return $q;
	}
}

$db = new MysqlDatabase();

if(!$db)
{
        echo 'Unable to connect to the database.';
        exit;
}
