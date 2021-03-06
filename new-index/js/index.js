//签到和首次登陆弹框
$(function() {
    // var A=$("#new_user").val();
    // var B=$("#past").val();
    // AA表示是否是新用户，BB表示是否第几天登陆
    var AA = 1;
    var BB = 3;
    if (AA == 1) {
        $(".screen3").show();
        $(".test_user_first").show();
        if (BB != -1) {
           $(".up_pd" + BB + " .up_pd_border").show();
        }
    } else if (BB != -1) {
        $(".screen3").show();
        $(".user_past").show();
        $(".up_pd" + BB + " .up_pd_border").show();
    }
    $(".user_first_close").click(function() {
        if (BB != -1) {
            $(".test_user_first").hide();
            $(".test_user_past").show();
        } else {
            $(".screen3").hide();
            $(".test_user_past").hide();
        }
    });
    $(".user_first_btn").click(function() {
        if (BB != -1) {
            $(".test_user_first").hide();
             $(".user_past").show();
        } else {
            $(".screen3,.user_past").hide();
        }
    });
});
// 用户签到按钮点击签到弹出框消失，弹出充值结果并延时消失
$(".user_past_btn").click(function() {
    $(".test_success").show();
    setTimeout(function() {
        $(".screen3,.test_user_past").hide();
    }, 1000);
});
// 公告栏正方体初始角度
var initialAngle = 0;
// 定义游戏类型
var gameType = 1;
// 子导航栏以及游戏类型切换
$('.section1').click(function() {
    $('.section2').removeClass("active2");
    $('.section2').addClass("no_active2");
    $(this).removeClass("no_active1");
    $(this).addClass("active1");
});
$('.section2').click(function() {
    $('.section1').removeClass("active1");
    $('.section1').addClass("no_active1");
    $(this).removeClass("no_active2");
    $(this).addClass("active2");
});
$('.section1').click(function() {
    $('.games').css("-webkit-transform", "translate(0,0)");

});
$('.section2').click(function() {
    $('.games').css("-webkit-transform", "translate(-" + w_width + "px,0)");
});
// 公告栏数字轮换
setInterval(function() {
    initialAngle = initialAngle + 90;
    $(".notice_board .cube").css("-webkit-transform", "rotateX(" + initialAngle + "deg)");
}, 2000);

function test1() {
    $('.games').css("-webkit-transform", "translate(0,0)");
}

function test2() {
    $('.games').css("-webkit-transform", "translate(-" + w_width + "px,0)");
}
// 领奖图标点击效果
$(".accept_prize").touchstart(function() {
    $(this).addClass("accept_prize_dark");
});
$(".accept_prize").touchend(function() {
    $(this).removeClass("accept_prize_dark");
});
// 手指滑动切换模块
$(".games").on("swipeleft", function() {
    $(".section2").click();
});
$(".games").on("swiperight", function() {
    $(".section1").click();
});
//排行和任务点击事件
$(".rank_icon,.task_icon").click(function() {
    alert("功能即将开启，尽请期待~");
});
//金币充值弹框
$(".gold_show").click(function() {
    $(".screen").show();
    $(".gold_pop_up").show();
});
$(".gold_show").touchstart(function() {
    $(".gold_plus").addClass("gold_plus_dark");
});
$(".gold_show").touchend(function() {
    $(".gold_plus").removeClass("gold_plus_dark");
});
$(".gold_popo_up_close").click(function() {
    $(".screen,.gold_pop_up").hide();
});
$(".user_past_close").click(function() {
    $(".screen3,.user_past").hide();
});
// 商城弹出框第5个充值模块动态调整充值数值
$(".gold_lv5_minus").click(function() {
    var lvMaxGold = parseInt($(".gold_lv5_num_content span").text());
    console.log(lvMaxGold);
    if (lvMaxGold == 600000) {
        $(".gold_lv5_minus").removeClass("gold_lv5_minus_active");
    }
    if (lvMaxGold > 500000) {
        lvMaxGold -= 100000;
        var presentGold = lvMaxGold * 0.05;
        $(".lv5_present span").text(presentGold);
        $(".gold_lv5_num_content span").text(lvMaxGold);
        $(".gold_lv5 .gpp_gold_num span").text(lvMaxGold);
        $(".gold_lv5 .gpp_present_num").text(presentGold);
    }
});
$(".gold_lv5_plus").click(function() {
    var lvMaxGold = parseInt($(".gold_lv5_num_content span").text());
    if (lvMaxGold == 500000) {
        $(".gold_lv5_minus").addClass("gold_lv5_minus_active");
    }
    console.log(lvMaxGold);
    lvMaxGold += 100000;
    var presentGold = lvMaxGold * 0.05;
    $(".lv5_present span").text(presentGold);
    $(".gold_lv5_num_content span").text(lvMaxGold);
    $(".gold_lv5 .gpp_gold_num span").text(lvMaxGold);
    $(".gold_lv5 .gpp_present_num").text(presentGold);
});
$(".gold_popo_up_close").touchstart(function() {
    $(this).addClass("gold_popo_up_close_dark");
});
$(".gold_popo_up_close").touchend(function() {
    $(this).removeClass("gold_popo_up_close_dark");
});
$(".get_btn,.lv5_get_btn").click(function() {
    $(".screen1").show();
    $(".single_gold_popup").show();
});
$(".get_btn,.lv5_get_btn").touchstart(function() {
    $(this).addClass("get_btn_dark");
});
$(".get_btn,.lv5_get_btn").touchend(function() {
    $(this).removeClass("get_btn_dark");
});
// 金币充值子弹框
$(".sgp_close").click(function() {
    $(".sgp_present").css("visibility", "visible");
    $(".screen1").hide();
    $(".single_gold_popup").hide();
});
$(".sgp_close").touchstart(function() {
    $(this).addClass("sgp_close_dark");
});
$(".sgp_close").touchend(function() {
    $(this).removeClass("sgp_close_dark");
});
$(".sgp_btn_wx,.sgp_btn_zfb").touchstart(function() {
    $(this).addClass("sgp_btn_dark");
});
$(".sgp_btn_wx,.sgp_btn_zfb").touchend(function() {
    $(this).removeClass("sgp_btn_dark");
});
// 不同充值模块不同充值弹框
$(".get_btn,.lv5_get_btn").click(function() {
    var rechargeGolds = $(this).parent().children(".gpp_gold_num").children("span").text();
    if (rechargeGolds == 1000) {
        $(".sgp_present").css("visibility", "hidden");
    }
    var m = parseInt(rechargeGolds / 1000);
    var pGalds = $(this).parent().find(".gpp_present_num").text();
    console.log(rechargeGolds);
    console.log(pGalds);
    $(".sgp_golds span").text(rechargeGolds);
    $(".sgp_present span").text(pGalds);
    $(".sgp_golds_m span").text(m);
});
// 支付成功弹出框
$(".sgp_btn_wx,.sgp_btn_zfb").click(function() {
    $(".screen2").show();
    $(".recharge_success_popup").show();
    var rechargeGolds = $(".sgp_golds span").text();
    if (rechargeGolds == 1000) {
        $(".rsp_present_golds").css("visibility", "hidden");
    }
    var pGalds = $(".sgp_present span").text();
    $(".rsp_get_golds span").text(rechargeGolds);
    $(".rsp_present_golds span").text(pGalds);
});
$(".rsp_confirm_btn").click(function() {
    $(".rsp_present_golds").css("visibility", "visible");
    $(".screen2").hide();
    $(".recharge_success_popup").hide();
});
$(".rsp_confirm_btn").touchstart(function() {
    $(this).addClass("rsp_confirm_btn_dark");
});
$(".rsp_confirm_btn").touchend(function() {
    $(this).removeClass("rsp_confirm_btn_dark");
});
// 点击游戏图标切换游戏
$(".lol_icon_content").click(function() {
    if (gameType == 1) {
        $(".lol_content").css("-webkit-animation", "head_icon1 1s ease");
        gameType = 2;
        setTimeout(function() {
            $(".lol_content").css("background-position", "-37px 0");
        }, 500);
    } else {
        $(".lol_content").css("-webkit-animation", "head_icon2 1s ease");
        gameType = 1;
        setTimeout(function() {
            $(".lol_content").css("background-position", "0 0");
        }, 500);
    }
});
