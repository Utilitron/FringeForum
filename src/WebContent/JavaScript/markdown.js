/*******************************************************************
 * Copyright (C) 2013 utilitron.net
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
 * Created: 12/7/2013
 */


/**
 * 	Application	
 */
fringe.util.MarkdownUtil = function() {
    "use strict";
};
fringe.util.MarkdownUtil.prototype = Object.create(fringe.util.InputUtil.prototype, {
    BOLD_QUALIFIER: {
        writable: false,
        configurable: false,
        enumerable: true,
        value: '**'
    },
    
    ITALIC_QUALIFIER: {
        writable: false,
        configurable: false,
        enumerable: true,
        value: '*'
    },

    /**
     * Embolden Text
     */
    embolden: {
        writable: false,
        configurable: false,
        enumerable: true,
        value: function(el) {
            this.stylize(el, this.BOLD_QUALIFIER);
        }
    },
    
    /**
     * Italicize Text
     */
    italicize: {
        writable: false,
        configurable: false,
        enumerable: true,
        value: function(el) {
            this.stylize(el, this.ITALIC_QUALIFIER);
        }
    },

    /**
     * Stylize Text
     */
    stylize: {
        writable: false,
        configurable: false,
        enumerable: false,
        value: function(el, qualifier) {
            var text = "Some Text";
            var selection = this.getInputSelection(el);
            var selectedText = el.value.substr(selection.start, selection.end);
            
            if (selectedText != '')
                text = selectedText;
                
            text = qualifier + text + qualifier;
            
            this.replaceSelectedText(el, text);
        }
    }
});
