
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta  charset="utf-8">
  <title>2048 Bella版</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css');?>">
  <link  rel="shortcut icon"  href="<?php echo base_url('assets/image/favicon.ico');?>">
  <link  rel="apple-touch-icon"  href="<?php echo base_url('assets/image/apple-touch-icon.png');?>">
  <meta  name="apple-mobile-web-app-capable"  content="yes">

  <meta  name="HandheldFriendly"  content="True">
  <meta  name="MobileOptimized"  content="320">
  <meta  name="viewport"  content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui">
<style>
.game-intro a{
text-decoration:none;
	font-size:20px;
}
  .tile-text {
    display:inline-block;
    vertical-align: middle;
  }
  
  /* lol !important */
  
  .tile-inner { background-position: center center !important; background-size: cover !important; background-repeat: no-repeat !important; }


    
    .tile-2 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/1.jpg');?>) !important; 
    }
  
    
    .tile-4 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/2.jpg');?>) !important; 
    }
  
    
    .tile-8 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/3.jpg');?>) !important; 
    }
  
    
    .tile-16 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/4.jpg');?>) !important; 
    }
  
    
    .tile-32 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/5.jpg');?>) !important; 
    }
  
    
    .tile-64 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/6.jpg');?>) !important; 
    }
  
    
    .tile-128 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/7.jpg');?>) !important; 
    }
  
    
    .tile-256 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/8.jpg');?>) !important; 
    }
  
    
    .tile-512 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/9.jpg');?>) !important; 
    }
  
    
    .tile-1024 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/10.jpg');?>) !important; 
    }
  
    
    .tile-2048 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/11.jpg');?>) !important; 
    }
  
    .tile-4096 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/12.jpg');?>) !important; 
    }
  
    
    .tile-8192 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/13.jpg');?>) !important; 
    }
  
    
    .tile-16384 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/14.jpg');?>) !important; 
    }    
	
    .tile-32768 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/15.jpg');?>) !important; 
    }
    
    .tile-65536 .tile-inner {
      background-image: url(<?php echo base_url('assets/image/2048/16.jpg');?>) !important; 
    }
  
  .thisistext, p, a, h1 { color: #776e65; }
  .game-container { background-color: #bbada0 }
  
  
  .preload, .preload img { position: absolute; top: -100px; -left: 100px; width: 1px; height: 1px; overflow: hidden; }
  
  #fix { 
    position: absolute; top: 0; left: 0; width: 100%; height: 100%; position: fixed; z-index: -1000; 
            
        background-color: #faf8ef;
      
        }

</style>
</head>
<body>
  <div  class="container">
    <div  class="heading">
      <h1  class="title">2048</h1>
      <div  class="scores-container">
        <div id="score-container" class="score-container">0</div>
        <div  class="best-container">0</div>
      </div>
    </div>
    <div  class="above-game">
    
    <div  class="game-intro" >
    <p  class="game-intro"><a href="<?php echo base_url('bella/league2048');?>">排行榜</a></p>
    </div>
    
    <strong><a  class="switch-button"></a></strong>
      <a  class="restart-button">重新开始</a>
    </div>
    
	
    <div  class="game-container">
      <div  class="game-message">
        <p></p>
        
        <input type="text" id="nick" placeholder="请输入昵称" style="height:30px;"/>
        
        <div id="lower" class="lower">
        
	        <a  class="keep-playing-button">继续</a>
          <a  class="retry-button">再来</a>
          <a class="" id="submit" >提交</a>
        </div>
      </div>

      <div  class="grid-container">
        <div  class="grid-row">
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
        </div>
        <div  class="grid-row">
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
        </div>
        <div  class="grid-row">
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
        </div>
        <div  class="grid-row">
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
          <div  class="grid-cell"></div>
        </div>
      </div>
<div  class="tile-container">
<div  class="tile tile-2 tile-position-1-3 tile-new">
<div  class="tile-inner"></div>
</div>
<div  class="tile tile-2 tile-position-3-4 tile-new">
<div  class="tile-inner"></div>
</div>
</div>
    </div>
    <p class="game-explanation">
      <strong class="important">电脑用户:</strong><strong>上下左右键</strong> 来移动方块，相同的方块会合并成更高阶的方块。<br/><br/>
      <strong class="important">手机用户:</strong> <br/>
      1. <strong>上下左右滑动</strong>来移动方块，相同的方块会合并成更高阶的方块。<br/>
	    2. <strong>点击</strong>游戏区的上下左右来移动方块。<br/>
	3. 安卓APP<a href="<?php echo base_url('assets/file/2048.apk');?>">下载安装</a><br/>
  </p>
    <div  style="float:right;margin-top:20px;top:95%;" ><span style="float:right;"></span><br></div><br>
  </div>
  <script src="<?php echo base_url('assets/lib/jquery-1.8.3.min.js');?>" type="text/javascript"></script>
  <script  src="<?php echo base_url('assets/js/2048/bind_polyfill.js');?>"></script>
  <script  src="<?php echo base_url('assets/js/2048/classlist_polyfill.js');?>"></script>
  <script  src="<?php echo base_url('assets/js/2048/animframe_polyfill.js');?>"></script>
  <script  src="<?php echo base_url('assets/js/2048/keyboard_input_manager.js');?>"  charset="UTF-8"></script>
  <script  src="<?php echo base_url('assets/js/2048/html_actuator.js');?>"></script>
  <script  src="<?php echo base_url('assets/js/2048/grid.js');?>"></script>
  <script  src="<?php echo base_url('assets/js/2048/tile.js');?>"></script>
  <script  src="<?php echo base_url('assets/js/2048/local_storage_manager.js');?>"></script>
  <script  src="<?php echo base_url('assets/js/2048/game_manager.js');?>"></script>
  <script  src="<?php echo base_url('assets/js/2048/application.js');?>"></script>


<div  id="__nightingale_view_cover"  style="width: 100%; height: 100%; -webkit-transition: -webkit-transform 10s ease-in-out; transition: -webkit-transform 10s ease-in-out; position: fixed !important; left: 0px !important; bottom: 0px !important; overflow: hidden !important; background-color: rgb(0, 0, 0) !important; pointer-events: none !important; z-index: 999; opacity: 0; background-position: initial initial !important; background-repeat: initial initial !important;"></div></body></html>