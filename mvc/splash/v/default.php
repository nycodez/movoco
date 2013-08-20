<style>
.stdDiv1 {
	margin: 10px;
	padding: 10px;
	width: 500px;
	height: 200px;
	border: solid 1px blue;
	float: left;
	font-family: arial;
overflow: auto;
}
.stdDiv1 a {
	text-decoration: none;
}
#splashTasks a:link, #splashTasks a:visited {
	font: .8em Arial;
	color: gray;
}
#splashCalDiv {
	width: 500;
	margin: 10px;
	padding: 10px;
	border: solid 1px blue;
	float: left;
}
.splashCalDivTable {
	width: 100%;
}
.splashCalDivTable a {
	text-decoration: none;
	font-family: Arial;
	color: #C1ECFA;
}
</style>

<div class=stdDiv1 id=splashRecords><div class=title>{open records}</div>
<?php
foreach($records as $k => $v)
{
	echo '<a href="/record/view/'. $v['_id'] .'">'. $v['name'] .'</a><br />';
}
?>
</div>

<div class=stdDiv1 id=splashBookmarks><div class=title>{bookmarked}</div>
<?php
foreach($bookmarked as $k => $v)
{
	$noun = strtolower($v['Type']);
	echo '<img src="http://www.baseqbrisbane.com/Star_20Gold_20Compress.gif" width=15 height=15 /> <a href="/'. $noun .'/view/'. $v['_id'] .'">'. $v['Name'] .'</a><br />';
}
?>
</div>

<div class=stdDiv2 id=splashCalDiv>
<?php
	$cal = new Calendar('med', 'splashCalDivTable');
	$cal->Render($events, $ym);
?>
</div>

<div class=stdDiv1 id=splashTasks><div class=title>{recent tasks}</div>
<?php
foreach($tasks as $k => $v)
{
	echo '<a href="/task/view/'. $v['_id'] .'">'. date("M j", strtotime($v['date'])) .' '. $v['action'] .' '. $v['collection'] .' '. $v['name'] .'</a><br />';
}
?>
</div>

