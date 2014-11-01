<?php 
/*******************************************************************
* Copyright (C) 2013 utilitron.com
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
* Created: 3/9/2013
*/

if (!defined('LOADER')) define('LOADER', true);

if (!defined('ROOT_PATH')){
	define('ROOT_PATH', str_replace("\\", "/", dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/');
	define('APP_PATH', ROOT_PATH . 'WebContent/PHP/');
}

require_once APP_PATH . "core/Controller.php";
require_once APP_PATH . "application/services/UserService.php";

/**
 * Controller Class
 */
class UserController extends Controller {
	public $result;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(new UserService());
	}
}
?>
