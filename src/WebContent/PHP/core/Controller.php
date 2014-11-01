<?php 
/*******************************************************************
* Copyright (C) 2012 utilitron.net
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
if (!defined('ROOT_PATH') || !defined('LOADER')){
	header('This is not the page you are looking for', true, 404);
	include( dirname(dirname(dirname(dirname(__FILE__)))) . '/404.html');
	exit();
}
require_once APP_PATH . "core/Core.php";
/**
 * Controller Class
 */
class Controller extends Core {
	/**
	 * Service
	 */
	protected $service;
	
	/**
	 * Constructor
	 */
	public function __construct($service) {
		$this->service = $service;
	}
}
?>
