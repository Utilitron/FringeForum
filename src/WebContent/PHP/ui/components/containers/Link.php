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
* Created: 2/9/2013
*/
if (!defined('ROOT_PATH')){
	header('This is not the page you are looking for', true, 404);
	include( dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/404.html');
	exit();
}
require_once APP_PATH . "ui/components/Container.php";
require_once APP_PATH . "ui/components/Text.php";
/**
 * Link Class
 */
Class Link extends Container {
	/**
	 * href
	 *
	 * @var href
	 */
	protected $href;
	
	/**
	* Text
	* 
	* @var text
	*/
	protected $text;
	
	/**
	 * Bold
	 *
	 * @var bold
	 */
	public $bold = false;
	
	/**
	 * Constructor
	 */
	public function __construct($href, $text=null) {
		parent::__construct();
		 
		$this->element = 'a';
		 
		$this->href = $href;
		if ($text)
		 	$this->text = $text;
	}
	
	/**
	 * Build
	 */
	public function build($count_indent=0) {
		$count_indent++;
		
		for ($i = 0; $i < $count_indent; $i++) echo "\t";
		
		echo '<'. $this->element;
		if (!is_null($this->id))
			echo ' id="'. $this->id .'"';
		if (!is_null($this->class))
			echo ' class="'. $this->class .'"';
		echo ' href="'. $this->href .'"';
		echo '>';
		
		if ($this->text){
			$text = new Text($this->text);
			$text->bold = $this->bold;
			$this->addComponent($text);
		} else if (count($this->components) == 0){
			$text = new Text($this->href);
			$text->bold = $this->bold;
			$this->addComponent($text);
		}
		
		echo "\r\n";
		
		// Loop through the components and run their build actions.
		foreach($this->components as $component) {
			$component->build($count_indent);
		}
		
		for ($i = 0; $i < $count_indent; $i++) echo "\t";
		echo '</'. $this->element .'>'. "\r\n";
	}
	
}
?>
