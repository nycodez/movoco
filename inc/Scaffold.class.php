<?php
class Scaffold
{
	public $class;
	public $id;
	public $title;
	public $options = array();
	public $total;
	public $headers;
	public $results;

	public function __construct($name, $class = 'scaffoldTable', $id = false)
	{
		$this->name = $name;
		$this->class = $class;
		if($id)
			$this->id = $id;
	}
	public static function BulletedMenu($tabs = array(), $currentTab = false)
	{
		echo '<div class=scaffoldMenu>
			<ul>';
		foreach($tabs as $k => $v)
		{
			if(isset($currentTab) && $currentTab == $v)
				$thisTab = ' class=selectedItem ';
			else
				$thisTab = ' class=unselectedItem ';

			echo '<li '. $thisTab .'><a href="'. $v .'">'. $k .'</a></li>';
		}
		echo '</ul>
			</div>';
	}
	public function Render($arr, $headers = false, $bookmarks = true)
	{
		echo '<table ';
		if($this->class)
			echo ' class='. $this->class;
		if($this->id)
			echo ' id='. $this->id;
		echo ' >';
		if($headers)
		{
			echo '<tr>';
			if($bookmarks)
				echo '<th width=20px></th>';
			foreach($headers as $k => $v)
			{
				echo '<th>'. $k .'</th>';
			}
			echo '</tr>';
		}
		foreach($arr as $k => $v)
		{
			if($headers)
			{
				echo '<tr>';
				if($bookmarks)
				{
					if($v['bookmarked'])
					{
						echo '<td><font color=gold>&#9733;</font></td>';
					}
					else
					{
						echo '<td>&#9734;</td>';
					}
				}
				foreach($headers as $kk => $vv)
				{
					$kk = str_replace(array('{','}'), '', $kk);
					if($vv)
					{
						preg_match('/{[a-zA-Z_]*}/', $vv, $matches);
						foreach($matches as $vvv)
						{
							$col = str_replace(array('{','}'), '', $vvv);
							$val = (string) $v[$col];
							$url = str_replace($vvv, $val, $vv);
						}
						echo '<td><a href='. $url .'>'. $v[$kk] .'</a></td>';
					}
					else
					{
						echo '<td>';
						switch($kk)
						{
							case 'date':
								global $defaultDateFormat;
								echo date($defaultDateFormat, $v[$kk]->sec);
								break;
							case 'size':
								echo bytesToSize($v[$kk]);
								break;
							default:
								echo $v[$kk];
								break;
						}
						echo '</td>';
					}
				}
				echo '</tr>';
			}
		}
		echo '</table>';
	}
}
