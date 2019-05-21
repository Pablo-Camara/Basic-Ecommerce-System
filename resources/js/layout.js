var Layout = function () {
    'use strict';
    
    // handle on page scroll
    var handleHeaderOnScroll = function() {
        if ($(window).scrollTop() > 60) {
            $('body').addClass('page-on-scroll');
        } else {
            $('body').removeClass('page-on-scroll');
        }
    };

    // handle carousel
    var handleCarousel = function() {
        var $item = $('.carousel .item'); 
        var $wHeight = $(window).height();
        $item.eq(0).addClass('active');
        $item.height($wHeight); 
        $item.addClass('full-screen');

        $('.carousel img').each(function() {
            var $src = $(this).attr('src');
            var $color = $(this).attr('data-color');
            $(this).parent().css({
                'background-image' : 'url(' + $src + ')',
                'background-color' : $color
            });
            $(this).remove();
        });

        $(window).on('resize', function (){
            $wHeight = $(window).height();
            $item.height($wHeight);
        });
    };

    // handle group element heights
    var handleHeight = function() {
       $('[data-auto-height]').each(function() {
            var parent = $(this);
            var items = $('[data-height]', parent);
            var height = 0;
            var mode = parent.attr('data-mode');
            var offset = parseInt(parent.attr('data-offset') ? parent.attr('data-offset') : 0);

            items.each(function() {
                if ($(this).attr('data-height') == "height") {
                    $(this).css('height', '');
                } else {
                    $(this).css('min-height', '');
                }

                var height_ = (mode == 'base-height' ? $(this).outerHeight() : $(this).outerHeight(true));
                if (height_ > height) {
                    height = height_;
                }
            });

            height = height + offset;

            items.each(function() {
                if ($(this).attr('data-height') == "height") {
                    $(this).css('height', height);
                } else {
                    $(this).css('min-height', height);
                }
            });

            if(parent.attr('data-related')) {
                $(parent.attr('data-related')).css('height', parent.height());
            }
       });
    };

    return {
        init: function () {
            handleHeaderOnScroll(); // initial setup for fixed header
            handleCarousel(); // initial setup for carousel
            handleHeight(); // initial setup for group element height



            // handle minimized header on page scroll
            $(window).scroll(function() {
                handleHeaderOnScroll();
            });
        }
    };
}();

$(document).ready(function() {
    Layout.init();


    $(".navbar-nav li.nav-item").on('click',function() {
        var visible_nav = $(this).find('.subnavbar');
        if(visible_nav.is(':visible')){
            visible_nav.hide();
            visible_nav.removeClass('hover');
        }
        else {
            visible_nav.show(100);
            visible_nav.addClass('hover');
        }
    });

    $(".navbar-nav li.nav-item").on('mouseenter',function() {
        var x = window.matchMedia("(min-width: 768px)");

        if(x.matches){
            var visible_nav = $(this).find('.subnavbar:not(.hover)');

            if(visible_nav.length > 0){
                $(this).trigger('click');
            }
        }

    });

    $(".navbar-nav li.nav-item").on('mouseleave',function() {
        var x = window.matchMedia("(min-width: 768px)");

        if(x.matches){
            var visible_nav = $(this).find('.subnavbar');

            if(visible_nav.length > 0){
                $(this).trigger('click');
            }
        }

    });

    $('.cookies_privacy').find('.ok').on('click',function(){
        document.cookie = "enableCookies=true; path=/";
        $(this).closest('.cookies_privacy').remove();
    });


    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }


    if(getCookie('enableCookies') === ""){
        $('.cookies_privacy').show();
    }
   /* var left = 0;

    $('.item-special').css('background-position-y',$('nav.navbar').height());
    setInterval(
        function(){
            $('.item-special').css('background-position-x',left);

           // if(left + $('.item-special').width() < $(document).width()){
                left += 4;



        },50);*/

});