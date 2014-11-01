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
* AUTHORhttp://utilitron.net/rust/brutal%20layout.jpg
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
 * Text Class
 */
Class TextArea extends Component {
	
	/**
	 * Rows
	 *
	 * @var rows
	 */
	public $rows;
	
	/**
	 * Columns
	 *
	 * @var columns
	 */
	public $columns;
	
	/**
	 * Placeholder
	 *
	 * @var placeholder
	 */
	public $placeholder;
	
	/**
	 * Required
	 *
	 * @var required
	 */
	public $required;
	
	/**
	 * Value
	 *
	 * @var value
	 */
	public $value;
	
	/**
	 * Max Length
	 *
	 * @var maxlength
	 */
	public $maxlength;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		 parent::__construct();
		 
		 $this->element = 'textarea';
	}
	
	/**
	 * Build
	 */
	public function build($count_indent=0) {
		$count_indent++;
		
		for ($i = 0; $i < $count_indent; $i++) echo "\t";
		echo '<'. $this->element;
		if (!is_null($this->id)){
			echo ' id="'. $this->id .'"';
			echo ' name="'. $this->id .'"';
		}
		if (!is_null($this->class))
			echo ' class="'. $this->class .'"';
		if (!is_null($this->rows))
			echo ' rows="'. $this->rows .'"';
		if (!is_null($this->columns))
			echo ' cols="'. $this->columns .'"';
		if (!is_null($this->placeholder))
			echo ' placeholder="'. $this->placeholder .'"';
		if (!is_null($this->required))
			echo ' required="'. $this->required .'"';
		if (!is_null($this->maxlength))
			echo ' maxlength="'. $this->maxlength .'"';
		echo '>'. "\r\n";
		if (!is_null($this->value))
			echo $this->value ."\r\n";
		echo '</'. $this->element .'>'. "\r\n";
	}
	
}
?>
