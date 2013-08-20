<?php
date_default_timezone_set('America/New_York');
$defaultController = 'splash';
$base = dirname(dirname(__FILE__)).'/mvc';
$modelMapping = Array
(
 'default' => 'default',
 'splash' => 'splash',

 'client' => 'entity',
 'vendor' => 'entity',
 'user' => 'entity',
 'contact' => 'entity',

 'record' => 'record',

 'management' => 'management',

 'invoice' => 'record',
 'invoicePayment' => 'record',
 'bill' => 'record',
 'billPayment' => 'record',
 'event' => 'record',
 'call' => 'record',
 'document' => 'record',

 'product' => 'record',
 'report' => 'record',
 'help' => 'record',
 'timeclock' => 'record',

 'settings' => 'settings',
 );
function pr($arr)
{
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}
