<?php
require_once('inc/config.inc.php');
require_once('inc/modules.inc.php');

if($_REQUEST['string'])
{
	$mvcuri = explode('/', strtolower($_REQUEST['string']));
	foreach($mvcuri as $k => $v)
	{
		if(!$v)
		{
			unset($mvcuri[$k]);
		}
	}
}
else
{
	$mvcuri = Array(0=>$defaultController);
}

$filepath = $base.'/'.$mvcuri[0].'/c/'.$mvcuri[0].'.php';

if(file_exists($filepath))
{
	require_once($filepath);
}
else
{
	echo 'No controller '.$mvcuri[0].' present';
	exit;
}

$classname = ucwords($mvcuri[0]);

if(class_exists($classname))
{
	$class = new $classname;
}
else
{
	echo 'No class '.$classname.' present';
	exit;
}

if(!isset($mvcuri[1]))
{
	$mvcuri[1] = 'default';
}

$methodname = $classname.'_'.ucwords($mvcuri[1]);

if(method_exists($class, $methodname))
{
	if(isset($mvcuri[2]) && $id = $mvcuri[2])
	{
		$class->$methodname($id);
	}
	else
	{
		$class->$methodname();
	}
}
else
{
	echo 'No method '.$methodname.' present';
	exit;
}
