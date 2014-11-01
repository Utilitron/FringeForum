/*******************************************************************
 * Copyright (C) 2012 utilitron.net
 *
 * This software is provided 'as-is', without any express or implied
 * warranty.  In no event will the authors be held liable for any damages
 * arising from the use of this software.

 * Permission is granted to anyone to use this software for any purpose,
 * including commercial applications, and to alter it and redistribute it
 * freely, without restriction.
 * 
 * AUTHOR
 * ======
 * Erik Ashcraft
 * 
 * Created: 10/25/2012
 */
 
/* containers package */
fringe.application = {};


/**
 * 	Application	
 */
fringe.application.Application = function() { this.build(); };
fringe.application.Application.prototype = Object.create(new fringe.ui.components.Container, {

	/**
	 * TitleBar
	 */
	titleBar: { writable:true, configurable:false,  value: null },
	
	/**
	 * Canvas
	 */
	canvas: { writable:true, configurable:false,  value: null },
	
	/**
	 * Build
	 */
	build: { configurable:false, 
			 value: function (){
				this.element = document.createElement('div');
				this.element.id = 'application';

			  	document.body.appendChild(this.element);
				
				this.titleBar = new fringe.ui.components.containers.TitleBar();
				this.canvas = new fringe.ui.components.containers.Canvas();
				
				this.addComponent(this.titleBar);
				this.addComponent(this.canvas);
				
				this.titleBar.title = 'Title Bar';
				
				var panel = new fringe.ui.components.containers.Panel;
				this.addComponent(panel);
			 }
	}
});
