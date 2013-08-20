<?php

session_start();

$auth = new Auth();

if(isset($_REQUEST['logout']))
{
	$auth->Logout();
}
elseif(isset($_REQUEST['func']) && $_REQUEST['func'] == 'Login')
{
	$auth->Authenticate($_POST['login'], $_POST['pass']);
}
elseif(isset($_REQUEST['func']) && $_REQUEST['func'] == 'Add User')
{
	$auth->AddAdminUser($_POST['login'], $_POST['pass']);
	$auth->Login();
}
elseif(isset($_SESSION) && $_SESSION['authenticated'] && $_SESSION['username'] && $_SESSION['password'])
{
	$auth->Confirm($_SESSION['username'], $_SESSION['password'], session_id());
}
else
{
	$auth->Login();
}

class Auth
{
	public function Login()
	{
		$result = ModelLoad::Load('user', 'checkForAnyUsers');
		if($result > 0)
		{
			echo '<form method=post name="loginForm">
				<input type=text name=login class=login placeholder="login" />
				<input type=password name=pass class=login placeholder="password" />
				<input type=submit name=func value=Login class=inputButton />
				</form>';
		}
		elseif($result == 0)
		{
			echo '<p>Add an admin user to get started</p>
				<form method=post name="addAdminForm">
				<input type=text name=login class=login placeholder="login" />
				<input type=password name=pass class=login placeholder="password" />
				<input type=submit name=func value="Add User"class=inputButton />
				</form>';
		}
		exit;
	}
	public function Authenticate($login, $secret)
	{
		$secret = md5($secret);
		$login = strtolower($login);
		$result = ModelLoad::Load('user', 'search', array('login'=>$login,'secret'=>$secret,'ifActive'=>true));
		if($result->count() == 1)
		{
			foreach($result as $v)
			{
				$id = (string) $v['_id'];
			}

			$session = session_id();

			$_SESSION['authenticated'] = TRUE;
			$_SESSION['username'] = $login;
			$_SESSION['password'] = $secret;
			$_SESSION['session'] = $session;
			$_SESSION['uid'] = $id;

			$doc = array
				(
					'_id' => $id,
					'login' => $login,
					'session' => $session,
					'ip' => $_SERVER['REMOTE_ADDR'],
					'date' => date("Y-m-d h:i:s O"),
				);

			ModelLoad::Load('user', 'save', $doc);

			unset($_REQUEST);

			return true;
		}
		else
		{
			$line = $_SERVER['HTTP_HOST'] .'|'. $_SERVER['REMOTE_ADDR'] .'|'. $login .'|'. date("Y-m-d h:i:s") .'|'. $_SERVER['HTTP_USER_AGENT'] ."\n";
			$f = fopen("logs/failedLogin", "a");
			fwrite($f, $line, strlen($line)); 
			fclose($f); 

			$this->Login();
			exit;
		}
	}
	public function AddAdminUser($login, $secret)
	{
		$login = strtolower($login);
		$secret = md5($secret);
		$result = ModelLoad::Load('user', 'add', array('login'=>$login,'secret'=>$secret,'type'=>'user','ifActive'=>true));
	}
	public function Confirm($login, $secret, $session)
	{
		$login = strtolower($login);
		$result = ModelLoad::Load('user', 'search', array('login'=>$login,'secret'=>$secret,'session'=>$session,'ifActive'=>true));
		
		if($result->count() !== 1)
		{
			$this->Login();
			exit;
		}
		return true;
	}
	public function Logout()
	{
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		$_SESSION = array();
		session_destroy();
		unset($_REQUEST['logout']);
		$url = $_SERVER['HTTP_HOST'];
		header("Location: http://{$url}");
		exit;
	}
}
