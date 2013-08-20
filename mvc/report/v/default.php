<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$table = new Scaffold();
$table->Render($reports, $headers);
