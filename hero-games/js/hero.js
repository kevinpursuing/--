        //用户总金币
        var golds = 30000;
        //获取屏幕宽度
        var w_width = $(window).width();
        //英雄数组
        var hero_18 = ['剑圣', '德莱文', '猴子', '奥巴马', '德玛', '剑姬', '机器人', '冰女', '布隆', '发条', '皎月', '维克托'];
        //倒计时秒
        var totalSeconds = 10;
        // 幸运英雄缩放的循环参数
        var timoSay = 1;
        //进步条宽度
        var l_width = 100;
        //金豆距离屏幕顶部的位置
        var goldBeanTop = $(".gold-bean").offset().top + $(".gold-bean").height() / 2;
        //金豆距离屏幕左边的位置
        var goldBeanLeft = $(".gold-bean").offset().left + $(".gold-bean").width() / 2;
        // 幸运英雄展示面板距离屏幕顶部的距离
        var resultShowPanelY = $(".lucky-hero").offset().top + $(".lucky-hero").height() / 2;
        // 幸运英雄展示面板距离屏幕左边的距离
        var resultShowPanelX = $(".lucky-hero").offset().left + $(".lucky-hero").width() / 2;
        //结果出奖动画
        function heroResult(id) {
            var test_p = id;
            //指定英雄距离容器最左边的距离
            var distance = (test_p - 1) * 96;
            //让指定英雄滑到屏幕中间
            var location_mid = distance - w_width / 2 + 48;
            $(".herolist-content").css("-webkit-transform", "translatex(-" + location_mid + "px)");
            // $(".herolist-content").animate({ transform: 'translatex(-'+location_mid +')'}, 2000, function() {
            setTimeout(function() {
                $(".result-show").css("opacity", "1");
                setTimeout(heroSelected(id), 500);
            }, 2000);

        }
        //样式清除
        function clear(id) {
            l_width = 100;
            var test_p = id;
            $(".herolist").css("background", "url(../img/background-1.png) no-repeat");
            $(".herolist").css("background-size", "100% 100%");
            $(".result-show").css("opacity", "0");
            $('.line').css("background", "green");
            $(".line").css("-webkit-animation", "none 12s linear infinite");
            $(".herolist-content>div").css("opacity", "1");
            var distance = (test_p - 1) * 96;
            $(".c-" + test_p).parent().css("border", "none");
            var location_mid = distance - w_width / 2 + 38;
            $(".herolist-content").css("-webkit-transform", "translatex(+" + location_mid + "px)");
            $(".herolist-content>div").css("-webkit-animation", "none");
            $(".herolist-content>div").css("transform", "none");
        }
        //出现结果框
        function resultShow(id) {
            $(".screen").show(300);
            $(".screen").css("visibility", "visible");
            setTimeout(heroResult(id), 300);
            setTimeout(function() {
                $('.screen').hide(300);
                $('.screen').css('visibility', 'hidden');
            }, 7000);
        }
        //对不同栏目奖金倍率不同
        function classPrize(id) {
            var meleeAdGold;
            var adGold;
            var increaseGold;
            //获取人物类别下的金币
            var heroGold = Math.round(parseInt($(".c-" + id).text()) * 3.6);
            // 为其增加选中框
            $(".c-" + id).parent().css("border", "2px solid green")
                // 判断id
            if (id <= 3) {
                meleeAdGold = Math.round(parseInt($(".m-ad").text()) * 2);
                adGold = Math.round(parseInt($(".ad").text()) * 1.5);
                increaseGold = heroGold + meleeAdGold + adGold;
            }
            if (id > 3 && id <= 6) {
                remoteAdGold = Math.round(parseInt($(".r-ad").text()) * 2);
                adGold = Math.round(parseInt($(".ad").text()) * 1.5);
                increaseGold = heroGold + remoteAdGold + adGold;
            }
            if (id > 6 && id <= 9) {
                meleeApGold = Math.round(parseInt($(".m-ap").text()) * 2);
                apGold = Math.round(parseInt($(".ap").text()) * 1.5);
                increaseGold = heroGold + meleeApGold + apGold;
            }
            if (id > 9 && id <= 12) {
                remoteApGold = Math.round(parseInt($(".r-ap").text()) * 2);
                apGold = Math.round(parseInt($(".ap").text()) * 1.5);
                increaseGold = heroGold + remoteApGold + apGold;
            }
            return increaseGold;
        }
        //倒计时以及定时出奖
        function countDown() {
            $('.line').css("background", "green");
            var time = setInterval(function() {
                $(".time span").text('' + totalSeconds + '');
                totalSeconds--;
                l_width = l_width - 10;
                $('.line').css("width", l_width + "px");
                if (totalSeconds == -1) {
                    var id = Math.ceil(Math.random() * 12);
                    var after_game = classPrize(id);
                    var star_hero = hero_18[id - 1];
                    $(".lastmonth span").text(star_hero);
                    golds = golds + after_game;
                    $(".footer span").html(golds);
                    $(".num").text(0);
                    clearInterval(time); //清除定时器
                    console.log(id);
                    resultShow(id);
                    setTimeout(function() {
                        clear(id);
                        totalSeconds = 10;
                        countDown();
                    }, 8000);
                }
            }, 1000);
        }
        //金币投注总金币减少,栏目金币增加
        $(".num").parent().click(function() {
            var sub_golds = parseInt($(this).children(".num").text());
            sub_golds = sub_golds + 100;
            $(this).children(".num").text(sub_golds);
            golds = golds - 100;
            $(".footer span").text(golds);
        });
        //点击相应类别金币向指定位置滑动
        $(".select").click(function() {
            // 在底部添加金豆
            $(".wrap").append("<div class='gold-bean'></div><div class='gold-bean1'></div><div class='gold-bean2'></div><div class='gold-bean3'></div><div class='gold-bean4'></div>");
            //元素距离屏幕顶部的位置

            var elementTop = $(this).offset().top + parseFloat($(this).height() / 2);
            //元素距离屏幕左边 的位置
            var elementLeft = $(this).offset().left + parseFloat($(this).width() / 2);
            //元素与金豆之间的竖向距离
            var distanceH = elementTop - goldBeanTop;
            //元素与金豆之间的横向距离
            var distanceW = elementLeft - goldBeanLeft;
            console.log(distanceH);
            console.log(distanceW);
            $(".gold-bean,.gold-bean1,.gold-bean2,.gold-bean3,.gold-bean4").css("-webkit-transform", "translate(" + distanceW + "px," + distanceH + "px)");
            $('.gold-bean,.gold-bean1,.gold-bean2,.gold-bean3,.gold-bean4').hide(600, function() {
                $(this).remove();
            });
        });
        // 幸运英雄滑动至面板动画
        function heroSelected(id) {

            //将英雄列表背景设为透明色
            $(".herolist").css("background", "transparent");
            // 获得幸运英雄距离顶部的距离
            var luckyHeroTop = $(".herolist-content>div:nth-of-type(" + id + ")").offset().top + parseFloat($(".herolist-content>div:nth-of-type(" + id + ")").height() / 2);
            //获得幸运英雄距离左边的距离
            var luckyHeroLeft = $(".herolist-content>div:nth-of-type(" + id + ")").offset().left + parseFloat($(".herolist-content>div:nth-of-type(" + id + ")").width() / 2);
            // 英雄列表中的英雄距离面板的横向距离
            var showDistanceH = resultShowPanelY - luckyHeroTop;
            // 英雄列表中的英雄距离面板的纵向距离
            var showDistanceW = resultShowPanelX - luckyHeroLeft;
            console.log(showDistanceH);
            console.log(showDistanceW);
            // $(".herolist-content>div:nth-of-type("+id+")").css("transition", "1s all linear");
            $(".herolist-content>div:nth-of-type(" + id + ")").css("-webkit-transform", "translate(" + showDistanceW + "px," + showDistanceH + "px) scale(2)");
            // 选中英雄动画飞出
            $(".herolist-content>div:not(.hero" + id + ")").animate({ opacity: "0" }, 300);
        };
        //提莫点击说话
        $(".timo").click(function() {
            timoWordsShow();
            $(".timo-words").fadeIn(300);
            setTimeout("$('.timo-words').fadeOut(300);", 3000);
        });

        function timoWordsShow() {
            $(".timo-words").hide();
            if (timoSay == 1) {
                $(".timo-words").text("谢大爷的奖赏！");
                timoSay = 2;
                console.log(timoSay);
            } else if (timoSay == 2) {
                $(".timo-words").text("谢谢大爷的第二次奖赏！");
                timoSay = 3;
            } else if (timoSay == 3) {
                $(".timo-words").text("感谢感谢，以后小的我就跟着您混了！");
                timoSay = 4;
            } else if (timoSay == 4) {
                $(".timo-words").text("第四次奖励，为了感谢，给您一个礼包！");
            }
        }
        //加载页面后
        $(function() {
            countDown();
        });
