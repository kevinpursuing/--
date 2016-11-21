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

<link rel="stylesheet" type="text/css" href="Public/Mobile/css/gamenav.css">
<link rel="stylesheet" type="text/css" href="Public/Mobile/css/device.css">
<link rel="stylesheet" type="text/css" href="Public/Mobile/css/lolteams.css">
<link rel="stylesheet" type="text/css" href="Public/Mobile/css/teamsindex.css?201610101703">
<link rel="stylesheet" type="text/css" href="Public/Mobile/css/soloindex.css?201610122031">
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

<!-- 战队主页 -->
<div class="teamsindex">
    <!-- 战队导航栏 -->
    <div class="team-h" style="display: none;">
        <ul>
            <li><a <?php if((ACTION_NAME) == "teamsindex"): ?>class="active"<?php endif; ?> href="<?php echo U('Index/teamsindex');?>">我的战队</a></li>
            <li><a <?php if((ACTION_NAME) == "teamlist"): ?>class="active"<?php endif; ?> href="<?php echo U('Index/teamlist');?>">战队列表</a></li>
            <li><a <?php if((ACTION_NAME) == "sologames"): ?>class="active"<?php endif; ?>
                       <?php if((ACTION_NAME) == "soloindex"): ?>class="active"<?php endif; ?> href="<?php echo U('Index/soloindex');?>">我的SOLO</a></li>
        </ul>
    </div>
    <div class="screen" style="display: none;">
    </div>
    <div class="game-rules" style="display: none;">
        <div class="rules-title">
            <p>赛事规则</p>
            <div class="rules-close">
                <img src="Public/Mobile/new/images/games/guanbi.png">
            </div>
        </div>
        <!-- 赛事规则内容 -->
        <div class="rule-content">
            <p>如对赛事规则仍存问题请加QQ群：454517990</p>
            <p>一、赛事管理基本守则：</p>
            选手应完全配合本次大赛赛事组委会的赛事工作安排。
            <br>         选手应服从赛事组委会要求，遵守竞赛规则和裁判判罚，尊重参赛各俱乐部及选手，文明比赛，严肃认真，遵纪守法，服从安排，圆满完成全部赛事。
            <br>         选手应配合赛事组委会关于赛事及相关宣传。
            <br>         选手应遵守组委会安排的比赛赛程并保证准时到达指定赛事场地，如有临时调动服从组委会安排。
            <br>         比赛期间如遇纠纷等突发状况，需以保障大赛顺利进行为原则，坚决不在赛场内做斗殴吵闹等影响大赛顺利进行的事情。
            <br> 二、赛事比赛细则：
            <br>        选手须遵守比赛规则，并服从裁判做出的判罚！
            <br>        比赛中除队长外不得使用公开聊天频道。
            <br>        抽签、进入房间须有效率，裁判发起命令3分钟内未进入游戏房间准备完毕的队伍视为弃权；
            <br>        选手可使用自带外设，但更换调试外设时间，每轮不超过10分钟，10分钟内无法正常运行自带外设的选手，须换回使用比赛现场外设；
            <br>        准备完毕后，须等待裁判发令比赛开始后才能开始比赛；
            <br>        在比赛时，若发生断网、断电等导致游戏终断无法重连的情况， 20分钟内的比赛重新开始，20分钟后的比赛，若满足以下任一条件裁判将直接判罚胜负：
            <br>        （1）团队经济差距大于10K；
            <br>        （2）人头差距大于15；
            <br>        （3）剩余防御塔差距大于7；
            <br>        不满足以上任一条件的比赛将进行重赛。
            <br>        比赛中不得利用任何BUG，不得使用有严重BUG的英雄，以现场裁判通知为准。
            <br>        比赛中出现任何突发情况，须立即与裁判联系，裁判作出判罚，选手须完全服从，否则视为弃权。
            <br> 三、比赛设置：
            <br>         1.比赛客户端：英雄联盟电信比赛服；
            <br>         2.比赛在比赛专用服进行，参赛选手可自备比赛服帐号，没有开通比赛服账号则使用主办方专用比赛账号进行比赛；
            <br>         3.比赛版本：比赛服当日最新版；
            <br>         4.比赛模式：5V5 召唤师峡谷征召模式；
            <br>         5.比赛胜负由系统判定胜负为准；
            <br>         6.由裁判组织方决定选边；
            <br>         7.比赛在BP后正式开始，从比赛开始至比赛结束全过程不得人为退出游戏，如在BP过程中出现掉线，则重开游戏，保留原BP，如有违者视为弃权；
            <br>         8.队伍中只要有1名选手被视为弃权，则全队取消参赛资格。
            <br> 四、比赛规则：
            <br>         1.比赛中不得使用任何第三方软件(聊天工具除外)，否则视为弃权；
            <br>         2.比赛中不得利用任何BUG，不得使用有严重BUG的英雄，以现场裁判通知为准；
            <br>         3.比赛中出现任何突发情况，须立即与裁判联系，裁判作出判罚，选手须完全服从；
            <br>         4.遇到特殊情况，双方各拥有2次紧急暂停权利，但需向裁判说明暂停理由；其余情况下需要暂停，场上队长需在公聊频道提出或者举手示意（线下赛），在裁判许可的情况下，进行暂停，暂停时间都不得超过3分钟；
            <br>         5.比赛暂停不允许在双方交战过程中发生，任何一方违反次规定将被予以警告，警告无效后，裁判有权判负本场比赛；
            <br>         6.若出现冒名顶替、代打、假赛、作弊等有违比赛公平原则的情况，一经查实，将直接取消此选手本赛季所有比赛成绩与参赛资格；
            <br>         7.比赛完成后，双方战队管理者可保留战队比赛录像，以便在产生纠纷的情况下备查，但包括战队管理者在内的所有战队成员不得在没有得到赛事组委会许可的情况下，向外界发布相关比赛录像；
            <br>         8.比赛每个战队允许报6名参赛选手，比赛开始后不允许换人。如需更换队员，至少提前10分钟通知裁判；
            <br>         9.比赛的选边由裁判在赛前投硬币确定，决胜局需裁判重新投掷硬币确定分边（猜边时保证双方队员代表在场）；
            <br>         10.比赛开始前20分钟到场，选边，比赛开始后10分钟未到少一个ban位，开始后15分钟未到则判负。
            <br> 五、选手准则及联盟相关处罚：
            <br>         比赛中，在比赛未结束前不得以任何方式退出游戏，需保留比赛最后的画面直到裁判示意比赛结束，若队员以任何方式退出比赛，取消本届比赛成绩。
            <br>         在赛事期间若选手无故缺席了比赛场次，该场次视为判负，取消本届比赛成绩。
            <br>         若选手因为迟到而影响了赛程、转播，将视情节严重性进行：
            <br> ①取消本届比赛成绩；
            <br> ②追加选手禁赛1至2个赛季。
            <br>         比赛期间如队员没有准时签到：比赛开始前10分钟仍未到场，判负处理。
            <br>         选手应按照组委会的要求遵从赛事组委会制定的规则，包括但不限于合理的赛制、赛程、媒体采访、协助宣传拍摄等，否则将取消本届比赛成绩并追加处罚选手禁赛1至2个赛季。
            <br>  六、其他事项
            <br> 大赛的奖品、奖金设定和对应的发放时间以及活动解释权由大赛组织方“西安电竞之家”所有，参赛选手需无条件遵守。
            <br>
            </p>
        </div>
        <a class="agree" href="#">同意</a>
    </div>
    <script type="text/javascript">
    $(function() {
        $(".team-h").fadeIn(300);
    })
    </script>
    <!-- 战队介绍 -->
    <div class="team-intro">
        <!-- 帮助以及内容修改 -->
        <div class="icon">
            <a href="<?php echo U('Index/sologames');?>">
                <div class=modify><img src="Public/Mobile/new/images/games/xiugai.png"></div>
            </a>
            <div class=help><img src="Public/Mobile/new/images/games/saishiguize.png"></div>
        </div>
        <script type="text/javascript">
        $(".help").click(function() {
            $(".game-rules").show();
            $(".screen").show();   
        })
        $(".rules-close").click(function() {
            $(".game-rules").hide();
            $(".screen").hide();
        });
        $(".agree").click(function() {
            $(".game-rules").hide();
            $(".screen").hide();
            $(".screen a").hide();
        });
        </script>
        <!-- 战队标志 -->
        <div class="index-logo">
            <div class="index-logo-pic">
                <img src="<?php echo ($solo_info["solologo"]); ?>">
            </div>
        </div>
        <div class="index-intro">
            <p><?php echo ($solo_info["soloname"]); ?></p>
            <p><?php echo ($solo_info["xuexiaoname"]); ?></p>
            <p>比赛项目： 红牛SOLO赛</p>
            <p>solo手机号：<?php echo ($solo_info["phone"]); ?></p>
          <!--   <p>总奖金：<?php echo ($solo_info["jiangjin"]); ?></p> -->
        </div>
    </div>
    <p class="ht">参赛成员</p>
    <div class="team-member">
        <div class="team-member-content">
            <div class="leader-icon"><img src="Public/Mobile/new/images/games/duizhang.png"></div>
            <div class="member-logo">
                <img src="<?php echo ($solo_info["solologo"]); ?>">
            </div>
            <p class="white"><?php echo ($solo_info["name"]); ?></p>
            <p class="white"><?php echo ($solo_info["banji"]); ?></p>
            <p class="light-blue"><?php echo ($solo_info["duweizhi"]); ?></p>
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
            </script>
        </div>
    </div>
    <p class="ht">参赛纪录</p>
    <div class="team-record">
        <?php if(is_array($jilu)): $i = 0; $__LIST__ = $jilu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$j): $mod = ($i % 2 );++$i;?><div class="t-bet1">
                <div class="t-logo1">
                    <img src="<?php echo ($j["user1info"]["solologo"]); ?>" alt="<?php echo ($j["user1info"]["soloname"]); ?>">
                    <div class="t-tname">
                        <?php echo ($j["user1info"]["soloname"]); ?>
                    </div>
                </div>
                <div class="t-logomid">
                    <div class="t-logomid_li2">
                        <span class="t-logomid_li2_bf"><?php echo ($j["jieguo"]); ?></span>
                    </div>
                    <div class="t-logomid_li3">
                        <?php echo ($j["jibie"]); ?>
                    </div>
                </div>
                <div class="t-logo2">
                    <img src="<?php echo ($j["user2info"]["solologo"]); ?>" alt="<?php echo ($j["user2info"]["soloname"]); ?>">
                    <div class="t-tname">
                        <?php echo ($j["user2info"]["soloname"]); ?>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!-- 加入战队 -->
<div class="join-team" style="display: none;left: 100%">
    <div class="c-t-h">
        <span class="return r-j-t"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
        <span>SOLO信息</span>
    </div>
    <div class="register register1 register-join">
        <div class="t-boss">
            <span>姓名</span>
            <div>
                <span>未填写</span>
                <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
            </div>
        </div>
        <div class="t-school">
            <span>学校</span>
            <div>
                <span>未填写</span>
                <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
            </div>
        </div>
        <div class="t-tel">
            <span>手机号码</span>
            <div>
                <span>未填写</span>
                <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
            </div>
        </div>
        <div class="t-class">
            <span>专业班级</span>
            <div>
                <span>未填写</span>
                <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
            </div>
        </div>
        <div class="t-lol">
            <span>擅长位置</span>
            <div>
                <span>未填写</span>
                <span><img src="Public\Mobile\new\images\games\xiaojiantou.png"></span>
            </div>
        </div>
    </div>
    <!-- 完成弹出按钮 -->
    <div class="screen" style="display: none"></div>
    <div class="popup-s" style="display: none;">
        <p>温馨提示</p>
        <p>个人信息填写完成</p>
        <div>确定</div>
    </div>
    <div class="complete">
        <a>完成</a>
        <script type="text/javascript">
        $('.popup-s div').click(function() {
            $('.teamsindex').css("display", "block");
            $('.join-team').animate({
                    "left": "100%"
                },
                300,
                function() {
                    $('.join-team,.popup-s,.screen').css("display", "none");
                });
            $('.teamsindex').animate({
                left: "0"
            }, 300)
        })
        $('.complete a').click(function() {
            $(".screen").show();
            $(".popup-s").fadeIn(300);
        })
        </script>
    </div>
</div>
<!-- 队长姓名页面 -->
<div class="t-b t-sub" style="left: 100%;display: none;">
    <div class="c-t-h">
        <span class="return return-t-b"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
        <span>队长姓名</span>
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
        <div class="t-e-s t-e-s1 s3">西安交通大学
            <div><img src="Public/Mobile/new/images/games/danxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s1 s3">西安电子科技大学
            <div><img src="Public/Mobile/new/images/games/danxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s1 s3">西北工业大学
            <div><img src="Public/Mobile/new/images/games/danxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s1 s3">西北大学
            <div><img src="Public/Mobile/new/images/games/danxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s1 s3">西北工业大学
            <div><img src="Public/Mobile/new/images/games/danxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s1 s3">西安建筑科技大学
            <div><img src="Public/Mobile/new/images/games/danxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s1 s3">西安邮电大学
            <div><img src="Public/Mobile/new/images/games/danxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s1 s3">西安理工学院
            <div><img src="Public/Mobile/new/images/games/danxuan1.png"></div>
        </div>
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
<!-- 擅长位置 -->
<div class="t-l t-sub" style="left: 100%;display: none;">
    <div class="c-t-h">
        <span class="return return-t-l"><span><img src="Public\Mobile\new\images\games\return.png"></span></span>
        <span>比赛项目</span>
        <div class="confirm confirm-t-l">确认</div>
    </div>
    <div class="t-select">
        <div class="t-e-s t-e-s2 s4">上单
            <div><img src="Public/Mobile/new/images/games/fuxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s2 s4">中单
            <div><img src="Public/Mobile/new/images/games/fuxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s2 s4">打野
            <div><img src="Public/Mobile/new/images/games/fuxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s2 s4">ADC
            <div><img src="Public/Mobile/new/images/games/fuxuan1.png"></div>
        </div>
        <div class="t-e-s t-e-s2 s4">辅助
            <div><img src="Public/Mobile/new/images/games/fuxuan1.png"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
//    $(".modify").click(function() {
//        convert('teamsindex', 'join-team');
//    })
$(".r-j-t").click(function() {
        rconvert('join-team', 'teamsindex');
    })
    // 队长名称点击跳转
$(".t-boss").click(function() {
    convert('join-team', 't-b');
})
$(".return-t-b,.confirm-t-b").click(function() {
        rconvert('t-b', 'join-team');
    })
    // 手机号跳转
$(".t-tel").click(function() {
    convert('join-team', 't-t');
})
$(".return-t-t,.confirm-t-t").click(function() {
        rconvert('t-t', 'join-team');
    })
    // 学校跳转
$(".t-school").click(function() {
    convert('join-team', 't-s');
})
$(".return-t-s,.confirm-t-s").click(function() {
        rconvert('t-s', 'join-team');
    })
    // 专业班级跳转
$(".t-class").click(function() {
    convert('join-team', 't-c');
})
$(".return-t-c,.confirm-t-c").click(function() {
        rconvert('t-c', 'join-team');
    })
    // 擅长位置跳转
$(".t-lol").click(function() {
    convert('join-team', 't-l');
})
$(".return-t-l,.confirm-t-l").click(function() {
        rconvert('t-l', 'join-team');
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
})
$('.confirm-t-b').click(function() {
    var inputc = $('.t-b > input').val();
    if (inputc == '') {
        $('.t-boss > div > span:nth-of-type(1)').text('未填写');
    } else {
        $('.t-boss > div > span:nth-of-type(1)').text(inputc);
    }
})
$('.confirm-t-e').click(function() {
    var inputc = '';
    var j = 2;
    for (var i = 0; i < 2; i++) {
        var j = i + 1;
        if ($('.s2:nth-of-type(' + j + ') img').attr('src') == 'Public/Mobile/new/images/games/fuxuan.png') {
            inputc += $('.s2:nth-of-type(' + j + ')').text();
        }
    }
    $('.t-event > div > span:nth-of-type(1)').text(inputc);
    if (inputc == '') {
        $('.t-event > div > span:nth-of-type(1)').text('未填写');
    }
})
$('.confirm-t-t').click(function() {
    var inputc = $('.t-t > input').val();
    if (inputc == '') {
        $('.t-tel > div > span:nth-of-type(1)').text('未填写');
    } else {
        $('.t-tel > div > span:nth-of-type(1)').text(inputc);
    }
})
$('.confirm-t-s').click(function() {
    var inputc = '';
    for (var i = 0; i < 8; i++) {
        var j = i + 1;
        if ($('.s3:nth-of-type(' + j + ') img').attr('src') == 'Public/Mobile/new/images/games/danxuan.png') {
            inputc += $('.s3:nth-of-type(' + j + ')').text();
        }
    }
    $('.t-school > div > span:nth-of-type(1)').text(inputc);
    if (inputc == '') {
        $('.t-school > div > span:nth-of-type(1)').text('未填写');
    }
})
$('.confirm-t-c').click(function() {
    var inputc = $('.t-c > input').val();
    if (inputc == '') {
        $('.t-class > div > span:nth-of-type(1)').text('未填写');
    } else {
        $('.t-class > div > span:nth-of-type(1)').text(inputc);
    }
})
$('.confirm-t-l').click(function() {
    var inputc = '';
    for (var i = 0; i < 5; i++) {
        var j = i + 1;
        if ($('.s4:nth-of-type(' + j + ') img').attr('src') == 'Public/Mobile/new/images/games/fuxuan.png') {
            inputc += $('.s4:nth-of-type(' + j + ')').text();
        }
    }
    alert(inputc);
    $('.t-lol > div > span:nth-of-type(1)').text(inputc);
    if (inputc == '') {
        $('.t-lol > div > span:nth-of-type(1)').text('未填写');
    }
})
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