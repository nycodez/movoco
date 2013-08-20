<?php
class Product extends Controller
{
	public $tabs = array
		(
		 '{products}'=>'/product',
		 '{addNew}'=>'/product/new',
		);
	public $headers = array
		(
		 '{name}'=>'/product/view/{_id}',
		 '{class}'=>'',
		 '{price}'=>'',
		);

	public function Product_Default()
	{
		$arr['products'] = ModelLoad::Load('product', 'search', array('type'=>'product'));
		$arr['currentTab'] = '/product';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('product', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Product_Added()
	{
		$arr['products'] = ModelLoad::Load('product', 'defaultModel');
		$arr['currentTab'] = '/product/added';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('product', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Product_Viewed()
	{
		$arr['products'] = ModelLoad::Load('product', 'defaultModel');
		$arr['currentTab'] = '/product/viewed';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('product', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Product_Active()
	{
		$arr['products'] = ModelLoad::Load('product', 'defaultModel');
		$arr['currentTab'] = '/product/active';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('product', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Product_Inactive()
	{
		$arr['products'] = ModelLoad::Load('product', 'defaultModel');
		$arr['currentTab'] = '/product/inactive';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('product', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Product_New()
	{
		$arr['currentTab'] = '/product/new';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('product', 'new', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Product_Add()
	{
//		$new = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info = $_POST[$_POST['formName']];
		$info['ifActive'] = true;
		$info['type'] = 'product';
		$result = ModelLoad::Load('product', 'add', $info);
		$view = new View('product');
		echo $view->Redirect();
	}
	public function Product_Update()
	{
//		$info = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info = $_POST[$_POST['formName']];
//		Logger::Write("update", 'product', $info['_id']);
		$result = ModelLoad::Load('product', 'save', $info);
		$view = new View('product');
		echo $view->Redirect();
	}
	public function Product_Delete($id)
	{
		ModelLoad::Load('product', 'deleteOne', $id);

		$arr['products'] = ModelLoad::Load('product', 'getAll');

		$view = new View('product', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Product_View($id)
	{
		$arr['vals'] = ModelLoad::Load('product', 'get', $id);
		$arr['currentTab'] = '/product/view';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('product', 'view', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Product_All()
	{
		$arr['products'] = ModelLoad::Load('product', 'getAll');
		$view = new View('product', 'all', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
}
