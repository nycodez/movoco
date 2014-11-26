<html>
<head>
	<title>Testing MVC framework</title>
	<style type="text/css">@import url(/css/themes/default/main.css);</style>
	<style type="text/css">@import url(/css/jquery.ui.all.css);</style>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/jquery-ui.js"></script>
	<script type="text/javascript" src="/js/basic.js.php"></script>
</head>

<body>

<div id=langaugeSelector>
<?php
	global $lang;
	$langForm = new FormBuilder('languageSelector');
	echo $langForm->BeginForm();
	echo $langForm->AddSelect('code', false, $lang->languageList, $lang->code, array('onchange'=>"this.form.submit();"));
	echo $langForm->EndForm();
?>
</div>

<div id=mainMenu>
	<ul>
		<li id="Home-menu"><a href="/">{home}</a>
		</li>
		<li id="Clients-menu"><a href="/client">{clients}</a>
			<ul>
				<li><a href="/contact" title="Contacts">{contacts}</a></li>
			</ul>
		</li>
		<li id="Records-menu"><a href="/record">{records}</a>
		</li>
		<!--li id="Products-menu"><a href="/product">{products}</a>
		</li>
		<li id="Management-menu"><a href="/management">{management}</a>
			<ul>
				<li><a href="/management/associations" title="List Associations">{associations}</a></li>
			</ul>
		</li>
		<li id="Sales-menu"><a href="/sale">{sales}</a>
			<ul>
				<li><a href="/sale/leads" title="View Sales Leads">{leads}</a></li>
				<li><a href="/sale/conversions" title="View Recent Conversions">{conversions}</a></li>
			</ul>
		</li--!>
		<li id="Accounting-menu"><a href="/accounting">{accounting}</a>
			<ul>
				<li><a href="/accounting/invoices" title="View Outstanding Invoices">{open invoices}</a></li>
				<li><a href="/accounting/bills" title="View Unpaid Bills">{unpaid bills}</a></li>
			</ul>
		</li>
		<li id="Events-menu"><a href="/event">{events}</a>
		</li>
		<!--li id="Timeclock-menu"><a href="/timeclock">{timeclock}</a>
			<ul>
				<li><a href="/timeclock/in" title="Clock In">{clock in}</a></li>
				<li><a href="/timeclock/out" title="Clock Out">{clock out}</a></li>
			</ul>
		</li--!>
		<li id="Reports-menu"><a href="/report">{reports}</a>
		</li>
		<li id="Settings-menu"><a href="/settings">{settings}</a>
			<ul>
				<li><a href="/user" title="User List">{users}</a></li>
				<li><a href="/index.php?logout=true" title="Log User Out">{log out}</a></li>
			</ul>
		</li>
		<!--li id="Help-menu"><a href="/help">{help}</a>
		</li--!>
	</ul>
</div>

<div id=mainBody>

