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
require_once APP_PATH . "ui/components/containers/TitleBar.php";

require_once APP_PATH . "application/widgets/PostGrid.php";
require_once APP_PATH . "application/widgets/ApplicationTitleBar.php";

$postGrid = new PostGrid();

$canvas = new Canvas();
$canvas->class = 'canvas container';
$canvas->addComponent($postGrid);
$canvas->build(1);

?>

<script type="text/javascript">
	window.onload = function (){
	    // Main application
	    PostService.searchPosts(true, document.getElementById('search').value);
	};
	
	var checkSearchTags = function (tagName){
	    if (tagName.value != ''){
	        var postFilter = document.getElementById('post_filter');
	        postFilter.disabled = false;
	
	        removeClass(tagName, 'invalid');
	        tagName.className += ' valid';
	    } else {
	        var postFilter = document.getElementById('post_filter');
	        postFilter.disabled = true;
	
	        removeClass(tagName, 'valid');
	        tagName.className += ' invalid';
	    }
	};
	
	var contentHeight = 800;  
	var pageHeight = document.documentElement.clientHeight;  
	var scrollPosition; 
	
	function scroller() {
	    if(navigator.appName == "Microsoft Internet Explorer")  
	        scrollPosition = document.documentElement.scrollTop;  
	    else  
	        scrollPosition = window.pageYOffset;  
	
	    if((pageHeight - scrollPosition) < 500){
	        PostService.searchPosts(false);
	    }
	}
	
	function addEvent(obj,ev,fn) {
	    if(obj.addEventListener) obj.addEventListener(ev,fn,false);
	    else if(obj.attachEvent) obj.attachEvent("on"+ev,fn);    
	}
	
	addEvent(window,"scroll",scroller);
	
	PostService = new fringe.util.AjaxUtil();
	PostService.url = 'post/index.php';
	
	PostService.searchPosts = function (reset, tagName){
	    if ((reset != undefined && reset != null) && (reset == true)) {
	        PostService.start = 0;
	        PostService.limit = 50;
	
	        PostService.hasMoreRecords = true;
	
	        document.getElementById('posts').innerHTML = '';
	
	        if (tagName != undefined && tagName != null && tagName != '')
	            PostService.tagName = tagName;
	    }
		
	    PostService.params = "method=searchPosts&start="+ PostService.start +"&limit="+ PostService.limit;
		alert(PostService.params);
	    if (PostService.tagName != undefined && PostService.tagName != null)
	        PostService.params += '&name=' + tagName;
	
	    if (PostService.hasMoreRecords) {
	        PostService.ajaxResponseHandler = function(XMLHttpRequest) {
	            var responceObj = eval('(' + XMLHttpRequest.responseText + ')');
	            var postContainer = document.getElementById('posts');
			
	            if (responceObj.posts.length > 0){
	                for (var i = 0; i < responceObj.posts.length; i++){
	                    var post = responceObj.posts[i];
	            	
	                    var item = document.createElement('div');
	                    	item.className = 'media well post';
	                    	item.name = post['id'];
	                    	item.onclick = function() {
	                    		window.location.href = '?view=post&id=' + this.name;
	                    	};
	                    var title = document.createElement('span');
		                
		                var titleArr = post['title'].split(" ");
		                for (var j = 0; j < titleArr.length; j++ ){
			                if (titleArr[j].charAt(0) == '#' && titleArr[j].length > 1){
			                    var itemLink = document.createElement('a');
			                    	itemLink.href = '#';

			                    var titleText = document.createTextNode(titleArr[j] + " ");

				                itemLink.appendChild(titleText);
			                    	
			                    title.appendChild(itemLink);
			                    title.appendChild(document.createTextNode(" "));
			                } else {
			                    var titleText = document.createTextNode(titleArr[j] + " ");
			                    title.appendChild(titleText);
			                }
		                }
	
	                    item.appendChild(title);
	                    postContainer.appendChild(item);
	                }
	                PostService.start = responceObj.start;
	            } else {
	                PostService.hasMoreRecords = false;
	            }
	        };
	
	        PostService.sendRequest();
	    }
	};
	
	PostService.addPost = function (){
		location.href = location.href + "?view=post&new=true"; 
	};
	
	/**
	 *      GridRow
	 *    - A GridRow
	 */
	PostItem = function() {
	    this.items = new fringe.util.ArrayList(); 
	    this.build(); 
	}
	fringe.ui.components.grids.GridRow.prototype = Object.create(new fringe.ui.components.Container, {
	
	    /**
	     * Post collection
	     * private final ArrayList
	     */
	    items: { writable:true, configurable:false, enumerable:false,  value: null },
	
	    /**
	     * Add Item
	     */
	    addItem: { writable:false, configurable:false, enumerable:false, 
	        value: function(item){ 
	            this.items.add(item);
	            //item.parentElement = this.element;
	            this.element.appendChild(item);
	        }
	    },
	
	    /**
	     * Build
	     */
	     build: { configurable:false, 
	         value: function (post){
	             this.element = document.createElement('div');
	             this.element.className = 'span5';
	
	             var img = document.createElement('div');
	             img.className = 'img';
	
	             var price = document.createElement('span');
	             price.textContent('$' . post.price);
	             price.className = 'title';
	
	             var imageLink = document.createElement('a');
	             imageLink.href('post/?id='. post.id);
	
	             var image = document.createElement('img');
	             image = image.src(post.imagePath);
	             image.className = 'thumb';
	
	             imageLink.appendNode(image);
	
	             img.appendNode(price);
	             img.appendNode(imageLink);
	
	             var tags = document.createElement('div');
	             tags.className = 'tags';
	
	             this.element.appendNode(img);
	         }
	     }
	
	});
</script>
