<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$headers = Array
(
 'account' => '',
 'balance' => '',
 );
$table = new Scaffold('billing');
$table->Render($invoices, $headers);
