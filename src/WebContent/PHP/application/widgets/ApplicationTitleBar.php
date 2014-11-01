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
* Created: 2/11/2013
*/

if (!defined('ROOT_PATH')){
	header('This is not the page you are looking for', true, 404);
	include( dirname(dirname(dirname(dirname(__FILE__)))) . '/404.html');
	exit();
}

require_once APP_PATH . "ui/components/containers/TitleBar.php";
require_once APP_PATH . "ui/components/containers/Link.php";
require_once APP_PATH . "ui/components/containers/Form.php";
require_once APP_PATH . "ui/components/Button.php";

$titleBar = new TitleBar();
$link = new Link('/','Fringe Forums');
$link->class = 'title';
$titleBar->addComponent($link);

$authForm = new Form();
$authForm->id = 'authentication';
$authForm->class = 'navbar-form pull-right';
if (isSet($_SESSION['authenticated']) && $_SESSION['authenticated'] = 1){
	
	// TODO need to have an edit function...
	if ((isSet($_GET['new']) && !isSet($_GET['id'])) || (!isSet($_GET['view']) || $_GET['view'] != 'post')){
		$post = new Button('Post');
		$post->id = 'addPost';
		$post->class = 'btn';
		$post->onclick = 'PostService.addPost()';
		
		$authForm->addComponent($post);
	}
	
	$submit = new Button('Log out');
	$submit->id = 'logout';
	$submit->class = 'btn';
	$submit->onclick = 'CredentialsService.logout()';

	$authForm->addComponent($submit);
	
	$titleBar->addComponent($authForm);
	
}

$titleBar->build(1);
?>
