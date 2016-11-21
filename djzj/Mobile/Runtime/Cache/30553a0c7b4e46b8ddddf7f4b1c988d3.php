<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ($webtitle); ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
<meta name="description" content="">
<meta name="author" content=""> 
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
<link href="__PUBLIC__/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/style.css?201608091347" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/newfooter.css?201610050936" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/fastClick.js"></script>
<script type="text/javascript" src="__PUBLIC__/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<!--弹出层-->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/alert.css" />
<!--验证信息 js+css -->
<link rel="stylesheet" href="__PUBLIC__/bootstrap-3.3.5-dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="__PUBLIC__/bootstrap-3.3.5-dist/js/bootstrapValidator.js"></script>
<!--微信js-->
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
</head>

<body>
<script type="text/javascript">
    $(function() {  
    FastClick.attach(document.body);  
}); 
</script>
<?php if(!empty($bigmess)): ?><style type="text/css">
	.bigmess{width:98%;padding-left:1%;padding-right:1%;height:auto;position:fixed;left:0;top:0;z-index:99999999;background:#1c2930;color:#fff;}
	.bigmess_span{width:90%;height:auto;display:block;line-height:2rem;font-size:1.3rem;}
	.bigmess_a{width:10%;height:auto;display:block;position:absolute;right:0;top:0.4rem;z-index:2;text-align:center;}
	.bigmess_a img{width:60%;}
	</style>
	<div class="bigmess">
		<span class="bigmess_span">
		<?php echo ($bigmess["name"]); ?>
		</span>
		<a href="javascript:;" class="bigmess_a" onClick="hide_bigmess(<?php echo ($bigmess["id"]); ?>)">
			<img src="__PUBLIC__/new/images/close.png" />
		</a>
	</div>
	<script type="text/javascript">
	function hide_bigmess(t){
		$.post("<?php echo U('Index/hidebigmess');?>", {mid:t}, function(v){
			$(".bigmess").hide();
		});
	}
	</script><?php endif; ?>
<!--顶部导航-->
<?php if((ACTION_NAME) == "myqr"): else: ?>
	<header class="header">
		<span class="fl">今日竞猜：<?php echo ($thisdayzong_ren); ?>人，<?php echo ($thisdayzong_jinbi); ?>金币</span>
		<span class="header-r fr">余额：<?php echo ($user_yue); ?></span>
		<?php if(ACTION_NAME=="hero"){ ?>
			<a class="rules" href="<?php echo U('Index/art',array(fid=>4));?>"></a>
		<?php }else if(ACTION_NAME=="recom" || ACTION_NAME=="myqr" || ACTION_NAME=="recoms"){ ?>
			<a class="rules" href="<?php echo U('Index/art',array(aid=>5));?>"></a>
		<?php }else if(ACTION_NAME=="art" && $_GET['aid']==5){ ?>
			<a class="rules" href="<?php echo U('Index/art',array(aid=>5));?>"></a>
		<?php }else if(ACTION_NAME=="dld"){ ?>
			<a class="rules" href="<?php echo U('Index/art',array(aid=>9));?>"></a>
		<?php }else{ ?>
			<a class="rules" href="<?php echo U('Index/art',array(fid=>1));?>"></a>
		<?php } ?>
		
	</header><?php endif; ?>

    <link rel="stylesheet" type="text/css" href="Public/Mobile/css/Normalize.css">
    <link rel="stylesheet" type="text/css" href="Public/Mobile/css/gamenav.css">
    <link rel="stylesheet" type="text/css" href="Public/Mobile/css/device.css">
    <link rel="stylesheet" type="text/css" href="Public/Mobile/css/lolteams.css">
    <link rel="stylesheet" type="text/css" href="Public/Mobile/css//sologames.css">
    <!--赛事初始主页 -->
    <div class="gamenav">
    <ul>
        <li>
            <a <?php if((ACTION_NAME) == "games"): ?>class="active"<?php endif; ?> href="<?php echo U('Index/games');?>">主页</a>
            <div <?php if((ACTION_NAME) == "games"): ?>class="bluebar"<?php endif; ?>></div>
        </li>
        <li>
            <a <?php if((ACTION_NAME) == "lolteams"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "teamsindex"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "soloindex"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "teamlist"): ?>class="active"<?php endif; ?> href="<?php echo U('Index/teamsindex');?>">参赛</a>
            <div <?php if((ACTION_NAME) == "lolteams"): ?>class="bluebar"<?php endif; ?>
                <?php if((ACTION_NAME) == "teamsindex"): ?>class="bluebar"<?php endif; ?>
                <?php if((ACTION_NAME) == "soloindex"): ?>class="bluebar"<?php endif; ?>
                <?php if((ACTION_NAME) == "teamlist"): ?>class="bluebar"<?php endif; ?>></div>
        </li>
        <li>
            <a <?php if((ACTION_NAME) == "lolrace"): ?>class="active"<?php endif; ?> href="<?php echo U('Index/lolrace');?>">赛程</a>
            <div <?php if((ACTION_NAME) == "lolrace"): ?>class="bluebar"<?php endif; ?>></div>
        </li>

    </ul>
</div>
<script type="text/javascript">
// $(".gamenav a").click(function() {
//   $(".gamenav a").removeClass("active");
//   $(".bluebar").remove();  
//   $(this).addClass("active");
//   $(this).prepend('<div class="bluebar"></div>');
// });
</script>

    <div class="teams-index" style="left: 0">
        <?php if($zd['soloname']!="" || $zd['soloname']!=" " ){ ?>
        <style type="text/css">
            .screen{display:none;}
        </style>
        <?php } ?>
        <div class="screen">
            <a href="#">赛事规则</a>
        </div>
        <!-- 赛事规则弹出框 -->
        <div class="game-rules" style="display: none;">
            <div class="rules-title">
                <p>赛事规则</p>
                <div class="rules-close">
                    <img src="Public/Mobile/new/images/games/guanbi.png">
                </div>
            </div>
            <!-- 赛事规则内容 -->
            <div class="rule-content">
                <p>没有人的青春是在红地毯上走过，既然梦想成为那个别人无法企及的自我，就应该选择一条属于自己的道路，为了到达终点，付出别人无法企及的努力。 　 　　我的一个堂弟大学毕业一年了，工作换了四份，最近又离职了。而在这一年中间，他还休息了两个月！ 　　 　　总之，离职的原因不是因为老板苛刻，就是老板有眼无珠，对自己的创意不欣赏，或者同事之间钩心斗角，工作环境不好。 　　 　　我问，你想要的工作是什么样的？他想想了说，至少不太累，每天出入高档写字楼，可以经常旅游，老板给的薪水很可观…… 　　 　　当你看了《杜拉拉升职记》，便觉得外企真好，可以出入高档写字楼，操一口流利的英文，拿着让人眼红的薪水； 　　 　　当你看了《亲密敌人》，就觉得投行男好帅，开着凯迪拉克，漫步澳大利亚的海滩，随手签着几百万的合同； 　　 　　当你看到一条精妙的广告赞不绝口，就觉得做营销好潮，可以把握市场脉搏，纵情挥洒自己的创意； 　　 　　当你看到一位做房地产的朋友，每天和有钱人出入各种高档场所，发着各种挥霍的微博，就觉得做房地产好赚钱； 　　 　　当你看到一位快速消费品人员满世界出差，在各种地方住五星级酒店，就觉得做快速消费品好风光。 　　 　　我想说的是，当你疯狂地爱上了那种洋洋得意的状态，却不曾想到你日思夜想称之为梦想的状态，其实并不是你看到的那样简单。 　　表面风光的背后，你看不到他们付出的努力，你看不到他们所吃的苦。他们之所以能取得让人望尘莫及的荣耀，只因为他们是付出了常人难以企及的努力。他辛勤工作的身影，他时刻洋溢的才华，他的一切经得起岁月的推敲。 　　 　　我的朋友名叫朵朵，在她还是某科技学院艺术设计专业大四学生的时候，她就很积极地努力找工作，最后，毕业之际，她被一家玻璃制品贸易公司录用了。 　　 　　入职几天后，一家澳大利亚公司的贸易代表来公司考察。两家公司事先有一笔数百万元的玻璃水杯出口订单，但没有最后拍板，因为水杯上没有任何装饰色彩和图案，于是老板尝试性地把设计任务交给了朵朵。 　　 　　但朵朵有股犟劲儿，什么事都不愿落在人后。为了证明自己，她的犟劲又上来了。她说：“如果一件事值得你去做，就一定把它做好，无论付出多少努力。” 　　 　　大二时，朵朵的美术天赋开始显现。那时她给人做装饰画，一幅画能挣三十块钱。半年后她在书画市场看到自己的作品，标价已经超过了三千元。她直埋怨雇主“黑心”，但她也看到了自己的价值，还悟出了一条职场经验，就是关键你要有把“刷子”，是一个“金刚钻”。 　　 　　如今，虽然任务很艰巨，但朵朵决心挑战自己。开始做准备工作吧，朵朵决定先从外围入手。她先到公司资料室，看公司创立时的历史，了解企业的发展历程，她似乎悟到了公司发展的原因，公司的企业文化就这样流进了她的血液里。 　　 　　累了，朵朵就下车间看每一道生产工序，看工人是如何生产的；又到营销部，找销售员了解什么样的杯子好销，这个单是如何签到的；最后到开发部看师傅们如何设计。
                </p>
            </div>
            <a class="agree" href="#">同意</a>
        </div>
        <script type="text/javascript">
        $(".screen a").click(function() {
            $(".game-rules").show();
        });
        $(".rules-close").click(function() {
            $(".game-rules").hide();
        });
        $(".agree").click(function() {
            $(".game-rules").hide();
            $(".screen").hide();
            $(".screen a").hide();
        });
        </script>
        <!-- 战队导航栏 -->
        <!--         <div class="team-h" style="display: none">
            <ul>
                <li><a <?php if((ACTION_NAME) == "lolteams"): ?>class="active"<?php endif; ?> href="<?php echo U('Index/lolteams');?>">参赛</a></li>
                <li><a href="<?php echo U('Index/index');?>">列表</a></li>
            </ul>
        </div> -->
        <!-- 参赛页面主内容 -->
        <div class="games-content">
            <!-- 底部图案 -->
            <div class="bac-pic">
                <img src="Public/Mobile/new/images/games/dibutuan.png">
            </div>
            <?php if($zd['soloname']!="" || $zd['soloname']!=" " ){ ?>
                <!-- 选择模块 -->
                <div class="start-select solo-start-select">
                    <a href="#" class="c-t">修改SOLO赛信息</a>
                </div>
            <?php }else{ ?>
                <!-- 底部文字 -->
                <div class="bac-words">
                    <p>你还没有报名SOLO赛，快来吧！</p>
                </div>
                <!-- 选择模块 -->
                <div class="start-select solo-start-select">
                    <a href="#" class="c-t">报名SOLO赛</a>
                </div>
            <?php } ?>
        </div>
    </div>
    <script type="text/javascript">
    $(".c-t").click(function() {
        $(".creat-teams").css("display", "block");
        $(".teams-index,.footerbox").animate({
                "left": "-100%"
            },
            300,
            function() {
                $(".teams-index").css("display", "none");
            });
        $(".creat-teams").animate({
            "left": "0"
        }, 300)
    });
    </script>
    <!-- 创建页面模块 -->
    <div class="creat-teams" style="left: 100%;display: none;">
        <div class="c-t-h">
            <span class="return return-btn"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
            <span>报名SOLO赛</span>
        </div>
        <!-- 战队注册 -->
        <div class="register">
            <div class="t-logo" style="position:relative;">
                <span>SOLO标志</span>
                <div>
                    <span class="logo-pic" id="showimg_fengmian">
                        <img src="<?php echo ($zd["solologo"]); ?>" style="width:75px;height:75px;border-radius:50%;">
                    </span>
                    <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
                </div>
                <div id="main_fengmian" class="logo_btn" style="position: absolute;width:100%;height:100%;z-index:2;left:0;top:0;">
                    <form id='upload_fengmian' action='./Public/Mobile/js/upload/action.php' method='post' enctype='multipart/form-data' style="width:100%;height:100%;">
                        <input id="fileupload_fengmian" type="file" name="mypic" value="<?php echo ($zd["solologo"]); ?>" style="display:block;width:100%;height:100%;margin:0;filter:alpha(opacity:0); opacity:0;  -moz-opacity:0;-khtml-opacity: 0" />
                    </form>
                    <input id="zd_logo" type="hidden" name="zd_logo" value="<?php echo ($zd["solologo"]); ?>" />
                </div>
            </div>
            <div class="register1">
                <div class="t-name">
                    <span>SOLO名称</span>
                    <div>
                        <?php if(empty($zd["soloname"])): ?><span>未填写</span>
                        <?php else: ?>
                            <span><?php echo ($zd["soloname"]); ?></span><?php endif; ?>
                        <input type="hidden" id="zd_soloname" value="<?php echo ($zd["soloname"]); ?>">
                        <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
                    </div>
                </div>
                <div class="t-word">
                    <span>我的宣言</span>
                    <div>
                        <?php if(empty($zd["xuanyan"])): ?><span>未填写</span>
                            <?php else: ?>
                            <span><?php echo ($zd["xuanyan"]); ?></span><?php endif; ?>
                        <input type="hidden" id="zd_xuanyan" value="<?php echo ($zd["xuanyan"]); ?>">
                        <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
                    </div>
                </div>
                <div class="t-boss">
                    <span>我的姓名</span>
                    <div>
                        <?php if(empty($zd["name"])): ?><span>未填写</span>
                        <?php else: ?>
                            <span><?php echo ($zd["name"]); ?></span><?php endif; ?>
                        <input type="hidden" id="zd_name" value="<?php echo ($zd["name"]); ?>">
                        <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
                    </div>
                </div>
                <div class="t-tel">
                    <span>手机号码</span>
                    <div>
                        <?php if(empty($zd["phone"])): ?><span>未填写</span>
                        <?php else: ?>
                            <span><?php echo ($zd["phone"]); ?></span><?php endif; ?>
                        <input type="hidden" id="zd_phone" value="<?php echo ($zd["phone"]); ?>">
                        <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
                    </div>
                </div>
                <div class="t-school">
                    <span>学校</span>
                    <div>
                        <?php if(empty($zd["xuexiao"])): ?><span>未填写</span>
                            <?php else: ?>
                            <span><?php echo ($zd["xuexiaoname"]); ?></span><?php endif; ?>
                        <input type="hidden" id="zd_xuexiao" value="<?php echo ($zd["xuexiao"]); ?>">
                        <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
                    </div>
                </div>
                <div class="t-class">
                    <span>专业班级</span>
                    <div>
                        <?php if(empty($zd["banji"])): ?><span>未填写</span>
                            <?php else: ?>
                            <span><?php echo ($zd["banji"]); ?></span><?php endif; ?>
                        <input type="hidden" id="zd_banji" value="<?php echo ($zd["banji"]); ?>">
                        <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- 完成弹出按钮 -->
        <div class="screen" style="display: none"></div>
        <div class="popup-s" style="display: none;">
            <p>温馨提示</p>
            <p>恭喜您，红牛SOLO赛报名成功</p>
            <div>确定</div>
        </div>
        <div class="complete">
            <a>完成</a>
            <script type="text/javascript">
            $('.popup-s div').click(function() {
                $(".creat-teams,.popup-s").animate({
                    left: "-100%"
                }, 300, function() {
                    window.location.href = "<?php echo U('Index/soloindex');?>";
                })
            })
            $('.complete a').click(function() {
                var zd_solologo=$("#zd_logo").val();
                var zd_soloname=$("#zd_soloname").val();
                var zd_xuanyan=$("#zd_xuanyan").val();
                var zd_name=$("#zd_name").val();
                var zd_phone=$("#zd_phone").val();
                var zd_xuexiao=$("#zd_xuexiao").val();
                var zd_banji=$("#zd_banji").val();

                $.post("<?php echo U('Index/dosolo');?>", {zd_solologo:zd_solologo,zd_soloname:zd_soloname,zd_xuanyan:zd_xuanyan,zd_name:zd_name,zd_phone:zd_phone,zd_xuexiao:zd_xuexiao,zd_banji:zd_banji}, function(v){

                    if(v.jieguo=='cg'){
                        $(".screen").show();
                        $(".popup-s").fadeIn(300);
                    }else if(v.jieguo=='nosolologo'){
                        alert("请上传SOLO标志");
                    }else if(v.jieguo=='nosoloname'){
                        alert("请输入SOLO名称");
                    }else if(v.jieguo=='noxuanyan'){
                        alert("请输入我的宣言");
                    }else if(v.jieguo=='noname'){
                        alert("请输入我的姓名");
                    }else if(v.jieguo=='nophone'){
                        alert("请输入手机号码");
                    }else if(v.jieguo=='noxuexiao'){
                        alert("请选择学校");
                    }else if(v.jieguo=='nobanji'){
                        alert("请输入专业班级");
                    }

                },'JSON');
            })
            </script>
        </div>
    </div>
    <!-- 战队名称页面 -->
    <div class="t-n t-sub" style="left: 100%;display: none;">
        <div class="c-t-h">
            <span class="return return-t-n"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
            <span>SOLO名称</span>
            <div class="confirm confirm-t-n">确认</div>
        </div>
        <input type="text" name="tn" placeholder="未填写" />
    </div>
    <!-- 战队宣言页面 -->
    <div class="t-w t-sub" style="left: 100%;display: none;">
        <div class="c-t-h">
            <span class="return return-t-w"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
            <span>我的宣言</span>
            <div class="confirm confirm-t-w">确认</div>
        </div>
        <input type="text" name="tn" placeholder="请保持在15个字以内" />
    </div>
    <!-- 队长姓名页面 -->
    <div class="t-b t-sub" style="left: 100%;display: none;">
        <div class="c-t-h">
            <span class="return return-t-b"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
            <span>我的姓名</span>
            <div class="confirm confirm-t-b">确认</div>
        </div>
        <input type="text" name="tn" placeholder="未填写" />
    </div>
    <!-- 手机号页面 -->
    <div class="t-t t-sub" style="left: 100%;display: none;">
        <div class="c-t-h">
            <span class="return return-t-t"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
            <span>手机号</span>
            <div class="confirm confirm-t-t">确认</div>
        </div>
        <input type="text" name="tn" placeholder="未填写" />
    </div>
    <!-- 学校 -->
    <div class="t-s t-sub" style="left: 100%;display: none;">
        <div class="c-t-h">
            <span class="return return-t-s"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
            <span>学校</span>
            <div class="confirm confirm-t-s">确认</div>
        </div>
        <div class="t-select">
            <?php if(is_array($bs_xuexiao)): $i = 0; $__LIST__ = $bs_xuexiao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><div class="t-e-s t-e-s1 s3" data-id="<?php echo ($l["id"]); ?>"><?php echo ($l["name"]); ?>
                    <div><img src="Public/Mobile/new/images/games/danxuan1.png"></div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <!-- 专业班级 -->
    <div class="t-c t-sub" style="left: 100%;display: none;">
        <div class="c-t-h">
            <span class="return return-t-c"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
            <span>专业班级</span>
            <div class="confirm confirm-t-c">确认</div>
        </div>
        <input type="text" name="tn" placeholder="未填写" />
    </div>
    <!-- 子页面跳转js -->
    <script type="text/javascript">
    //页面跳转函数
    function rconvert(a, b) {
        $('.' + b).css("display", "block");
        $('.' + a).animate({
                "left": "100%"
            },
            300,
            function() {
                $('.' + a).css("display", "none");
            });
        $('.' + b).animate({
            left: "0"
        }, 300)
    }

    function convert(a, b) {
        $('.' + b).css("display", "block");
        $('.' + a).animate({
                "left": "-100%"
            },
            300,
            function() {
                $('.' + a).css("display", "none");
            });
        $('.' + b).animate({
            "left": "0"
        }, 300)
    }
    $(".return-btn").click(function() {
        rconvert('creat-teams', 'teams-index');
        $(".footerbox").animate({
            "left": "0"
        }, 300)
    });
    //战队名称点击跳转
    $(".t-name").click(function() {
        convert('creat-teams', 't-n');
    })
    $(".return-t-n,.confirm-t-n").click(function() {
            rconvert('t-n', 'creat-teams');
        })
        // 比赛项目点击跳转
    $(".t-event").click(function() {
        convert('creat-teams', 't-e');
    })
    $(".return-t-e,.confirm-t-e").click(function() {
            rconvert('t-e', 'creat-teams');
        })
        // 比赛宣言点击跳转
    $(".t-word").click(function() {
        convert('creat-teams', 't-w');
    })
    $(".return-t-w,.confirm-t-w").click(function() {
            rconvert('t-w', 'creat-teams');
        })
        // 队长名称点击跳转
    $(".t-boss").click(function() {
        convert('creat-teams', 't-b');
    })
    $(".return-t-b,.confirm-t-b").click(function() {
            rconvert('t-b', 'creat-teams');
        })
        // 手机号跳转
    $(".t-tel").click(function() {
        convert('creat-teams', 't-t');
    })
    $(".return-t-t,.confirm-t-t").click(function() {
            rconvert('t-t', 'creat-teams');
        })
        // 学校跳转
    $(".t-school").click(function() {
        convert('creat-teams', 't-s');
    })
    $(".return-t-s,.confirm-t-s").click(function() {
            rconvert('t-s', 'creat-teams');
        })
        // 专业班级跳转
    $(".t-class").click(function() {
        convert('creat-teams', 't-c');
    })
    $(".return-t-c,.confirm-t-c").click(function() {
            rconvert('t-c', 'creat-teams');
        })
        // 擅长位置跳转
    $(".t-lol").click(function() {
        convert('creat-teams', 't-l');
    })
    $(".return-t-l,.confirm-t-l").click(function() {
            rconvert('t-l', 'creat-teams');
        })
        //单选点击更换选中状态
    $('.t-e-s2').click(function() {
        console.log($(this).find("img").attr('src'));
        if ($(this).find("img").attr('src') == 'Public/Mobile/new/images/games/fuxuan1.png') {
            $(this).find("img").attr('src', 'Public/Mobile/new/images/games/fuxuan.png');
        } else if ($(this).find("img").attr('src') == 'Public/Mobile/new/images/games/fuxuan.png') {
            $(this).find("img").attr('src', 'Public/Mobile/new/images/games/fuxuan1.png');
        }
    })
    $('.t-e-s1').click(function() {
        console.log($(this).find("img").attr('src'));
        $('.t-e-s1 img').attr('src', 'Public/Mobile/new/images/games/danxuan1.png')
        $(this).find("img").attr('src', 'Public/Mobile/new/images/games/danxuan.png');
    })
    </script>

    <!-- 获取输写内容 -->
    <script type="text/javascript">
        $('.confirm-t-n').click(function() {
            var inputc = $('.t-n > input').val();
            if (inputc == '') {
                $('.t-name > div > span:nth-of-type(1)').text('未填写');
            } else {
                $('.t-name > div > span:nth-of-type(1)').text(inputc);
            }
            $("#zd_soloname").val(inputc);
        })
        $('.confirm-t-w').click(function() {
            var inputc = $('.t-w > input').val();
            if (inputc == '') {
                $('.t-word > div > span:nth-of-type(1)').text('未填写');
            } else {
                $('.t-word > div > span:nth-of-type(1)').text(inputc);
            }
            $("#zd_xuanyan").val(inputc);
        })
        $('.confirm-t-b').click(function() {
            var inputc = $('.t-b > input').val();
            if (inputc == '') {
                $('.t-boss > div > span:nth-of-type(1)').text('未填写');
            } else {
                $('.t-boss > div > span:nth-of-type(1)').text(inputc);
            }
            $("#zd_name").val(inputc);
        })

        $('.confirm-t-t').click(function() {
            var inputc = $('.t-t > input').val();
            if (inputc == '') {
                $('.t-tel > div > span:nth-of-type(1)').text('未填写');
            } else {
                $('.t-tel > div > span:nth-of-type(1)').text(inputc);
            }
            $("#zd_phone").val(inputc);
        })
        $('.confirm-t-s').click(function() {
            var inputc = '';
            var inputid = '';
            for (var i = 0; i < 80; i++) {
                var j = i + 1;
                if ($('.s3:nth-of-type(' + j + ') img').attr('src') == 'Public/Mobile/new/images/games/danxuan.png') {
                    inputc += $('.s3:nth-of-type(' + j + ')').text();
                    inputid = $('.s3:nth-of-type(' + j + ')').attr("data-id");
                }
            }
            $('.t-school > div > span:nth-of-type(1)').text(inputc);
            if (inputc == '') {
                $('.t-school > div > span:nth-of-type(1)').text('未填写');
            }
            $("#zd_xuexiao").val(inputid);
        })
        $('.confirm-t-c').click(function() {
            var inputc = $('.t-c > input').val();
            if (inputc == '') {
                $('.t-class > div > span:nth-of-type(1)').text('未填写');
            } else {
                $('.t-class > div > span:nth-of-type(1)').text(inputc);
            }
            $("#zd_banji").val(inputc);
        })

    </script>
    <script type="text/javascript" src="./Public/Mobile/js/upload/jquery.form.js"></script>
    <script type="text/javascript">
        $(function() {

            //战队logo照片

            var showimg_fengmian = $('#showimg_fengmian').find("img");
            var new_img_fengmian = $('#zd_logo');
            $("#fileupload_fengmian").change(function () {
                $("#upload_fengmian").ajaxSubmit({
                    dataType: 'json',
                    beforeSend: function () {
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                    },
                    success: function (data) {
                        var img_fengmian = data.pic_path;
                        showimg_fengmian.attr("src",img_fengmian);
                        new_img_fengmian.val(img_fengmian);
                    },
                    error: function (xhr) {
                    }
                });
            });
        });
    </script>
<div class="footerbox">
    <ul>
        <li <?php if((ACTION_NAME) == "games"): ?>class="active"<?php endif; ?>
        <?php if((ACTION_NAME) == "lolteams"): ?>class="active"<?php endif; ?>
        <?php if((ACTION_NAME) == "cfunding"): ?>class="active"<?php endif; ?>
        <?php if((ACTION_NAME) == "lolrace"): ?>class="active"<?php endif; ?>
        <?php if((ACTION_NAME) == "sologames"): ?>class="active"<?php endif; ?>
        <?php if((ACTION_NAME) == "teamlist"): ?>class="active"<?php endif; ?>
        <?php if((ACTION_NAME) == "teamsindex"): ?>class="active"<?php endif; ?>
        <?php if((ACTION_NAME) == "soloindex"): ?>class="active"<?php endif; ?>
            >
            <a class="menu07" href="<?php echo U('Index/games');?>">赛事</a>
        </li>
        <li <?php if((ACTION_NAME) == "index"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "indexx"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "readarticles"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "news"): ?>class="active"<?php endif; ?>
            >
            <?php if(($_SESSION["gametypeid"]) == "1"): ?><a class="menu05" href="<?php echo U('Index/index');?>">竞猜</a>
                <?php else: ?>
                <a class="menu01" href="<?php echo U('Index/index');?>">竞猜</a><?php endif; ?>
        </li>
        <li <?php if((ACTION_NAME) == "hero"): ?>class="active"<?php endif; ?>
            >
            <a class="menu02" href="<?php echo U('Index/hero');?>">英雄猜</a>
        </li>
        <li <?php if((ACTION_NAME) == "dld"): ?>class="active"<?php endif; ?>

            >
            <?php if(($_SESSION["gametypeid"]) == "1"): ?><a class="menu04" href="<?php echo U('Index/dld');?>">大乱斗</a>
                <?php else: ?>
                <a class="menu06" href="<?php echo U('Index/dld');?>">大乱斗</a><?php endif; ?>
        </li>
        <li <?php if((ACTION_NAME) == "mycenter"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "art"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "chtype"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "mygolds"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "myquiz"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "myqr"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "tobuy"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "tobuygo"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "topay"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "recom"): ?>class="active"<?php endif; ?>
            <?php if((ACTION_NAME) == "recoms"): ?>class="active"<?php endif; ?>
            >
            <a class="menu03" href="<?php echo U('Index/mycenter');?>">个人</a>
        </li>
    </ul>
</div>
<div class="box qiandaocg_box" style="z-index:100;display:none;"></div>
<div class="layer qiandaocg_layer" style="z-index:111;display:none;">
    <div class="layer-img">
        <?php if(($_SESSION["gametypeid"]) == "2"): ?><img src="__PUBLIC__/images/time-day2.png">
            <?php else: ?>
            <img src="__PUBLIC__/images/time-day.png"><?php endif; ?>
    </div>
    <div class="con-layer">
        <h3>欢迎来到全民菠菜<?php if(($_SESSION["gametypeid"]) == "2"): ?>DOTA2<?php else: ?>LOL<?php endif; ?>专区</h3>
        <p>
            <?php if(($_SESSION["gametypeid"]) == "2"): ?>DOTA2
                <?php else: ?>LOL<?php endif; ?>奋战礼包</p>
        <table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr class="title">
                <td <?php if($new_qdnum>=1 && $new_qdnum <3){ ?> class="day-color"
                        <?php } ?>>登录一天</td>
                <td <?php if($new_qdnum>=3 && $new_qdnum <5){ ?> class="day-color"
                        <?php } ?>>连续三天</td>
                <td <?php if($new_qdnum>=5){ ?> class="day-color"
                    <?php } ?>>连续五天</td>
            </tr>
            <tr>
                <td <?php if($new_qdnum>=1 && $new_qdnum <3){ ?> class="day-color"
                        <?php } ?>>30金币 </td>
                <td <?php if($new_qdnum>=3 && $new_qdnum <5){ ?> class="day-color"
                        <?php } ?>>50金币</td>
                <td <?php if($new_qdnum>=5){ ?> class="day-color"
                    <?php } ?>>70金币</td>
            </tr>
        </table>
    </div>
    <a class="btn-dota qiandaocg_btn" href="javascript:;">领 取</a>
</div>
<div class="box fr_qiandaocg_box" style="z-index:200;display:none;"></div>
<div class="layer fr_qiandaocg_layer" style="z-index:211;display:none;">
    <div class="layer-img">
        <?php if(($_SESSION["gametypeid"]) == "2"): ?><img src="__PUBLIC__/images/first2.png">
            <?php else: ?>
            <img src="__PUBLIC__/images/first.png"><?php endif; ?>
    </div>
    <div class="con-layer">
        <h3 style="margin-bottom:20px;">全民菠菜新手大礼包</h3>
        <table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr class="title">
                <td style="color:#e6e6e6;">88金币</td>
            </tr>
        </table>
    </div>
    <a class="btn-dota fr_qiandaocg_btn" href="javascript:;">领 取</a>
</div>
<!--余额不足 弹窗 start-->
<div class="tc_box_bg" id="yuebz_box">
    <div class="tc_box">
        <div class="tc_box_close" onclick="hide_yuebz_box()">
            <img src="__PUBLIC__/new/images/close.png" />
        </div>
        <div class="img_icon">
            <img class="sad_img" src="__PUBLIC__/new/images/sad.png" />
        </div>
        <div class="img_icon_text">
            您的金币余额不足，您想以<span id="yuebz_box_y">10</span>元购买<span id="yuebz_box_j">1050</span>金币参与竞猜吗？
        </div>
        <div class="img_icon_btn">
            <a href="<?php echo U('Index/myqr');?>" class="img_icon_btn1">招募战友</a>
            <a href="<?php echo U('Index/topay',array(rmb=>10));?>" class="img_icon_btn2" id="gotopay_btn">确定购买</a>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
function show_yuebz_box(t) {
    $("#yuebz_box").show();
    if (t <= 1050) {
        var yue_y = 10;
        var yue_j = 1050;
    } else if (t > 1050 && t <= 2200) {
        var yue_y = 20;
        var yue_j = 2200;
    } else if (t > 2200 && t <= 5500) {
        var yue_y = 50;
        var yue_j = 5500;
    } else if (t > 5500 && t <= 11000) {
        var yue_y = 100;
        var yue_j = 11000;
    } else if (t > 11000 && t <= 22000) {
        var yue_y = 200;
        var yue_j = 22000;
    } else {
        var yue_y = Math.floor(t / 110) + 1;
        var yue_j = yue_y * 110;
    }
    $("#yuebz_box_y").text(yue_y);
    $("#yuebz_box_j").text(yue_j);
    $("#gotopay_btn").attr("href", "./index.php?a=topay&m=index&rmb=" + yue_y);

}

function hide_yuebz_box() {
    $("#yuebz_box").hide();
}
</script>
<!--余额不足 弹窗 end-->
<!--竞猜成功 弹窗 start-->
<div class="tc_box_bg" id="jccg_box">
    <div class="tc_box">
        <div class="tc_box_close" onclick="hide_jccg_box()">
            <img src="__PUBLIC__/new/images/close.png" />
        </div>
        <div class="img_icon">
            <img src="__PUBLIC__/new/images/jc/cg.png" class="jccg_icon" />
            <span class="jccg_text">竞猜成功</span>
        </div>
        <div class="img_icon_text2">
            您已成功投注<span id="jccg_box_xuan">1</span>（<span id="jccg_box_peilv">1</span>赔率动态变化，以最后封盘前赔率为准）
            <br />
            <br /> 投注额：
            <span id="jccg_box_golds">1</span>金币
        </div>
        <div class="img_icon_btn">
            <a href="javascript:;" onclick="hide_jccg_box()">继续其他投注</a>
        </div>
    </div>
</div>
<script type="text/javascript">
function show_jccg_box() {
    $("#jccg_box").show();

}

function hide_jccg_box() {
    $("#jccg_box").hide();
}
</script>
<!--竞猜成功 弹窗 end-->
<script type="text/javascript">
$(document).ready(function() {
    var qiandaocg = {
        $qiandaocg
    };
    if (qiandaocg >= 1) {
        show_qiandaocg();
        //setInterval(hide_qiandaocg,3000);
    }
    $(".qiandaocg_btn").click(function(event) {
        hide_qiandaocg();
    });
    var fr_qiandaocg = {
        $frqiandaocg
    };
    if (fr_qiandaocg >= 1) {
        show_fr_qiandaocg();
    }
    $(".fr_qiandaocg_btn").click(function(event) {
        hide_fr_qiandaocg();
    });

});

function show_qiandaocg() {
    //$(".qiandaocg_layer").css({"display":"block"});
    //$(".qiandaocg_box").css({"display":"block"});
    $(".qiandaocg_layer").show();
    $(".qiandaocg_box").show();
    //$(".qiandaocg_layer").fadeIn("slow");
    //$(".qiandaocg_box").fadeIn("slow");
    //	$(".qiandaocg_layer").slideDown("slow");
    //	$(".qiandaocg_box").slideDown("slow");
}

function hide_qiandaocg() {
    //$(".qiandaocg_layer").css({"display":"none"});
    //$(".qiandaocg_box").css({"display":"none"});
    $(".qiandaocg_layer").fadeOut("slow");
    $(".qiandaocg_box").fadeOut("slow");
    //	$(".qiandaocg_layer").slideUp("slow");
    //	$(".qiandaocg_box").slideUp("slow");
}

function show_fr_qiandaocg() {
    $(".fr_qiandaocg_layer").show();
    $(".fr_qiandaocg_box").show();
}

function hide_fr_qiandaocg() {
    $(".fr_qiandaocg_layer").fadeOut("slow");
    $(".fr_qiandaocg_box").fadeOut("slow");
}
</script>
<style type="text/css">
.peilv {
    font-weight: 100;
}

.user-about img {
    border-radius: 100%;
    -moz-border-radius: 100%;
    -webkit-border-radius: 100%;
}

.peilvactive {
    color: #e6e6e6 !important;
    font-weight: 100;
}

.data_box_value {
    display: none;
}

.submit-btn {
    border: none;
}

.top {
    margin-top: 41px;
}

h3 font {
    color: #fff;
}

#jswbox {
    width: 100%;
    margin: 0px auto;
    background: url(__PUBLIC__/images/bg.jpg) left top no-repeat;
    background-size: cover;
    height: 260px;
}

#jswbox ul {
    position: relative;
}

#jswbox li {
    position: absolute;
    width: 0;
    z-index: 0;
    cursor: pointer;
    overflow: hidden;
}

#jswbox li img {
    width: 100%;
    height: auto;
    vertical-align: top;
    float: left;
    border: 0;
}

ul.lolhero li {
    left: 450px;
    top: 70px;
    height: auto;
}

ul.dotahero li {
    left: 450px;
    top: 70px;
    height: auto;
}

.header {
    z-index: 99;
}
</style>
</body>

</html>