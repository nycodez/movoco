<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$table = new Scaffold();
$table->Render($records, $headers);
