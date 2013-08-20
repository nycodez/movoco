<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);

$cal = new Calendar('big');
$cal->Render($events, $ym);

$table = new Scaffold();
$table->Render($events, $headers);
