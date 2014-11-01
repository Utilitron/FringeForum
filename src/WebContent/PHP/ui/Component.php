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
if (!defined('ROOT_PATH')){
	header('This is not the page you are looking for', true, 404);
	include( dirname(dirname(dirname(dirname(__FILE__)))) . '/404.html');
	exit();
}
require_once APP_PATH . "ui/UiObject.php";
/**
 * Component Class
 */
class Component extends UiObject {
	
	/**
	* HTML Parent
	* 
	* @var parentElement
	*/
	public $parentElement;
	/**
	 * Constructor
	 */
	public function __construct() {
	}
	/**
	 * Build the output
	 */
	public function build($count_indent=0) {
		// Most elements will just be a div, otherwise overwrite this with what needs to be added.
		//this.element = document.createElement('div');
	}
}
?>
