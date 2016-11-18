var test=0;
// 子导航栏以及游戏类型切换
var w_width = parseInt($(window).width());
$('.section1,.section2').click(function() {
    $('.section1,.section2').removeClass("active");
    $(this).addClass("active");
});
$('.section1').click(function() {
  $('.games').css("-webkit-transform", "translate(0,0)");
    
});
$('.section2').click(function() {
    $('.games').css("-webkit-transform","translate(-" + w_width + "px,0)");
});
// 公告栏数字轮换
setInterval(function(){
  test=test+90;
   $(".notice_board .cube").css("-webkit-transform", "rotateX("+test+"deg)");
},2000);
function test1(){
 $('.games').css("-webkit-transform", "translate(0,0)");
}
function test2(){
  $('.games').css("-webkit-transform","translate(-" + w_width + "px,0)");
}
