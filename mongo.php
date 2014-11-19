<style>
#banner {
	padding: 10px;
	border: 20px dotted blue;
	margin: 20px;
	font-family: arial, tahoma;
	font-size: 3em;
	text-transform: uppercase;
	text-align: center;
}
.basic th {
	background-color: lightgrey;
	border: 1px solid black;
	padding: 10px;
}
.basic td {
	border: 1px solid black;
	padding: 10px;
}
</style>
<!--div id=banner>mongodb</div--!>
<?php

date_default_timezone_set('America/New_York');

function pr($arr)
{
	echo '<pre>';

	var_dump($arr);

	echo '</pre>';
}

function bytes($a)
{
	$unim = array("B","KB","MB","GB","TB","PB");

	$c = 0;

	while ($a >= 1024)
	{
		$c++;

		$a = $a/1024;
	}

	return number_format($a,($c ? 2 : 0),".",",")." ".$unim[$c];
}

//----------------------------

function listDbs()
{
	$M = new Mongo();

	$list = $M->listDBs();

	echo '<p>root</p>';

	echo '<p>
		<form method=post>
		<table class=basic>
		<tr>
		<td>
		<input type=text name=db size=10 />
		<input type=submit name=func value="Add DB" />
		</td>
		</tr>
		</table>
		</form>
		</p>';

	echo '<table class=basic>';

	foreach($list['databases'] as $k => $v)
	{
		echo '<tr>
			<td><a href="?db='. $v['name'] .'">'. $v['name'] .'</a></td>
			<td>'. bytes($v['sizeOnDisk']) .'</td>
			<td><a href="?func=dropDb&db='. $v['name'] .'">X</a></td>
			</tr>';
	}

	echo '</table>';
}

function listCollections($db)
{
	$M = new Mongo();

	$dbs = $M->selectDB($db);
	$list = $dbs->listCollections();

	echo '<p><a href=?>root</a> > '. $db .'</p>';

	echo '<p>
		<form method=post>
		<input type=hidden name=db value="'. $db .'" />
		<table class=basic>
		<tr>
		<td>
		<input type=text name=coll size=20 />
		<input type=submit name=func value="Add Collection" />
		</td>
		</tr>
		</table>
		</form>
		</p>';

	echo '<table class=basic>';

	foreach ($list as $k => $v)
	{
		list($db, $coll) = explode('.', $v);

		echo '<tr>
			<td><a href="?db='. $db .'&coll='. $coll .'">'. $coll .'</a></td>
			<td><a href="?func=dropColl&db='. $db .'&coll='. $coll .'">X</a></td>
			</tr>';
	}

	echo '</table>';
}

function addColl($db, $coll)
{
	$m = new Mongo();

	$response = $m->$db->selectCollection($coll);

	listDocuments($db, $coll);
}

function showPossibleArray($arg)
{
	if(is_array($arg))
		showPossibleArray($arg);
	else
		echo $arg;
}

function listDocuments($db, $coll)
{
	$M = new Mongo();

	$collection = $M->$db->$coll;

	$list = $collection->find();

	echo '<p><a href=?>root</a> > <a href="?db='. $db .'">'. $db .'</a> > '. $coll .'</p>';

	echo '<p>
		<form method=post>
		<input type=hidden name=db value='. $db .' />
		<input type=hidden name=coll value='. $coll .' />
		<table class=basic>
		<tr>
		<th>_id</th>
		<td>
		<input type=text name=id placeholder=default size=30 />
		<input type=submit name=func value="Add Document" />
		</td>
		</tr>
		</table>
		</form>
		</p>';

	foreach($list as $k => $v)
	{
		$mid = (string) $v['_id'];

		echo '<p>
			<form method=post>
			<input type=hidden name=id value='. $mid.' />
			<input type=hidden name=db value='. $db .' />
			<input type=hidden name=coll value='. $coll .' />

			<table class=basic>
			<tr><td colspan=4><a href="?func=delDoc&db='. $db .'&coll='. $coll .'&id='. $mid .'">X</a></td></tr>';

		foreach($v as $kk => $vv)
		{
			echo '<tr>
				<th>'. $kk .'</th>
				<td>'. gettype($vv) .'</td>
				<td>';

		echo $vv;
				
			echo '</td>
				<td>';
			
			if($kk !== '_id')
				echo '<a href="?func=del&id='. $mid .'&db='. $db .'&coll='. $coll .'&key='. $kk .'">X</a>';
				
			echo '</td>
				</tr>';
		}

		echo '<tr>
			<th>
			<input type=text name=key size=10 />
			</th>
			<td>
			<label><input type=radio name=type title="String" value=str checked />A</label>
			<label><input type=radio name=type title="Integer" value=int />1</label>
			<label><input type=radio name=type title="Boolean" value=bool />f</label>
			<label><input type=radio name=type title="Date" value=date />d</label>
			<label><input type=radio name=type title="MD5 hash" value=md5 />5</label>
			</td>
			<td colspan=2>
			<input type=text size=30 name=val />
			<input type=submit name=func value="Add Key" />
			</td>
			</tr>

			</table>
			</form>
			</p>';
	}
}

function addDb($db)
{
	$m = new Mongo();

	$response = $m->selectDb($db);

	listCollections($db);
}

function dropDb($db)
{
	$M = new Mongo();

	$dbs = $M->$db;
	$response = $dbs->drop();

	listDbs();
}

function dropColl($db, $coll)
{
	$M = new Mongo();

	$dbs = $M->$db;
	$response = $dbs->dropCollection($coll);

	listCollections($db);
}

function addKey($id,$db,$coll,$key,$val,$type)
{
	$m = new Mongo();

	if(strlen($id) == 24)
		$obj = new MongoID($id);
	else
		$obj = $id;

	switch($type)
	{
	case 'str':
		$val = (string) $val;
		break;
	case 'md5':
		$val = (string) md5($val);
		break;
	case 'int':
		$val = (float) $val;
		break;
	case 'bool':
		if($val)
			$val = (bool) true;
		else
			$val = (bool) false;
		break;
	case 'date':
		if($val)
			$val = new MongoDate(strtotime($val));
		else
			$val = new MongoDate();
		break;
	}

	$sel = $m->$db->$coll;
	$response = $sel->update(array("_id" => $obj), array('$set' => array($key => $val)), array('safe' => true));

	listDocuments($db, $coll);
}

function delKey($id,$db,$coll,$key)
{
	$m = new Mongo();

	if(strlen($id) == 24)
		$obj = new MongoID($id);
	else
		$obj = $id;

	$sel = $m->$db->$coll;
	$response = $sel->update(array('_id' => $obj), array('$unset' => array($key => 1)), array('safe' => true));

	listDocuments($db, $coll);
}

function addDoc($db, $coll, $id = false)
{
	$m = new Mongo();

	$sel = $m->$db->$coll;
	if($id)
		$response = $sel->save(array('_id' => $id), array('safe' => true));
	else
	{
		$obj = new MongoID();
		$response = $sel->save(array('_id' => $obj), array('safe' => true));
	}

	listDocuments($db, $coll);
}

function delDoc($db, $coll, $id)
{
	$m = new Mongo();

	if(strlen($id) == 24)
		$obj = new MongoID($id);
	else
		$obj = $id;

	$sel = $m->$db->$coll;
	$response = $sel->remove(array('_id' => $obj), array('safe' => true));

	listDocuments($db, $coll);
}

//----------------------------

if(isset($_REQUEST['func']))
{
	if($_REQUEST['func'] == 'Add DB')
		addDb($_REQUEST['db']);
	else if($_REQUEST['func'] == 'dropDb' && $_REQUEST['db'])
		dropDb($_REQUEST['db']);

	else if($_REQUEST['func'] == 'Add Collection' && $_REQUEST['coll'])
		addColl($_REQUEST['db'], $_REQUEST['coll']);
	else if($_REQUEST['func'] == 'dropColl' && $_REQUEST['coll'])
		dropColl($_REQUEST['db'], $_REQUEST['coll']);

	else if($_REQUEST['func'] == 'Add Document')
		addDoc($_REQUEST['db'], $_REQUEST['coll'], $_REQUEST['id']);
	else if($_REQUEST['func'] == 'delDoc')
		delDoc($_REQUEST['db'], $_REQUEST['coll'], $_REQUEST['id']);

	else if($_REQUEST['func'] == 'Add Key')
		addKey($_REQUEST['id'], $_REQUEST['db'], $_REQUEST['coll'], $_REQUEST['key'], $_REQUEST['val'], $_REQUEST['type']);
	else if($_REQUEST['func'] == 'del')
		delKey($_REQUEST['id'], $_REQUEST['db'], $_REQUEST['coll'], $_REQUEST['key']);
}
else if(isset($_REQUEST['db']))
{
	if($_REQUEST['db'] && $_REQUEST['coll'])
		listDocuments($_REQUEST['db'], $_REQUEST['coll']);
	else if($_REQUEST['db'])
		listCollections($_REQUEST['db']);
}
else listDbs();


