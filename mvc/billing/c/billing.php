<?php
class Billing extends Controller
{
	public $tabs = array
		(
		 '{snapshot}' => '/billing',
		 '{invoices}' => '/billing/invoices',
		 '{bills}' => '/billing/bills',

		 '{company}' => '/billing/company',
		 '{banking}' => '/billing/banking',
		 '{vendors}' => '/billing/vendors',
		 '{customers}' => '/billing/customers',
		 '{reports}' => '/billing/reports',
		);
	public $headers = array
		(
		 '{name}' => '/client/view/{_id}',
		 '{userName}' => '',
		 '{type}' => '',
		 '{account}' => '',
		);

	public function Billing_Default()
	{
		$arr['currentTab'] = '/billing';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('billing', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Billing_Balances()
	{
		$arr['currentTab'] = '/billing/balances';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('balances', 'invoices', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Billing_Invoices()
	{
		$arr['currentTab'] = '/billing/invoices';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('billing', 'invoices', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Billing_Bills()
	{
		$arr['currentTab'] = '/billing/bills';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('billing', 'bills', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
}
