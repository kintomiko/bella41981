<!DOCTYPE html>
<html lang="en">
  <head>
    <title>记事</title>
    <meta name="description" content="The human computer interface helps to define computing at any one time.">
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <!-- Style-->
    <style>
		html, body {
		    height: 100%;
		    padding: 0px;
		    margin: 0px;
		}
		.tl-attribution{
			display:none;
		}
	</style>
    <!-- HTML5 shim, for IE6-8 support of HTML elements--><!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="shortcut icon" href="//cdn.knightlab.com/libs/blueline/latest/assets/logos/favicon.ico"> 
  </head>
  <body>
  <div id="timeline-embed">
    <div id="timeline"></div>
  </div>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/timeline.css');?>">
  <script type="text/javascript" src="<?php echo base_url('assets/js/timeline-min.js');?>"></script>
  <script>
	$(document).ready(function() {
    var embed = document.getElementById('timeline-embed');
    embed.style.height = getComputedStyle(document.body).height;
    var aaa={
    	    "title": {
    	        "media": {
    	          "url": "./RevolutionaryUserInterfaces_files/input.png", 
    	          "caption": "首页图片标题", 
    	          "credit": "首页图片简介"
    	        }, 
    	        "text": {
    	          "headline": "姚贝娜生平重要记事", 
    	          "text": ""
    	        }
    	    },      
    	    "events": [
    	      {
    	        "media": {
    	          "url": "http://ww3.sinaimg.cn/large/7af429c9gw1f17c7l96uuj20dm0a73z2.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "09", 
					"day": "26", 
			        "year": "1981"
    	        }, 
    	        "text": {
    	          "headline": "天使降临", 
    	          "text": "<p>1981年9月26日 上午10点15床，出生于湖北省武汉市</p>"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "./RevolutionaryUserInterfaces_files/pascaline.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "10", 
					"day": "01",
    	          "year": "1990"
    	        }, 
    	        "text": {
    	          "headline": "初次登台", 
    	          "text": "<p>第一次登台，庆祝“十一”的儿童晚会 唱爸爸写的歌《十月的阳光》</p>"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "09", 
    	          "year": "2000"
    	        }, 
    	        "text": {
    	          "headline": "中国音乐学院", 
    	          "text": "考入中国音乐学院声歌系，师从董华、马秋华教授"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww3.sinaimg.cn/mw690/7af429c9gw1f17c7li4yaj20c80f1ab6.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "04", 
					"day": "28",
    	          "year": "2005"
    	        }, 
    	        "text": {
    	          "headline": "崭露头角", 
    	          "text": "出演三宝导演的首部大型原创音乐剧《金沙》女主角，与沙宝亮合作共同成为第一任男女主演"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww4.sinaimg.cn/mw690/7af429c9gw1f17c7n1e3gj20i20memzu.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	          "year": "2005"
    	        }, 
    	        "text": {
    	          "headline": "进入海政", 
    	          "text": "大学毕业进入海政文工团"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww1.sinaimg.cn/mw690/7af429c9gw1f17c7nc1z5j20ko0dmjso.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "02", 
					"day": "17",
    	          "year": "2007"
    	        }, 
    	        "text": {
    	          "headline": "首登春晚", 
    	          "text": "首次参加中央电视台春节联欢晚会，和火风合唱歌曲《老公老婆我爱你》"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "https://youtu.be/UZVEp78b0XI?t=1m54s", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "04", 
					"day": "17",
    	          "year": "2008"
    	        }, 
    	        "text": {
    	          "headline": "问鼎青歌", 
    	          "text": "以总分199.19分荣获了第十三届CCTV青年歌手电视大奖赛流行唱法个人单项的冠军，并凭借《日月凌空》成为历史上第一位百分冠军"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww3.sinaimg.cn/mw690/7af429c9gw1f17c7opr1nj20bn0hijug.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "10", 
					"day": "01",
    	          "year": "2008"
    	        }, 
    	        "text": {
    	          "headline": "首张EP", 
    	          "text": "发行个人第一本EP《心如明月》"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww4.sinaimg.cn/mw690/7af429c9gw1f17c7phua0j20b408cjri.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "02", 
					"day": "13",
    	          "year": "2010"
    	        }, 
    	        "text": {
    	          "headline": "再登春晚", 
    	          "text": "第二次参加中央电视台春节联欢晚会，与师鹏，熊汝霖，王澜霏合唱《我要歌唱》"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww4.sinaimg.cn/mw690/7af429c9gw1f17c7rvvh2j21kw1spas6.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "04", 
					"day": "30",
    	          "year": "2012"
    	        }, 
    	        "text": {
    	          "headline": "甄嬛传", 
    	          "text": "受刘欢邀请演唱电视剧甄嬛传中一系列歌曲"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww3.sinaimg.cn/mw690/7af429c9gw1f17c7t3dqej20cy0jgmzb.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "06", 
					"day": "01",
    	          "year": "2012"
    	        }, 
    	        "text": {
    	          "headline": "首张专辑", 
    	          "text": "发行首张个人专辑《小头发》"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww1.sinaimg.cn/mw690/7af429c9gw1f17c7unax6j20m80xcwiq.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "11", 
    	          "year": "2012"
    	        }, 
    	        "text": {
    	          "headline": "生命的河", 
    	          "text": "受冯小刚导演邀请，演唱电影《1942》主题曲——《生命的河》"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww1.sinaimg.cn/large/7af429c9gw1f17c86rstwj21kw11xal4.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	          "month": "07", 
    	          "day": "12", 
    	          "year": "2013"
    	        }, 
    	        "text": {
    	          "headline": "好声音", 
    	          "text": "参加第二季中国好声音，凭借也许明天获得四位导师转身"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww1.sinaimg.cn/mw690/7af429c9gw1f17c8a1u6jj20rs0ktab6.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "12", 
        	          "day": "03", 
        	          "year": "2013"
    	        }, 
    	        "text": {
    	          "headline": "二分之一的我首唱会", 
    	          "text": "在798艺术中心举行《二分之一的我》首唱会 "
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww2.sinaimg.cn/mw690/7af429c9gw1f17c88y7wdj20sg16ote1.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "12", 
        	          "day": "09", 
        	          "year": "2013"
    	        }, 
    	        "text": {
    	          "headline": "二分之一的我", 
    	          "text": "发行个人EP《二分之一的我》"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww3.sinaimg.cn/mw690/7af429c9gw1f17c8axxwbj20rs0fmtc0.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "01", 
        	          "day": "30", 
        	          "year": "2014"
    	        }, 
    	        "text": {
    	          "headline": "压轴春晚", 
    	          "text": "第三次参加中央电视台春节联欢晚会，零点前压轴演唱《天耀中华》"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww2.sinaimg.cn/mw690/7af429c9gw1f17c8e0nojj20sp172493.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "04", 
        	          "day": "26", 
        	          "year": "2014"
    	        }, 
    	        "text": {
    	          "headline": "最佳女歌手", 
    	          "text": "参加Music Radio Top排行榜颁奖典礼，荣获“最佳女歌手”“DJ最爱艺人”“年度最佳金曲”三项大奖"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww2.sinaimg.cn/mw690/7af429c9gw1f17c8ezoy5j20rs12wwgj.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "10", 
        	          "day": "23", 
        	          "year": "2014"
    	        }, 
    	        "text": {
    	          "headline": "荧屏绝唱", 
    	          "text": "录制Hi歌，11月13日播出，演唱《鱼》，是生前最后一首歌"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww4.sinaimg.cn/mw690/7af429c9gw1f17c8kiwb2j21kw11x7dy.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	        	"month": "10", 
        	          "day": "26", 
        	          "year": "2014"
    	        }, 
    	        "text": {
    	          "headline": "最后的演出", 
    	          "text": "黑龙江宝清百盟城市广场开业，最后一次演出"
    	        }
    	      }, 
    	      {
    	        "media": {
    	          "url": "http://ww4.sinaimg.cn/mw690/7af429c9gw1f17c8lzvtoj20nm0zf76y.jpg", 
    	          "caption": "", 
    	          "credit": ""
    	        }, 
    	        "start_date": {
    	          "month": "01", 
    	          "day": "16", 
    	          "year": "2015"
    	        }, 
    	        "text": {
    	          "headline": "逝世", 
    	          "text": "逝世"
    	        }
    	      }
    	    ]
    	}
    window.timeline = new TL.Timeline('timeline-embed',aaa,{
        hash_bookmark: true,
        debug:true
    });
    window.addEventListener('resize', function() {
        var embed = document.getElementById('timeline-embed');
        embed.style.height = getComputedStyle(document.body).height;
        timeline.updateDisplay();
    }
    )
}
);
</script>
    <script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-537357-19']);
		_gaq.push(['_trackPageview']);
		(function() {
		    var ga = document.createElement('script');
		    ga.type = 'text/javascript';
		    ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(ga, s);
		})();
	</script>
  </body>
</html>