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
* Created: 1/12/2013
*/

if (!defined('ROOT_PATH')){
	header('This is not the page you are looking for', true, 404);
	include( dirname(dirname(dirname(dirname(__FILE__)))) . '/404.html');
	exit();
}

require_once APP_PATH . "ui/components/containers/Canvas.php";

require_once APP_PATH . "application/widgets/PostPanel.php";
require_once APP_PATH . "application/widgets/ApplicationTitleBar.php";


$postPanel = new PostPanel();

$canvas = new Canvas();
$canvas->class = 'canvas container';
$canvas->addComponent($postPanel);
$canvas->build(1);

?>

<script type="text/javascript">
	CommentService = new fringe.util.AjaxUtil();
	CommentService.url = 'comment/index.php';
	
	CommentService.addComment = function (){
	    var popup = document.createElement('div');
	    popup.className = 'popup';
	    popup.id = 'popup';
	
	    var content = document.createElement('div');
	    content.className = 'hero-unit expand';
	
	    var title = document.createElement('div');
	    title.textContent = "Post Comment";
	
	    var close = document.createElement('div');
	    close.className = 'close_btn btn pull-right';
	    close.textContent = "X";
	    close.onclick = function () {
	        var popup = document.getElementById('popup');
	        document.body.removeChild(popup);
	    };
	
	    var form = document.createElement('form');
	
	    var comment = document.createElement('textarea');
	    comment.className = 'span3';
	    comment.name = 'comment';
	    comment.id = 's_comment';
	    comment.rows = 6;
	    comment.required = true;
	
	    var submit = document.createElement('button');
	    submit.type = 'button';
	    submit.className = 'btn pull-right';
	    submit.name = 'submit';
	    submit.id = 's_submit';
	    submit.textContent = 'Submit';
	    submit.onclick = CommentService.createAccount;
	
	    form.appendChild(comment);
	    form.appendChild(submit);
	
	    content.appendChild(close);
	    content.appendChild(title);
	    content.appendChild(form);
	    popup.appendChild(content);
	    document.body.appendChild(popup);
	};
</script>
