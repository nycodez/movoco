<div class=splashBoxDiv id=splashRecords><div class=title>{open records}</div>
<?php
foreach($records as $k => $v)
{
	echo '<a href="/record/view/'. $v['_id'] .'">'. $v['name'] .'</a><br />';
}
?>
</div>

<div class=splashBoxDiv id=splashBookmarks><div class=title>{bookmarked}</div>
<?php
foreach($bookmarked as $k => $v)
{
	$noun = strtolower($v['Type']);
	echo '<img src="http://www.baseqbrisbane.com/Star_20Gold_20Compress.gif" width=15 height=15 /> <a href="/'. $noun .'/view/'. $v['_id'] .'">'. $v['Name'] .'</a><br />';
}
?>
</div>

<div class=splashBoxDiv2 id=splashCalDiv>
<?php
	$cal = new Calendar('med', 'splashCalDivTable');
	$cal->Render($events, $ym);
?>
</div>

<div class=splashBoxDiv id=splashTasks><div class=title>{recent tasks}</div>
<?php
foreach($tasks as $k => $v)
{
	echo '<a href="/task/view/'. $v['_id'] .'">'. date("M j", strtotime($v['date'])) .' '. $v['action'] .' '. $v['collection'] .' '. $v['name'] .'</a><br />';
}
?>
</div>

<div class=splashBoxDiv id=splashAccounting><div class=title>{outstanding invoices}</div>
<?php
foreach($invoices as $k => $v)
{
	echo '<a href="/accounting/view/'. $v['_id'] .'">'. date("M j", strtotime($v['date'])) .' '. $v['balance'] .' '. $v['name'] .'</a><br />';
}
?>
</div>

