jQuery(document).ready(function ($) {
    "use strict"
    var pageUrl = window.location.href.split(/[?#]/)[0];
    if ($('ul.nav.navbar-nav').length) {
        $('ul.nav.navbar-nav li').each(function () {
            //TODO dropdown
            $(this).find('a').each(function () {
                if ($(this).attr('href') == pageUrl) {
                    $(this).addClass('active');
                }
            });
        })
    }
    if($('.sidebar .widget').length){
        $('.sidebar .widget a').each(function () {
            if($(this).attr('href')==pageUrl){
                $(this).addClass('active');
            }
        })
    }
    if ($(window).width() > 768) {
        if ($(".evaluation-single").length) {
            var menuTop = $(".evaluation-sidebar-container").offset().top;
            var menuLeft = $(".evaluation-sidebar-container").offset().left;
            var menuWidth = $(".evaluation-sidebar-container").width();
            var footerTop = $(".evaluation-sidebar-container").offset().top;
            var menuHeight = $(".evaluation-sidebar-container").height();
            var evalDocHeight = $(".evaluation-start").height();
            $(window).scroll(function () {
                if ($(window).height() < $(window).width()) {
                    if ($(window).scrollTop() >= (menuTop - 80)) {
                        var x1 = menuHeight - 160;
                        $(".evaluation-sidebar-container").addClass("fixed");
                        $(".evaluation-sidebar-container").css({
                            width: menuWidth + "px"
                        });
                        var aHeight = 0;
                        if ($(window).scrollTop() > (evalDocHeight + $(".evaluation-sidebar-container").height())) {
                            $(".evaluation-sidebar-container").removeClass("fixed");
                            $(".evaluation-sidebar-container").parent().css({
                                height: $(".evaluation-single").height() + 'px'
                            });
                            $(".evaluation-sidebar-container").css({
                                position: 'absolute',
                                bottom: '0px'
                            });
                        } else {
                            $(".evaluation-sidebar-container").addClass("fixed");
                        }
                    } else {
                        $(".evaluation-sidebar-container").removeClass("fixed");
                        $(".evaluation-sidebar-container").css({
                            position: 'relative',
                            bottom: 'unset',
                        });
                    }

                }
            });
        }
    }

    if ($('.cutter').length) {
        $('.cutter').each(function () {
            $(this).line($(this).attr('data-line') ? $(this).attr('data-line') : 2, "...")
        })
    }
    if ($('[data-toggle="tooltip"]').length) {
        $('[data-toggle="tooltip"]').tooltip()
    }

    // ------- Navigation ------- //
    if ($('ul.nav li.dropdown').length) {
        $('ul.nav li.dropdown').on('hover', function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
    }
    // ------- Navigation End ------- //


    // ------- Home Slider Start ------- //
    if ($('#home-slider').length) {
        $('#home-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            items: 1,
            autoplay: false,

        })
    }
    // ------- Home Slider End ------- //
    (function ($) {
        $.scrollIt({
            upKey: 38,                // key code to navigate to the next section
            downKey: 40,              // key code to navigate to the previous section
            easing: 'swing',          // the easing function for animation
            scrollTime: 800,          // how long (in ms) the animation takes
            activeClass: 'active',    // class given to the active nav element
            onPageChange: null,       // function(pageIndex) that is called when page is changed
            topOffset: -70            // offste (in px) for fixed top navigation
        });

    })(jQuery);

    // ------- Home Slider Start ------- //
    if ($('#highlight-slider').length) {
        $('#highlight-slider').owlCarousel({
            loop: true,
            margin: 5,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: false,
                },
                600: {
                    items: 2,
                    nav: true,
                    loop: false,
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false
                }
            }
        })
    }
    // ------- Home Slider End ------- //


    // ------- Home Slider Start ------- //
    if ($('#highlight-slider-2').length) {
        $('#highlight-slider-2').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: false,
                },
                700: {
                    items: 2,
                    nav: true,
                    loop: false,
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
                }
            }
        })
    }
    // ------- Home Slider End ------- //


    // ------- Pretty Photo Start ------- //
    if ($('.gallery').length) {
        $("area[data-rel^='prettyPhoto']").prettyPhoto();
        $(".gallery:first a[data-rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'normal',
            theme: 'light_square',
            slideshow: 3000,
            autoplay_slideshow: false
        });

    }
    // ------- Pretty Photo End ------- // 


    // ------- Event Slider Start ------- //
    if ($('.recent-event-slider').length) {
        $('.recent-event-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
        });
        $('.recent-event-slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.recent-event-slider',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
        });
    }
    // ------- Event Slider End ------- //	


    // ------- Home Slider Start ------- //
    if ($('#h3team-slider').length) {
        $('#h3team-slider').owlCarousel({
            loop: true,
            margin: 30,

            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
                1000: {
                    items: 2,
                    nav: true,
                    loop: false
                }
            }
        })
    }
    // ------- Home Slider End ------- //


    // ------- Close Btn ------- //
    if ($('#closebtn').length) {
        $('#closebtn').on('click', function () {
            $('#closetopbar').slideUp().empty();
        });

        $(function () {
            $('#closetopbar').slideDown();
        });
    }
    // ------- Close Btn ------- //


    // ------- Events Counter ------- //
    if ($('#defaultCountdown').length) {
        var dateContainer = $('#defaultCountdown');
        var austDay = new Date();
        austDay = new Date(dateContainer.attr('data-date-year'), dateContainer.attr('data-date-month'), dateContainer.attr('data-date-day'), dateContainer.attr('data-date-hour'), dateContainer.attr('data-date-minute'));
        $('#defaultCountdown').countdown({
            until: austDay,

        });
        $('#year').text(austDay.getFullYear());
    }


    // ------- Filter Gallery Start ------- //
    if ($('.filter-gallery').length) {
        if ($('.filter-gallery .isotope').length) {
            var $container = $('.filter-gallery .isotope');
            $container.isotope({
                itemSelector: '.item',
                transitionDuration: '0.6s',
                masonry: {
                    columnWidth: $container.width() / 12
                },
                layoutMode: 'masonry'
            });
            $(window).on("resize", function () {
                $container.isotope({
                    masonry: {
                        columnWidth: $container.width() / 12
                    }
                });
            });
        }
        if ($('.filter-gallery #filters').length) {
            $('.filter-gallery #filters').on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $container.isotope({
                    filter: filterValue
                });
            });
            // change is-checked class on buttons
            $('.filter-gallery .button-group').each(function (i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'button', function () {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });

        }
    }

    // ------- Classic Gallery ------- //

    if ($('.classic-gallery').length) {
        if ($('.classic-gallery .isotope').length) {
            var $container = $('.classic-gallery .isotope');
            $container.isotope({
                itemSelector: '.item',
                transitionDuration: '0.6s',
                masonry: {
                    columnWidth: $container.width() / 12
                },
                layoutMode: 'masonry'
            });
            $(window).on("resize", function () {
                $container.isotope({
                    masonry: {
                        columnWidth: $container.width() / 12
                    }
                });
            });
        }
    }


    // ------- Filter Gallery End ------- //


    // ------- Testimonials Page Slider Start ------- //
    if ($('#h3testimonials').length) {
        $('#h3testimonials').owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            autoHeight: true,
            autoplay: true,
            center: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 3,
                    loop: true,
                }
            }
        })
    }

    // ------- Testimonials 2nd Option ------- //

    if ($('#testimonials').length) {
        $('#testimonials').owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            autoHeight: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 4,
                    loop: true,
                }
            }
        })
    }
    // ------- Testimonials Page Slider End ------- //


    // ------- Counter Start ------- //
    if ($('.countdown').length) {
        var austDay = new Date();
        austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
        $('.countdown').countdown({
            until: austDay
        });
        $('#year').text(austDay.getFullYear());
    }
    // ------- Counter End ------- // 

    // ------- Search Overlay Start ------- //
    if ($('a[href="#search"]').length) {
        $(function () {
            $('a[href="#search"]').on('click', function (event) {
                event.preventDefault();
                $('#search').addClass('open');
                $('#search > form > input[type="search"]').focus();
            });
            $('#search, #search button.close').on('click keyup', function (event) {
                if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                    $(this).removeClass('open');
                }
            });
            $('form').submit(function (event) {
                event.preventDefault();
                return false;
            })
        });
    }

    // ------- Search Overlay End ------- //

    if ($('#dismiss, .overlay').length) {
        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    }
	if ($('#my_newsticker').length) {
		$("#my_newsticker").newsticker({
			effect: "slide-h",
			autoplay: true,
			timer: 5000,
		});
	}
    $('img').Lazy();
    $('.lazy').lazy();

    if ($('select.my-choices').length) {
        const choices = new Choices('select.my-choices',
            {
                searchEnabled: false,
                itemSelectText: '',
            });
    }
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'slide'
    });


}); //End


// ------- Site Sticky Footer Start ------- //
if ($('#site-footer').length) {
    if ($('#site-footer').length) {
        siteFooter();
        $(window).on('resize', function () {
            siteFooter();
        });

        function siteFooter() {
            var siteContent = $('#site-footer');
            var siteContentHeight = siteContent.height();
            var siteContentWidth = siteContent.width();

            var siteFooter = $('#call-2-action');
            var siteFooterHeight = siteFooter.height();
            var siteFooterWidth = siteFooter.width();

            siteContent.css({
                "margin-bottom": siteFooterHeight + 50
            });
        };
    }
}
// ------- Site Sticky Footer End ------- //
