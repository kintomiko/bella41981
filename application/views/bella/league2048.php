<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<title>Bella 2048 排行榜</title>
<link rel="stylesheet" href="<?php echo base_url('assets/css/normalize3.0.2.min.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/css.css?v=15');?>" />
</head>
<body>
<section id="ranking"> <span id="ranking_title">排行榜</span>
  <section id="ranking_list">
  
    <section class="box">
      <section class="col_1" title="1">1</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[0]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[0]->FRACTION;?></section>
    </section>
    <section class="box">
      <section class="col_1" title="2">2</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[1]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[1]->FRACTION;?></section>
    </section>
    <section class="box">
      <section class="col_1" title="3">3</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[2]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[2]->FRACTION;?></section>
    </section>
    <section class="box">
      <section class="col_1">4</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[3]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[3]->FRACTION;?></section>
    </section>
    <section class="box">
      <section class="col_1">5</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[4]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[4]->FRACTION;?></section>
    </section>
      <section class="box">
      <section class="col_1">6</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[5]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[5]->FRACTION;?></section>
    </section>
    <section class="box">
      <section class="col_1">7</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[6]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[6]->FRACTION;?></section>
    </section>
    <section class="box">
      <section class="col_1">8</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[7]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[7]->FRACTION;?></section>
    </section>
    <section class="box">
      <section class="col_1">9</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[8]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[8]->FRACTION;?></section>
    </section>
    <section class="box">
      <section class="col_1">10</section>
      <section class="col_2"></section>
      <section class="col_3"><?php echo $league[9]->NICKNAME;?></section>
      <section class="col_4"><?php echo $league[9]->FRACTION;?></section>
    </section>
  </section>
  <a id="play_game" href="<?php echo base_url('bella/bella2048');?>" title="返回游戏">返回游戏</a> </section>
<!-- <a id="return_back" href="#" title="返回">返回</a> -->
</body>
</html>
