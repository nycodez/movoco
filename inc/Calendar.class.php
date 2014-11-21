<?php
class Calendar
{
	public function __construct($class = 'def', $id = false)
	{
		$this->class = $class .'_cal';
		if($id)
			$this->id = $id;
	}
	function Render($events = array(), $yearmonth = false)
	{
		foreach($events as $k => $v)
			$eventsNew[$v['yearmonth']][$v['day']][] = $v;

		$ymArr = explode('-', $yearmonth);
		$year = $ymArr[0];
		$month = $ymArr[1];
		//$events['2013-06']['19'][] = $event;
		$weekArray = array
			(
			 1 => 'Sun',
			 2 => 'Mon',
			 3 => 'Tue',
			 4 => 'Wed',
			 5 => 'Thu',
			 6 => 'Fri',
			 7 => 'Sat',
			);

		if(!$month)
			$month = date("m");

		if(!$year)
			$year = date("Y");

		$monthName = date('F', mktime(0,0,0,$month,1));

		$unixTime = mktime(0,0,0,$month,1,$year);

		$firstDayNameOfMonth = date("D", $unixTime);

		$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		$prev_year = $year;
		$next_year = $year;
		$prev_month = str_pad(($month - 1), 2, 0, STR_PAD_LEFT);
		$next_month = str_pad(($month + 1), 2, 0, STR_PAD_LEFT);

		if ($prev_month == 0 ) 
		{
			$prev_month = 12;
			$prev_year = $year - 1;
		}

		if ($next_month == 13 ) 
		{
			$next_month = '01';
			$next_year = $year + 1;
		}

		echo '<table id="'. $this->id .'" class="'. $this->class .'">';
		//	<tr><td rowspan=9 class=calendarSidebar><div id=calendarSidebarDiv></div></td></tr>
		echo '<tr>
			<th><a href=/event/default/'. $prev_year .'-'. $prev_month .'><<</a></th>
			<td colspan=5 class="'. $this->class .'_title">'. $monthName .' '. $year.'</td>
			<th><a href=/event/default/'. $next_year .'-'. $next_month .'>>></a></th>
			</tr>
			<tr>

			<th width=15%>S</th>
			<th width=14%>M</th>
			<th width=14%>T</th>
			<th width=14%>W</th>
			<th width=14%>T</th>
			<th width=14%>F</th>
			<th width=15%>S</th>
			</tr>
			<tr>';

		$started = false;
		$currentDay = 1;
		$todaysDateForTest = date("Y-m-d");

		for($placeholder=1; $placeholder<=42; $placeholder++)
		{
			if($weekArray[$placeholder] == $firstDayNameOfMonth)
				$started = true;

			if($started && $currentDay <= $days)
			{
				if("$year-$month-$currentDay" == $todaysDateForTest)
					$dayClass = 'dayCellToday';
				else
					$dayClass = 'dayCell';

				$paddedDay = str_pad($currentDay, 2, 0, STR_PAD_LEFT);
				$paddedMonth = str_pad($month, 2, 0, STR_PAD_LEFT);

				echo '<td valign=top class="'. $this->class .'_'. $dayClass .'">
					<div span=big_cal_numberSpan><a href="/event/day/'. $year .'-'. $paddedMonth .'-'. $paddedDay .'">'. $currentDay .'</a></span>';

				foreach($eventsNew["$year-$paddedMonth"][$paddedDay] as $k => $v)
				{
					echo '<br />'. $v['type'] .' - <a href="/event/view/'. $v['_id'] .'">'. $v['name'] .'</a>';
				}

				echo '</td>';

				$currentDay++;
			}
			else
				echo '<td></td>';

			if($placeholder % 7 == 0)
				echo '</tr>
					<tr>';
		}

		echo '</tr>
			</table>';
	}
}
