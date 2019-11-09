$(document).ready(function () {
    $('.btn-search').click(function () {
        $(".search-block").hasClass('show') ? $(".search-block").removeClass('show') : $(".search-block").addClass('show');
    });
    $('#btn-main-menu').click(function () {
        $("body > header").hasClass('open') ? $("body > header, #btn-main-menu").removeClass('open') : $("body > header, #btn-main-menu").addClass('open');
    });
    $('body > header > ul > li span').click(function () {
        if ($(this).parent().hasClass('open'))
            $(this).parent().removeClass('open')
        else {
            $('body > header > ul > li').removeClass('open');
            $(this).parent().addClass('open');
        }
    });
    if ($(window).width() > 768) {
        if ($(".nav-block").length) {
            var menuTop = $(".nav-block").offset().top;
            var menuLeft = $(".nav-block").offset().left;
            var footerTop = $(".footer").offset().top;
            var footerLeft = $(".footer").offset().left;
            var menuWidth = $(".nav-block").width();
            var menuHeight = $(".nav-block").height();
            $("div.nav-block").css('max-width', menuWidth + 'px');
            $("div.nav-block").css('width', menuWidth + 'px');
            $(window).scroll(function () {
                if ($(window).height() < $(window).width()) {
                    if ($(window).scrollTop() >= (menuTop - 100)) {
                        var x1 = menuHeight - 160;
                        $(".nav-block").addClass("fixed");
                        if (($(".nav-block").height() + 80 + 16) >= ($("body > .footer").offset().top - $(window).scrollTop() - 60)) {
                            $(".nav-block").removeClass("fixed");
                            $(".nav-block").addClass("absolute");
                        }
                        else {
                            $(".nav-block").removeClass("absolute");
                            $(".nav-block").addClass("fixed");
                        }
                    }
                    else
                        $(".nav-block").removeClass("fixed");
                }
            });
        }
    }
});
