<?php
date_default_timezone_set('America/New_York');
$defaultController = 'splash';
$base = dirname(dirname(__FILE__)).'/mvc';
$defaultDateFormat = 'm/d/Y g:ia';
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
function bytesToSize($bytes, $precision = 0)
{	
	$kilobyte = 1024;
	$megabyte = $kilobyte * 1024;
	$gigabyte = $megabyte * 1024;
	$terabyte = $gigabyte * 1024;

	if (($bytes >= 0) && ($bytes < $kilobyte)) {
		return $bytes . ' B';

	} elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
		return round($bytes / $kilobyte, $precision) . ' KB';

	} elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
		return round($bytes / $megabyte, $precision) . ' MB';

	} elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
		return round($bytes / $gigabyte, $precision) . ' GB';

	} elseif ($bytes >= $terabyte) {
		return round($bytes / $terabyte, $precision) . ' TB';
	} else {
		return $bytes . ' B';
	}
}
