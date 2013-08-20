<?php
class Record extends Controller
{
	public $tabs = array
		(
		 '{open}'=>'/record',
		 '{closed}'=>'/record/closed',
		 '{recent}'=>'/record/recent',
		 '{addNew}'=>'/record/new',
		);
	public $headers = array
		(
		 '{type}'=>'',
		 '{name}'=>'/record/view/{_id}',
		 '{userName}'=>'',
		 '{clientName}'=>'/client/view/{client}',
		);

	function Record_Default()
	{
		$user = $_SESSION['uid'];
		$arr['records'] = ModelLoad::Load('record', 'search', array('user'=>$user,'status'=>'open'));
		$arr['currentTab'] = '/record';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('record', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	function Record_Closed()
	{
		$user = $_SESSION['uid'];
		$arr['records'] = ModelLoad::Load('record', 'search', array('user'=>$user,'status' => 'closed'));
		$arr['currentTab'] = '/record/closed';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('record', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	function Record_Recent()
	{
		$arr['records'] = ModelLoad::Load('record', 'search', array('status'=>'open'));
		$arr['currentTab'] = '/record/recent';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('record', 'default', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}

	public function Record_New()
	{
		$arr['currentTab'] = '/record/new';
		$arr['tabs'] = $this->tabs;
		$arr['headers'] = $this->headers;
		$view = new View('record', 'new', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Record_Add()
	{
		$user = $_SESSION['uid'];
		$login = $_SESSION['username'];
		$userName = ModelLoad::Load('user', 'getName', $user);
		$info = $_POST[$_POST['formName']];

		if(($_FILES['file']['tmp_name'][0] !== '') && $files = $_FILES['file'])
		{
			for($i=0; $i<count($files['name']); $i++)
			{
				$arr = array();
				$arr['file']['name'] = $files['name'][$i];
				$arr['file']['type'] = $files['type'][$i];
				$arr['file']['tmp_name'] = $files['tmp_name'][$i];
				$arr['file']['error'] = $files['error'][$i];
				$arr['file']['size'] = $files['size'][$i];
				$arr['user'] = $user;
				$arr['userName'] = $userName;
				$arr['login'] = $login;

				$fileId = (string) ModelLoad::Load('record', 'storeFile', $arr);

				$info['files'][$fileId] = array
					(
					 '_id' => $fileId,
					 'name' => $files['name'][$i],
					 'type' => $files['type'][$i],
					 'size' => $files['size'][$i],
					 'date' => new MongoDate(),
					 'uploadUser' => $user,
					 'uploadUserName' => $userName,
					 'uploadLogin' => $login,
					);
			}
		}
		//		$new = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info['ifActive'] = true;
		$info['type'] = 'record';
		$info['clientName'] = ModelLoad::Load('client', 'getName', $info['client']);
		$info['userName'] = ModelLoad::Load('user', 'getName', $info['user']);
		$result = ModelLoad::Load('record', 'add', $info);
//		Logger::Write('add', 'record', $r['_id']);
		$view = new View('record');
		$view->Redirect();
	}
	public function Record_View($id)
	{
		$arr['currentTab'] = '/record/view';
		$arr['tabs'] = $this->tabs;
		$arr['vals'] = ModelLoad::Load('record', 'get', $id);
		$view = new View('record', 'view', $arr);
		$view->BuildHeaders();
		echo $view->Render();
	}
	public function Record_Download($id)
	{
		$arr = ModelLoad::Load('record', 'getFile', $id);
		$fileType = $arr->file['file']['type'];
		$fileName = $arr->file['file']['name'];
		$fileSize = $arr->file['file']['size'];
		header("Content-Type: {$fileType}");
		header("Content-Disposition: inline; filename={$fileName}");
		header("Content-Length: {$fileSize}");
		echo $arr->getBytes();
	}
	public function Record_Update()
	{
		$user = $_SESSION['uid'];
		$login = $_SESSION['username'];
		$userName = ModelLoad::Load('user', 'getName', $user);
		$info = $_POST[$_POST['formName']];

		if(($_FILES['file']['tmp_name'][0] !== '') && $files = $_FILES['file'])
		{
			for($i=0; $i<count($files['name']); $i++)
			{
				$arr = array();
				$arr['file']['name'] = $files['name'][$i];
				$arr['file']['type'] = $files['type'][$i];
				$arr['file']['tmp_name'] = $files['tmp_name'][$i];
				$arr['file']['error'] = $files['error'][$i];
				$arr['file']['size'] = $files['size'][$i];
				$arr['user'] = $user;
				$arr['userName'] = $userName;
				$arr['login'] = $login;

				$fileId = (string) ModelLoad::Load('record', 'storeFile', $arr);

				$info['files'][$fileId] = array
					(
					 '_id' => $fileId,
					 'name' => $files['name'][$i],
					 'type' => $files['type'][$i],
					 'size' => $files['size'][$i],
					 'date' => new MongoDate(),
					 'uploadUser' => $user,
					 'uploadUserName' => $userName,
					 'uploadLogin' => $login,
					);
			}
		}
//		$info = FormScrub::Sanitize($_POST[$_POST['formName']]);
		$info['clientName'] = ModelLoad::Load('client', 'getName', $info['client']);
		$info['userName'] = ModelLoad::Load('user', 'getName', $info['user']);
		$r = ModelLoad::Load('record', 'save', $info);
//		Logger::Write('update', 'record', $info['_id']);
		$view = new View('record');
		$view->Redirect();
	}
}
