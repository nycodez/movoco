<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$table = new Scaffold('association');
$table->Render($myAssociations, $headers);
