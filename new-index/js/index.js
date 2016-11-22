// 公告栏正正方体初始角度
var initialAngle = 0;
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
// 手指滑动切换模块
$(".games").on("swipeleft", function() {
    $(".section2").click();
});
$(".games").on("swiperight", function() {
    $(".section1").click();
});
//
