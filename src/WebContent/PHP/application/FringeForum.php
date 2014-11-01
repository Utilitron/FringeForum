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

if (!defined('ROOT_PATH')){
	header('This is not the page you are looking for', true, 404);
	include( dirname(dirname(dirname(dirname(__FILE__)))) . '/404.html');
	exit();
}


require_once APP_PATH . "core/Core.php";

/**
* Extends the Core class with the intent of using
* PHP sessions to store user ids and access tokens.
*/
class FringeForum extends Core {
	const COOKIE_NAME = 'fringeforum';

	// We can set this to a high number because the main session
	// expiration will trump this.
	const COOKIE_EXPIRE = 31556926; // 1 year

	/**
	 * Constructor
	 * 
	 * The parent constructor, starts a PHP session to 
	 * store the user ID and access token
	 */
	public function __construct() {
		parent::__construct();
	}
}
