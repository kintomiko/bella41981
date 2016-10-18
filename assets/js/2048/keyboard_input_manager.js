function KeyboardInputManager() {
  this.events = {};
  this.useClick = true;

  if (window.navigator.msPointerEnabled) {
    //Internet Explorer 10 style
    this.eventTouchstart    = "MSPointerDown";
    this.eventTouchmove     = "MSPointerMove";
    this.eventTouchend      = "MSPointerUp";
  } else {
    this.eventTouchstart    = "touchstart";
    this.eventTouchmove     = "touchmove";
    this.eventTouchend      = "touchend";
  }

  this.listen();
}

KeyboardInputManager.prototype.on = function (event, callback) {
  if (!this.events[event]) {
    this.events[event] = [];
  }
  this.events[event].push(callback);
};

KeyboardInputManager.prototype.emit = function (event, data) {
  var callbacks = this.events[event];
  if (callbacks) {
    callbacks.forEach(function (callback) {
      callback(data);
    });
  }
};

KeyboardInputManager.prototype.listen = function () {
  var self = this;

  var map = {
    38: 0, // Up
    39: 1, // Right
    40: 2, // Down
    37: 3, // Left
    75: 0, // Vim up
    76: 1, // Vim right
    74: 2, // Vim down
    72: 3, // Vim left
    87: 0, // W
    68: 1, // D
    83: 2, // S
    65: 3  // A
  };

  // Respond to direction keys
  document.addEventListener("keydown", function (event) {
    var modifiers = event.altKey || event.ctrlKey || event.metaKey ||
                    event.shiftKey;
    var mapped    = map[event.which];

    if (!modifiers) {
      if (mapped !== undefined) {
        event.preventDefault();
        self.emit("move", mapped);
      }
    }

    // R key restarts the game
    if (!modifiers && event.which === 82) {
      self.restart.call(self, event);
    }
  });

  // Respond to button presses
  this.bindButtonPress(".retry-button", this.restart);
  this.bindButtonPress(".restart-button", this.restart);
  this.bindButtonPress(".keep-playing-button", this.keepPlaying);
  this.bindButtonPress(".switch-button", this.switch);
  this.bindButtonPress("#submit",this.submit);
  this.bindButtonPress("#nick",this.focus);

  var supportTouch = ("createTouch" in document);

  // Respond to swipe events
  var touchStartClientX, touchStartClientY;
  var gameContainer = document.getElementsByClassName("game-container")[0];

  gameContainer.addEventListener(this.eventTouchstart, function (event) {
    if ((!window.navigator.msPointerEnabled && event.touches.length > 1) ||
        event.targetTouches > 1) {
      return; // Ignore if touching with more than 1 finger
    }

    if (window.navigator.msPointerEnabled) {
      touchStartClientX = event.pageX;
      touchStartClientY = event.pageY;
    } else {
      touchStartClientX = event.touches[0].pageX;
      touchStartClientY = event.touches[0].pageY;
    }

    event.preventDefault();
  });

  gameContainer.addEventListener(this.eventTouchmove, function (event) {
    event.preventDefault();
  });

  gameContainer.addEventListener(this.eventTouchend, function (event) {
    if ((!window.navigator.msPointerEnabled && event.touches.length > 0) ||
        event.targetTouches > 0) {
      return; // Ignore if still touching with one or more fingers
    }

    var touchEndClientX, touchEndClientY;

    if (window.navigator.msPointerEnabled) {
      touchEndClientX = event.pageX;
      touchEndClientY = event.pageY;
    } else {
      touchEndClientX = event.changedTouches[0].pageX;
      touchEndClientY = event.changedTouches[0].pageY;
    }

    var dx = touchEndClientX - touchStartClientX;
    var absDx = Math.abs(dx);

    var dy = touchEndClientY - touchStartClientY;
    var absDy = Math.abs(dy);

    if (Math.max(absDx, absDy) > 10) {
      // (right : left) : (down : up)
      self.emit("move", absDx > absDy ? (dx > 0 ? 1 : 3) : (dy > 0 ? 2 : 0));
    } else if (self.useClick) {
	  var dType = getDirection(touchEndClientX,touchEndClientY, gameContainer);
	  if(dType >= 0) {self.emit("move", dType);}
    }
  });
};

KeyboardInputManager.prototype.switch = function (event) {
  event.preventDefault();
  this.useClick = !this.useClick;
  var button = document.querySelector(".switch-button");
  button.innerHTML = this.useClick ? "关闭点击"　: "启动点击";
};

KeyboardInputManager.prototype.restart = function (event) {
  event.preventDefault();
  this.emit("restart");
};

KeyboardInputManager.prototype.keepPlaying = function (event) {
  event.preventDefault();
  this.emit("keepPlaying");
};
KeyboardInputManager.prototype.submit=function (event) {
	$.ajax({
        type: 'POST',
        url: "leagueSubmit" ,
        data:{league:$('#score-container').text().split('+')[0],nick:$('#nick').val()},
        success: function(data){
                    alert("提交成功");
                    $('#nick').hide();
              	  $('#submit').hide();
             } ,
        dataType: "text"
    });
};
KeyboardInputManager.prototype.focus=function (event) {
	$('#nick').focus();
};

KeyboardInputManager.prototype.bindButtonPress = function (selector, fn) {
  var button = document.querySelector(selector);
  button.addEventListener("click", fn.bind(this));
  button.addEventListener(this.eventTouchend, fn.bind(this));
};


function getDirection(X,Y,obj){      
	var W = obj.clientWidth;
	var H = obj.clientHeight;
	//alert(getX(obj) + "   " + getY(obj));
	//alert(X + "   " + Y);
	X -= getX(obj);
	Y -= getY(obj);

	if(X >= 0 && X <= W && Y >=0 && Y <= H) {
		if(Y <= H/2 && (X <= W/2 && X - Y > 0)||(X > W/2 && X + Y <= W)) {return 0;}
		if(X >= W/2 && (Y <= H/2 && X + Y > W)||(Y > H/2 && X - Y >= 0)) {return 1;}
		if(Y > H/2 && (X >= W/2 && X - Y < 0)||(X < W/2 && X + Y >= W)) {return 2;}
		if(X < W/2 && (Y >= H/2 && X + Y < W)||(Y < H/2 && X - Y <= 0)) {return 3;}
	}
	return -1
}

function getX(obj){      
    return obj.offsetLeft + (obj.offsetParent ? getX(obj.offsetParent) : obj.x ? obj.x : 0);      
}              
  
function getY(obj){      
    return (obj.offsetParent ? obj.offsetTop + getY(obj.offsetParent) : obj.y ? obj.y : 0);      
}
