<?php 
/*******************************************************************
* Copyright (C) 2012 utilitron.com
*
* This software is provided 'as-is', without any express or implied
* warranty. In no event will the authors be held liable for any damages
* arising from the use of this software.

* Permission is granted to anyone to use this software for any purpose,
* including commercial applications, and to alter it and redistribute it
* freely, without restriction.
*
* AUTHOR
* ======
* Erik Ashcraft
*
* Created: 12/29/2012
*/

if (!defined('LOADER')) define('LOADER', true);

if (!defined('ROOT_PATH')){
	define('ROOT_PATH', str_replace("\\", "/", dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/');
	define('APP_PATH', ROOT_PATH . 'WebContent/PHP/');
}

require_once APP_PATH . "core/Controller.php";
require_once APP_PATH . "application/services/CredentialsService.php";

/**
 * Controller Class
 */
class CredentialsController extends Controller {
	public $authenticated;
	 
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(new CredentialsService());

		//if (isset($_POST["register"]))
		//	$this->registerNewUser();
		if (isset($_POST["logout"])){
			$this->service->doLogout();
			$this->authenticated = 0;
		} elseif (!empty($_SESSION['user_id']) && ($_SESSION['authenticated'] == 1)){
			$_SESSION['user_id'] = $this->service->loginWithSessionData() > 0;
			if ($_SESSION['user_id'] > 0)
				$_SESSION['authenticated'] = $this->authenticated = 1;
			else
				$_SESSION['authenticated'] = $this->authenticated = 0;
		}elseif (isset($_POST["login"])) {
			
			if (!empty($_POST['email']) && !empty($_POST['password'])){
				$_SESSION['user_id'] = $this->service->doLogin();
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['password'] = $_POST['password'];
				if ($_SESSION['user_id'] > 0)
					$_SESSION['authenticated'] = $this->authenticated = 1;
				else 
					$_SESSION['authenticated'] = $this->authenticated = 0;
			}
			
			//elseif (empty($_POST['user_name']))
			//	$this->errors[] = "Username field was empty.";
			//elseif (empty($_POST['user_password']))
			//	$this->errors[] = "Password field was empty.";
		}
		
		
	}
}
?>
