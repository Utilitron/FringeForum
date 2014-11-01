var fringe = window.fringe = Object.create(Object.prototype, {version:{writable:!1, configurable:!1, value:"0.0.1"}});
fringe.util = {};
fringe.util.ArrayList = function $fringe$util$ArrayList$() {
  this.elements = []
};
fringe.util.ArrayList.prototype = Object.create(Object.prototype, {elements:{writable:!0, configurable:!1, enumerable:!1, value:null}, size:{writable:!1, configurable:!1, enumerable:!0, value:function() {
  return this.elements.length
}}, isEmpty:{writable:!1, configurable:!1, enumerable:!0, value:function() {
  return 0 < this.elements.length
}}, contains:{writable:!1, configurable:!1, enumerable:!0, value:function($obj$$) {
  return this.elements.hasOwnProperty($obj$$)
}}, add:{writable:!1, configurable:!1, enumerable:!0, value:function($obj$$) {
  this.elements.push($obj$$)
}}, remove:{writable:!1, configurable:!1, enumerable:!0, value:function($index$$44_obj$$) {
  $index$$44_obj$$ = this.elements.indexOf($index$$44_obj$$);
  -1 !== $index$$44_obj$$ && this.elements.splice($index$$44_obj$$, 1)
}}});
fringe.util.AjaxUtil = function $fringe$util$AjaxUtil$() {
};
fringe.util.AjaxUtil.prototype = Object.create(Object.prototype, {METHODS:{writable:!1, configurable:!1, enumerable:!1, value:["GET", "POST", "PUT"]}, METHOD_GET:{writable:!1, configurable:!1, enumerable:!0, value:"GET"}, METHOD_POST:{writable:!1, configurable:!1, enumerable:!0, value:"POST"}, METHOD_PUT:{writable:!1, configurable:!1, enumerable:!0, value:"PUT"}, _method:{writable:!0, configurable:!1, enumerable:!1, value:"GET"}, method:{configurable:!1, get:function() {
  return this._method
}, set:function($value$$) {
  if(-1 !== this.METHODS.indexOf($value$$)) {
    this._method = $value$$
  }else {
    throw Error("Method Not Found");
  }
}}, url:{writable:!0, configurable:!1, value:null}, params:{writable:!0, configurable:!1, value:null}, _ajaxObj:{writable:!0, configurable:!1, enumerable:!1, value:null}, ajaxObj:{configurable:!1, enumerable:!1, get:function() {
  if(null === this._ajaxObj) {
    if(window.XMLHttpRequest) {
      this._ajaxObj = new XMLHttpRequest
    }else {
      if(window.ActiveXObject) {
        this._ajaxObj = new ActiveXObject("Microsoft.XMLHTTP")
      }else {
        throw Error("The ajax object could not be initialized.");
      }
    }
  }
  return this._ajaxObj
}}, _ajaxResponseHandler:{writable:!0, configurable:!1, enumerable:!1, value:null}, ajaxResponseHandler:{configurable:!1, enumerable:!1, get:function() {
  return this._ajaxResponseHandler
}, set:function($responseHandler$$) {
  this._ajaxResponseHandler = function $this$_ajaxResponseHandler$() {
    4 !== this.readyState && "complete" !== this.readyState || $responseHandler$$(this)
  }
}}, sendRequest:{writable:!1, configurable:!1, enumerable:!0, value:function() {
  var $url$$ = this.url, $errorMessage$$ = "";
  if(null !== this.url && null !== this.ajaxResponseHandler) {
    this.ajaxObj.onreadystatechange = this.ajaxResponseHandler, "GET" === this.method && ($url$$ += "?" + this.params), this.ajaxObj.open(this.method, $url$$, !0), "POST" === this.method && this.ajaxObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), this.ajaxObj.send(this.params)
  }else {
    throw null === this.url && ($errorMessage$$ += "\nThe url is not set."), null === this.ajaxResponseHandler && ($errorMessage$$ += "\nThe response handler is not set."), Error($errorMessage$$);
  }
}}});
fringe.util.InputUtil = function $fringe$util$InputUtil$() {
};
fringe.util.InputUtil.prototype = Object.create(Object.prototype, {getInputSelection:{writable:!1, configurable:!1, enumerable:!0, value:function($el$$) {
  var $start$$ = 0, $end$$ = 0, $normalizedValue$$, $range$$, $len$$;
  "number" == typeof $el$$.selectionStart && "number" == typeof $el$$.selectionEnd ? ($start$$ = $el$$.selectionStart, $end$$ = $el$$.selectionEnd) : ($range$$ = document.selection.createRange()) && $range$$.parentElement() == $el$$ && ($len$$ = $el$$.value.length, $normalizedValue$$ = $el$$.value.replace(/\r\n/g, "\n"), $end$$ = $el$$.createTextRange(), $end$$.moveToBookmark($range$$.getBookmark()), $el$$ = $el$$.createTextRange(), $el$$.collapse(!1), -1 < $end$$.compareEndPoints("StartToEnd", $el$$) ? 
  $start$$ = $end$$ = $len$$ : ($start$$ = -$end$$.moveStart("character", -$len$$), $start$$ += $normalizedValue$$.slice(0, $start$$).split("\n").length - 1, -1 < $end$$.compareEndPoints("EndToEnd", $el$$) ? $end$$ = $len$$ : ($end$$ = -$end$$.moveEnd("character", -$len$$), $end$$ += $normalizedValue$$.slice(0, $end$$).split("\n").length - 1)));
  return{start:$start$$, end:$end$$}
}}, replaceSelectedText:{writable:!1, configurable:!1, enumerable:!0, value:function($el$$, $text$$) {
  var $sel$$ = this.getInputSelection($el$$), $val$$ = $el$$.value;
  $el$$.value = $val$$.slice(0, $sel$$.start) + $text$$ + $val$$.slice($sel$$.end)
}}});
fringe.ui = {};
fringe.ui.UiObject = Object.create(Object.prototype, {id:{configurable:!1, get:function() {
  return null !== this.element ? this.element.id : null
}, set:function($value$$) {
  if(null !== this.element) {
    this.element.id = $value$$
  }else {
    throw Error("!!");
  }
}}, element:{writable:!0, configurable:!1, enumerable:!0, value:null}});
fringe.ui.Component = Object.create(fringe.ui.UiObject, {_parentElement:{writable:!0, configurable:!1, enumerable:!1, value:null}, parentElement:{configurable:!1, get:function() {
  return this._parentElement
}, set:function($parentElement$$) {
  if(null !== this.element) {
    this._parentElement = $parentElement$$, this._parentElement.appendChild(this.element)
  }else {
    throw Error("NO ELEMENT ERROR");
  }
}}, width:{configurable:!1, get:function() {
  if(null !== this.element) {
    return this.element.style.width
  }
  throw Error("NO ELEMENT ERROR");
}, set:function($width$$) {
  if(null !== this.element) {
    this.element.style.width = $width$$
  }else {
    throw Error("NO ELEMENT ERROR");
  }
}}, height:{configurable:!1, get:function() {
  if(null !== this.element) {
    return this.element.style.height
  }
  throw Error("NO ELEMENT ERROR");
}, set:function($height$$) {
  if(null !== this.element) {
    this.element.style.height = $height$$
  }else {
    throw Error("NO ELEMENT ERROR");
  }
}}, build:{writable:!1, configurable:!1, value:function() {
  this.element = document.createElement("div")
}}});
fringe.ui.components = {};
fringe.ui.components.Container = function $fringe$ui$components$Container$() {
  this.components = new fringe.util.ArrayList
};
fringe.ui.components.Container.prototype = Object.create(fringe.ui.Component, {components:{writable:!0, configurable:!1, enumerable:!1, value:null}, numComponents:{writable:!1, configurable:!1, enumerable:!1, value:function() {
  return this.components.size
}}, addComponent:{writable:!1, configurable:!1, enumerable:!1, value:function($component$$) {
  this.components.add($component$$);
  $component$$.parentElement = this.element
}}, removeComponent:{writable:!1, configurable:!1, enumerable:!1, value:function($component$$) {
  this.components.remove($component$$);
  this.element.removeChild($component$$.element)
}}});
fringe.ui.components = {};
fringe.ui.components.Container = function $fringe$ui$components$Container$() {
  this.components = new fringe.util.ArrayList
};
fringe.ui.components.Container.prototype = Object.create(fringe.ui.Component, {components:{writable:!0, configurable:!1, enumerable:!1, value:null}, numComponents:{writable:!1, configurable:!1, enumerable:!1, value:function() {
  return this.components.size
}}, addComponent:{writable:!1, configurable:!1, enumerable:!1, value:function($component$$) {
  this.components.add($component$$);
  $component$$.parentElement = this.element
}}, removeComponent:{writable:!1, configurable:!1, enumerable:!1, value:function($component$$) {
  this.components.remove($component$$);
  this.element.removeChild($component$$.element)
}}});
fringe.ui.components.Grid = function $fringe$ui$components$Grid$() {
  this.rows = new fringe.util.ArrayList;
  this.build()
};
fringe.ui.components.Grid.prototype = Object.create(fringe.ui.Component, {rows:{writable:!0, configurable:!1, enumerable:!1, value:null}, addRow:{writable:!1, configurable:!1, enumerable:!1, value:function($row$$) {
  this.rows.add($row$$);
  $row$$.parentElement = this.element
}}, removeRow:{writable:!1, configurable:!1, enumerable:!1, value:function($row$$) {
  this.rows.remove($row$$);
  $row$$.parentElement.removeChild(this.element)
}}, build:{configurable:!1, value:function() {
  this.element = document.createElement("table");
  this.element.className = "grid"
}}});
fringe.ui.components.Form = function $fringe$ui$components$Form$() {
  this.components = new fringe.util.ArrayList;
  this.build()
};
fringe.ui.components.Form.prototype = Object.create(fringe.ui.Component, {components:{writable:!0, configurable:!1, enumerable:!1, value:null}, addFormComponent:{writable:!1, configurable:!1, enumerable:!0, value:function($component$$) {
  this.components.add($component$$);
  $component$$.parentElement = this.element
}}, build:{configurable:!1, value:function() {
  this.element = document.createElement("form");
  this.element.className = "form"
}}});
fringe.ui.components.TabNavigator = Object.create(fringe.ui.Component, {tabs:{writable:!0, configurable:!1, enumerable:!1, value:null}, addTab:{writable:!1, configurable:!1, enumerable:!0, value:function($tab$$) {
  this.tabs.add($tab$$);
  this.controlBar.addComponent($tab$$.tabController);
  this.canvas.addComponent($tab$$.tabView)
}}, controlBar:{writable:!0, configurable:!1, value:null}, canvas:{writable:!0, configurable:!1, value:null}, build:{configurable:!1, value:function() {
  this.element = document.createElement("div");
  this.element.className = "tabNavigator";
  this.titleBar = new fringe.ui.components.containers.TitleBar;
  this.canvas = new fringe.ui.components.containers.Canvas;
  this.controlBar = new fringe.ui.components.containers.ControlBar;
  this.canvas.parentElement = this.element;
  this.controlBar.parentElement = this.element
}}});
fringe.ui.components.Tab = Object.create(fringe.ui.Component, {build:{configurable:!1, value:function() {
}}});
fringe.ui.components.containers = {};
fringe.ui.components.containers.Canvas = function $fringe$ui$components$containers$Canvas$() {
  this.build()
};
fringe.ui.components.containers.Canvas.prototype = Object.create(new fringe.ui.components.Container, {build:{configurable:!1, value:function() {
  this.element = document.createElement("div");
  this.element.className = "canvas"
}}});
fringe.ui.components.containers.TitleBar = function $fringe$ui$components$containers$TitleBar$() {
  this.build()
};
fringe.ui.components.containers.TitleBar.prototype = Object.create(new fringe.ui.components.Container, {title:{configurable:!1, get:function() {
  return null !== this.element ? this.element.firstChild.textContent : null
}, set:function($value$$) {
  if(null !== this.element) {
    this.element.firstChild.textContent = $value$$
  }else {
    throw Error("!!");
  }
}}, build:{configurable:!1, value:function() {
  this.element = document.createElement("div");
  this.element.className = "titleBar";
  var $title$$ = document.createElement("div");
  $title$$.className = "title";
  this.element.appendChild($title$$)
}}});
fringe.ui.components.containers.ControlBar = function $fringe$ui$components$containers$ControlBar$() {
  this.build()
};
fringe.ui.components.containers.ControlBar.prototype = Object.create(new fringe.ui.components.Container, {build:{configurable:!1, value:function() {
  this.element = document.createElement("div");
  this.element.className = "controlBar"
}}});
fringe.ui.components.containers.Panel = function $fringe$ui$components$containers$Panel$() {
  this.build()
};
fringe.ui.components.containers.Panel.prototype = Object.create(new fringe.ui.components.Container, {close:{writable:!1, configurable:!1, value:function($e$$) {
  $e$$ || ($e$$ = window.event);
  $e$$.cancelBubble = !0;
  $e$$.returnValue = !1;
  $e$$.stopPropagation && ($e$$.stopPropagation(), $e$$.preventDefault());
  this.parentElement.removeChild(this.element)
}}, title:{configurable:!1, set:function($value$$) {
  this.titleBar.title = $value$$
}, get:function() {
  return this.titleBar.title
}}, titleBar:{writable:!0, configurable:!1, value:null}, canvas:{writable:!0, configurable:!1, value:null}, controlBar:{writable:!0, configurable:!1, value:null}, build:{configurable:!1, value:function() {
  var $self$$ = this, $closeButton$$;
  this.element = document.createElement("div");
  this.element.className = "panel";
  this.titleBar = new fringe.ui.components.containers.TitleBar;
  this.canvas = new fringe.ui.components.containers.Canvas;
  this.controlBar = new fringe.ui.components.containers.ControlBar;
  this.addComponent(this.titleBar);
  this.addComponent(this.canvas);
  this.addComponent(this.controlBar);
  this.titleBar.title = "Panel";
  this.canvas.element.textContent = "Canvas";
  this.controlBar.element.textContent = "Control Bar";
  $closeButton$$ = document.createElement("a");
  $closeButton$$.className = "close";
  $closeButton$$.href = "#";
  $closeButton$$.onclick = function $$closeButton$$$onclick$() {
    $self$$.close.call($self$$)
  };
  $closeButton$$.textContent = "Close";
  this.titleBar.element.appendChild($closeButton$$)
}}});
fringe.ui.components.containers.Window = Object.create(new fringe.ui.components.Container, {close:{writable:!1, configurable:!1, value:function() {
  this.parentElement.removeChild(this.element)
}}, title:{configurable:!1, set:function($value$$) {
  this.titleBar.title = $value$$
}}, titleBar:{writable:!0, configurable:!1, value:null}, controlBar:{writable:!0, configurable:!1, value:null}, canvas:{writable:!0, configurable:!1, value:null}, build:{configurable:!1, value:function() {
  var $self$$ = this, $closeButton$$;
  this.element = document.createElement("div");
  this.element.className = "window";
  this.titleBar = new fringe.ui.components.containers.TitleBar;
  this.canvas = new fringe.ui.components.containers.Canvas;
  this.controlBar = new fringe.ui.components.containers.ControlBar;
  this.addComponent(this.titleBar);
  this.addComponent(this.canvas);
  this.addComponent(this.controlBar);
  this.titleBar.title = "Window";
  this.controlBar.element.textContent = "Control Bar";
  this.canvas.element.textContent = "Canvas";
  $closeButton$$ = document.createElement("a");
  $closeButton$$.className = "close";
  $closeButton$$.href = "#";
  $closeButton$$.onclick = function $$closeButton$$$onclick$() {
    $self$$.close.call($self$$)
  };
  $closeButton$$.textContent = "Close";
  this.titleBar.element.appendChild($closeButton$$)
}}});
fringe.ui.components.containers.ViewStack = Object.create(new fringe.ui.components.Container, {});
fringe.ui.components.grids = {};
fringe.ui.components.grids.DataGrid = function $fringe$ui$components$grids$DataGrid$($dataProvider$$) {
  this.build();
  this.dataProvider = $dataProvider$$
};
fringe.ui.components.grids.DataGrid.prototype = Object.create(new fringe.ui.components.Container, {_dataProvider:{writable:!0, configurable:!1, enumerable:!1, value:null}, dataProvider:{configurable:!1, get:function() {
  return this._dataProvider
}, set:function($value$$) {
  this._dataProvider = $value$$;
  this.createHeaderRow();
  this.createDataRows()
}}, title:{configurable:!1, set:function($value$$) {
  this.titleBar.title = $value$$
}}, titleBar:{writable:!0, configurable:!1, value:null}, controlBar:{writable:!0, configurable:!1, value:null}, grid:{writable:!0, configurable:!1, value:null}, createHeaderRow:{writable:!0, configurable:!1, value:function() {
  var $row$$ = new fringe.ui.components.grids.GridRow;
  this.grid.addRow($row$$);
  for(var $i$$ in this.dataProvider.header) {
    var $column$$ = document.createElement("th");
    $column$$.innerHTML = this.dataProvider.header[$i$$];
    $row$$.addColumn($column$$)
  }
}}, createDataRows:{writable:!0, configurable:!1, value:function() {
  for(var $i$$ in this.dataProvider.data) {
    var $row$$ = new fringe.ui.components.grids.GridRow;
    this.grid.addRow($row$$);
    for(var $j$$ in this.dataProvider.data[$i$$]) {
      var $column$$ = document.createElement("td");
      $column$$.innerHTML = this.dataProvider.data[$i$$][$j$$];
      $row$$.addColumn($column$$)
    }
  }
}}, clear:{writable:!0, configurable:!1, value:function() {
  for(var $row$$ in this.grid.rows) {
    this.grid.removeRow($row$$)
  }
}}, build:{configurable:!1, value:function() {
  this.element = document.createElement("div");
  this.element.className = "panel dataGrid";
  this.titleBar = new fringe.ui.components.containers.TitleBar;
  this.grid = new fringe.ui.components.Grid;
  this.controlBar = new fringe.ui.components.containers.ControlBar;
  this.addComponent(this.titleBar);
  this.addComponent(this.controlBar);
  this.addComponent(this.grid);
  this.titleBar.title = "DataGrid";
  this.controlBar.element.textContent = "Control Bar"
}}});
fringe.ui.components.grids.GridRow = function $fringe$ui$components$grids$GridRow$() {
  this.columns = new fringe.util.ArrayList;
  this.build()
};
fringe.ui.components.grids.GridRow.prototype = Object.create(new fringe.ui.components.Container, {columns:{writable:!0, configurable:!1, enumerable:!1, value:null}, addColumn:{writable:!1, configurable:!1, enumerable:!1, value:function($column$$) {
  this.columns.add($column$$);
  this.element.appendChild($column$$)
}}, build:{configurable:!1, value:function() {
  this.element = document.createElement("tr")
}}});
