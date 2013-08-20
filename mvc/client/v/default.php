<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$table = new Scaffold('client');
$table->Render($clients, $headers);
