<?php
class Accounting extends Controller
{
	public $tabs = array
		(
		 '{snapshot}' => '/accounting',
		 '{invoices}' => '/accounting/invoices',
		 '{bills}' => '/accounting/bills',

		 '{company}' => '/accounting/company',
		 '{banking}' => '/accounting/banking',
		 '{vendors}' => '/accounting/vendors',
		 '{customers}' => '/accounting/customers',
		 '{reports}' => '/accounting/reports',
		);
	public $headers = array
		(
		 '{name}' => '/client/view/{_id}',
		 '{userName}' => '',
		 '{type}' => '',
		 '{account}' => '',
		);

	public function Accounting_Default()
	{
		$arr['currentTab'] = '/accounting';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('accounting', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Accounting_Balances()
	{
		$arr['currentTab'] = '/accounting/balances';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('balances', 'invoices', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Accounting_Invoices()
	{
		$arr['currentTab'] = '/accounting/invoices';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('accounting', 'invoices', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Accounting_Bills()
	{
		$arr['currentTab'] = '/accounting/bills';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('accounting', 'bills', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
}
