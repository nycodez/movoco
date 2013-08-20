<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
echo '<div class=centerMessage>'. $message .'</div>';
$table = new Scaffold();
$table->Render($timeclocks, $headers);
