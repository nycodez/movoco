<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$headers = array
(
 '{type}'=>'',
 '{name}'=>'/record/view/{_id}',
 '{userName}'=>'',
 '{date}'=>'',
 );
$table = new Scaffold();
$table->Render($records, $headers);
