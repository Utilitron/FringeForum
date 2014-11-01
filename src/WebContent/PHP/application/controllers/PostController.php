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
* Created: 2/10/2013
*/

if (!defined('LOADER')) define('LOADER', true);

if (!defined('ROOT_PATH')){
	define('ROOT_PATH', str_replace("\\", "/", dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/');
	define('APP_PATH', ROOT_PATH . 'WebContent/PHP/');
}

require_once APP_PATH . "core/Controller.php";
require_once APP_PATH . "application/services/PostService.php";

/**
 * Controller Class
 */
class PostController extends Controller {
	public $result;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(new PostService());
	}
	
	public function getAllPosts() {
		$this->result = $this->service->getAllPosts();
		echo "{posts:". json_encode($this->result) ."}";
	}
	
	public function searchPosts() {
		$start = 0;
		$limit = 20;
		$tagName = '';
		$distance = '';
		
		if (isset($_GET["start"]))
			$start = (int) trim($_GET['start']);

		if (isset($_GET["limit"]))
			$limit = (int) trim($_GET["limit"]);
		
		if (isset($_GET["name"]))
			$tagName = $_GET["name"];
		
		if (isset($_GET["distance"]))
			$distance = $_GET["distance"];
		
		$this->result = $this->service->searchPosts($start,$limit,$tagName, $distance);
		
		$start = $start + $limit;
		echo "{posts:". json_encode($this->result) .", start:". $start ."}";
	}
	
	public function createPost() {
		if (isset($_POST["title"]))
			$title = $_POST['title'];
	
		if (isset($_POST["description"]))
			$description = $_POST["description"];
		
		if ($_SESSION['user_id'] > 0){
			$this->result = $this->service->createPost($title,$description);
	
			echo "{result: true, id: " . $this->result . "}";
		} else {
			echo "{result: false, message: 'User not logged in'}";
		}
		
	}
}
?>
