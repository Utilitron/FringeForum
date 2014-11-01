<?php 
/*******************************************************************
* Copyright (C) 2013 utilitron.net
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
* Created: 2/8/2013
*/
if (!defined('ROOT_PATH')){
	header('This is not the page you are looking for', true, 404);
	include( dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/404.html');
	exit();
}
require_once APP_PATH . "ui/components/Container.php";
require_once APP_PATH . "ui/components/Text.php";
require_once APP_PATH . "ui/components/containers/TitleBar.php";
require_once APP_PATH . "ui/components/containers/Canvas.php";
require_once APP_PATH . "ui/components/containers/ControlBar.php";
/**
 * Panel Class
 */
Class Panel extends Container {
	/**
	 * TitleBar
	 * 
	 * @var titleBar
	 */
	protected $titleBar;
	
	/**
	 * Canvas
	 * 
	 * @var canvas
	*/
	public $canvas;
	
	/**
	 * ControlBar
	 *
	 * @var controlBar
	 */
	protected $controlBar;
	
	/**
	 * Constructor
	 */
	public function __construct($title) {
		parent::__construct();
		 
		$this->element = 'div';
		$this->class = 'panel';
		 
		$this->titleBar = new TitleBar($title);
		$this->canvas = new Canvas();
		$this->controlBar = new ControlBar;
		 
		$this->addComponent($this->titleBar);
		$this->addComponent($this->canvas);
		$this->addComponent($this->controlBar);
		 		 
		/*
		var closeButton = document.createElement('a');
		closeButton.className = 'close';
		closeButton.href = '#';
		closeButton.onclick = function() {
			self.close.call(self);
		};
		closeButton.textContent = 'Close';
		 
		this.titleBar.element.appendChild(closeButton);
		*/
	}
}
?>
