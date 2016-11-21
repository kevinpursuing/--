        //获取屏幕宽度
        var screenWidth = $(window).width();
        //产品界面宽度
        var w_width;
    
        function screenJudge(screenW) {
            if (screenWidth > 500) {
                $(".wraper").css("width", "500px");
                w_width = 500;
            } else {
                $(".wraper").css("width", "100%");
                w_width = screenW;
            }
        }
        $(window).on("orientationchange", function() {
            screenWidth = $(window).width();
            screenJudge(screenWidth);
            if (window.orientation == 0) // Portrait
            {} else // Landscape
            {
                alert("为保证您的浏览体验，请在竖屏下浏览！");
            }
        });
        $(function(){
          screenJudge(screenWidth);
        })
