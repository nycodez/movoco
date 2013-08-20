<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);

$table = new Scaffold('event');
$table->Render($events, $headers);
