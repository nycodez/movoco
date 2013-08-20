<?php
class FormScrub
{
	public static function Sanitize($form)
	{
		$arr = array();
		foreach($form as $k => $v)
		{
			$arr[$k] = htmlentities($v, ENT_COMPAT, 'UTF-8');
		}
		return $arr;
	}
}
