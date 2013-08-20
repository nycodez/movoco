<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$table = new Scaffold('contact');
$table->Render($contacts, $headers);
