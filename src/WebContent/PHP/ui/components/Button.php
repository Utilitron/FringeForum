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
require_once APP_PATH . "ui/Component.php";
/**
 * Button Class
 */
Class Button extends Component {
	/**
	* Type
	* 
	* @var type
	*/
	protected $type = 'button';
	
	/**
	 * Text
	 *
	 * @var text
	 */
	public $text;
	
	/**
	 * OnClick
	 *
	 * @var onclick
	 */
	public $onclick;
	/**
	 * Disabled
	 *
	 * @var disabled
	 */
	public $disabled = false;
	
	/**
	 * Constructor
	 */
	public function __construct($text) {
		 parent::__construct();
		 
		 $this->element = 'button';
		 $this->text = $text;
	}
	
	/**
	 * Build
	 */
	public function build($count_indent=0) {
		$count_indent++;
		
		for ($i = 0; $i < $count_indent; $i++) echo "\t";
				
		echo '<'. $this->element .' type="'. $this->type . '"';
			if (!is_null($this->id)){
			echo ' id="'. $this->id .'"';
			echo ' name="'. $this->id .'"';
		}
		if (!is_null($this->class))
			echo ' class="'. $this->class .'"';
		if (!is_null($this->onclick))
			echo ' onclick="'. $this->onclick .'"';
		if ($this->disabled)
			echo ' disabled="true"';
		echo '>';
		
		if (!is_null($this->text))
			echo $this->text;
		echo '</'. $this->element .'>'. "\r\n";
	}
	
}
?>
