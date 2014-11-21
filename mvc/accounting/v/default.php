<?php

echo Scaffold::BulletedMenu($tabs, $currentTab);

?>
<h2 class=basicAccountingPageHeader>Company Name - Accounting Home</h2>
<div class=basicAccountingDiv style="width: 300px; height: 150px;">
Company
<ul>
	<li><a href="/accounting/options">options</a></li>
	<li><a href="/accounting/chartofAccounts">chart of accounts</a></li>
	<li><a href="/accounting/itemsServices">items & services</a></li>
	<li><a href="/accounting/budgeting">budgeting</a></li>
	<li><a href="/accounting/employeeAdmin">employee administration</a></li>
	</ul>
</div>
<div class=basicAccountingDiv style="width: 300px; height: 150px;">
Banking
<ul>
	<li><a href="/accounting/recordDeposits">record deposits</a></li>
	<li><a href="/accounting/transferFunds">transfer funds</a></li>
	<li><a href="/accounting/reconcile">reconcile</a></li>
</ul>
</div>
<div class=basicAccountingDiv style="width: 300px; height: 150px;">
Reports
<form  name="chooseReport" action="" method="POST" accept-charset="utf-8" target="_report" onsubmit="return ValidateForm(this);">
			<input type="hidden" name="formName" value="report">
			<input type="hidden" name="report[FormName]" value="report" />
<input  type="hidden" name="report[groupid]" value="55" />
<select id="reportSelected" name="report[report]" class="">
	<option value="" selected="selected">Accounting Report</option>
	<option value="">----------------</option>
	<option value="bankBalances">Bank Balances</option>
	<option value="collections">Collections</option>
	<option value="deposits">Deposit Detail</option>
	<option value="generalLedger">General Ledger</option>
	<option value="profitLossCash">---P&L Cash Basis</option>
	<option value="trialBalance">Trial Balance</option>
	<option value="vendorBalance">Vendor Balance Detail</option>
</select>
<br />
<br />
<input  type="text" name="report[dates][start]" value="05/01/2013" size="10" id="start" class="datepicker" />
to <input  type="text" name="report[dates][end]" value="05/31/2013" size="10" id="end" class="datepicker" />
</br /><br />
<input  type="submit" name="func" value="Run Report" />
</form>
</div>

<br style="clear: both;" />

<div class=basicAccountingDiv style="width: 300px; height: 150px;">
<div style="float: right;">+</div>
Vendors
<ul>
	<li><a href="/accounting/vendorList">vendor list</a></li>
	<li><a href="/accounting/enterBills">enter bills</a></li>
	<li><a href="/accounting/payBills">pay bills</a></li>
	<li><a href="/accounting/writeChecks">write checks</a></li>
	<li><a href="/accounting/printChecks">print checks</a></li>
</ul>
</div>
<div class=basicAccountingDiv style="width: 300px; height: 150px;">
<div style="float: right;">+</div>
Customers
<ul>
	<li><a href="/accounting/customerList">customer list</a></li>
	<li><a href="/accounting/createInvoice">create invoice</a></li>
	<li><a href="/accounting/receivePayment">receive payment</a></li>
	<li><a href="/accounting/generateLate">generate late fees</a></li>
	<li><a href="/accounting/generateInterest">generate interest charges</a></li>
</ul>
</div>

<br style="clear: both;" />

<div class=basicAccountingDiv style="width: 650px; height: 150px;">
Account Balances
<table border=0 width=100%>
	<tr><td><a href="/accounting/account/123456">1003 - United Bank-Operating Account</a></td><td align=right>22,567.45</td></tr>
	<tr><td><a href="/accounting/account/123456">1004 - United Bank-Money Market</a></td><td align=right>107,574.52</td></tr>
	<tr><td><a href="/accounting/account/123456">1200 - Accounts Receivable</a></td><td align=right>129,983.19</td></tr>
	<tr><td><a href="/accounting/account/123456">2000 - Accounts Payable</a></td><td align=right>0.00</td></tr>
</table>
</ul>
</div>
<div class=basicAccountingDiv style="width: 650px; height: 150px;">
<div style="float: right;">+</div>
Open Customer Invoices
<table border=0 width=100%>
	<tr><td><a href="/accounting/invoice/352">Gallant</a></td><td align=right>594.00</td></tr>
	<tr><td><a href="/accounting/invoice/346">Mekonnen</a></td><td align=right>594.00</td></tr>
	<tr><td><a href="/accounting/invoice/362">Brown</a></td><td align=right>593.83</td></tr>
	<tr><td><a href="/accounting/invoice/724">Benson</a></td><td align=right>593.61</td></tr>
	<tr><td><a href="/accounting/invoice/567">Rice</a></td><td align=right>593.55</td></tr>
	<tr><td><a href="/accounting/invoice/835">Marshall</a></td><td align=right>588.86</td></tr>
</table>
</div>
<div class=basicAccountingDiv style="width: 650px; height: 150px;">
<div style="float: right;">+</div>
Unpaid Vendor Bills
<table border=0 width=100%>
	<tr><td><a href="/accounting/bill/132">Keystone Insurance</a></td><td align=right>594.00</td></tr>
	<tr><td><a href="/accounting/bill/312">Bridge Landscape</a></td><td align=right>194.00</td></tr>
	<tr><td><a href="/accounting/bill/231">GEICO</a></td><td align=right>23.00</td></tr>
	<tr><td><a href="/accounting/bill/123">Southern Power</a></td><td align=right>88.86</td></tr>
</table>
</div>
