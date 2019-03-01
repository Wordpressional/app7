(function($) {
    "use strict";
    
   
    
    
    /*----------------------------------------------------*/
    /*  Main Slider js
    /*----------------------------------------------------*/
    function main_slider(){
        if ( $('#main_slider').length ){
            $("#main_slider").revolution({
                sliderType:"standard",
                sliderLayout:"auto",
                delay:5000,
                disableProgressBar:"on",
                navigation: {
                    onHoverStop: 'off',
                    touch:{
                        touchenabled:"on"
                    },
                    arrows: {
                        style:"zeus",
                        enable:false,
                        hide_onmobile:true,
                        hide_under:820,
                        hide_onleave:true,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 5,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 5,
                            v_offset: 0
                        }
                    },
                },
                responsiveLevels:[4096,1320,1199,992,767,480],
                gridwidth:[1170,1170,960,720,700,300],
                gridheight:[900,900,900,800,500,500],
                lazyType:"smart",
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    main_slider();
    
    
    /*----------------------------------------------------*/
    /*  Skill Slider
    /*----------------------------------------------------*/
    function progressBarConfig () {
      var progressBar = $('.progress');
      if(progressBar.length) {
        progressBar.each(function () {
          var Self = $(this);
          Self.appear(function () {
            var progressValue = Self.data('value');

            Self.find('.progress-bar').animate({
              width:progressValue+'%'           
            }, 1000);

            Self.find('.number').countTo({
              from: 0,
                to: progressValue,
                speed: 1000
            });
          });
        })
      }
    }
    progressBarConfig ();
    if ( $('.counter').length ){
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    }
    if($(window).width()>992){
        $('.service_area').parallax("50%", 0.4);
        $('.project_area').parallax("50%", 0.4);
    }
    
    
    
    /*----------------------------------------------------*/
    /*  Explor Room Slider
    /*----------------------------------------------------*/
    function testimoninals_carousel(){
        if ( $('.testimonials_slider').length ){
            $('.testimonials_slider').owlCarousel({
                loop:true,
                margin: 0,
                items: 1,
                nav:true,
                autoplay: true,
                smartSpeed: 1500,
                dots:false,
                navContainer: '.testimonials_slider',
                navText: ['<i class="ti-angle-left" aria-hidden="true"></i>','<i class="ti-angle-right" aria-hidden="true"></i>'],
            })
        }
    }
    testimoninals_carousel();
    
    /*----------------------------------------------------*/
    /* Offcanvas Menu js
    /*----------------------------------------------------*/
    $('.icon_search, .ti-close').on('click',function(){
        if( $(".search_area").hasClass('open') ){
            $(".search_area").removeClass('open')
        }
        else{
            $(".search_area").addClass('open')
        }
        return false
    });
 
    /*----------------------------------------------------*/
    /*  Google map js
    /*----------------------------------------------------*/
    
    if ( $('#mapBox').length ){
        var $lat = $('#mapBox').data('lat');
        var $lon = $('#mapBox').data('lon');
        var $zoom = $('#mapBox').data('zoom');
        var $marker = $('#mapBox').data('marker');
        var $info = $('#mapBox').data('info');
        var $markerLat = $('#mapBox').data('mlat');
        var $markerLon = $('#mapBox').data('mlon');
        var map = new GMaps({
        el: '#mapBox',
        lat: $lat,
        lng: $lon,
        scrollwheel: false,
        scaleControl: true,
        streetViewControl: false,
        panControl: true,
        disableDoubleClickZoom: true,
        mapTypeControl: false,
        zoom: $zoom,
            styles: [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e9e9e9"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#dedede"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#333333"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                }
            ]
        });

        map.addMarker({
            lat: $markerLat, 
            lng: $markerLon,
            icon: $marker,    
            infoWindow: {
              content: $info
            }
        })
    }
    
    
})(jQuery)

jQuery(function($) {

   

    //#main-slider
    var slideHeight = $(window).height();
    $('#moxyhome-slider .carousel-item').css('height',slideHeight);

    $(window).resize(function(){
        'use strict';
        $('#moxyhome-slider .carousel-item').css('height',slideHeight);
    });
    
    //Scroll Menu
    $(window).on('scroll', function(){
        if( $(window).scrollTop()>slideHeight ){
            $('.moxytheme.main-nav').addClass('navbar-fixed-top');
        } else {
            $('.moxytheme.main-nav').removeClass('navbar-fixed-top');
        }
    });
    
   

    // Navigation Scroll
    $(window).scroll(function(event) {
        Scroll();
    });

    $('.moxytheme .navbar-collapse ul li a').on('click', function() {  
        $('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
        $('.navbar-collapse.collapse.in').removeClass('in');
        return false;
    });

    // User define function
    function Scroll() {
        var contentTop      =   [];
        var contentBottom   =   [];
        var winTop      =   $(window).scrollTop();
        var rangeTop    =   200;
        var rangeBottom =   500;
        $('.moxytheme .navbar-collapse').find('.scroll a').each(function(){
            contentTop.push( $( $(this).attr('href') ).offset().top);
            contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
        })
        $.each( contentTop, function(i){
            if ( winTop > contentTop[i] - rangeTop ){
                $('.moxytheme .navbar-collapse li.scroll')
                .removeClass('active')
                .eq(i).addClass('active');          
            }
        })
    };

   

    $('#tohash').on('click', function(){
        $('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
        return false;
    });
    
    if($(window).width() > 767){
        //Initiat WOW JS
        new WOW().init();
    }
    
    //smoothScroll
    smoothScroll.init();
    
    // Progress Bar
    $('#moxyabout-us').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $.each($('div.progress-bar'),function(){
                $(this).css('width', $(this).attr('aria-valuetransitiongoal')+'%');
            });
            $(this).unbind('inview');
        }
    });

    //Countdown
    $('#moxyfeatures').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $(this).find('.timer').each(function () {
                var $this = $(this);
                $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
            $(this).unbind('inview');
        }
    });

    // Portfolio Single View
    $('#moxyportfolio').on('click','.folio-read-more',function(event){
        event.preventDefault();
        var link = $(this).data('single_url');
        var full_url = '#moxyportfolio-single-wrap',
        parts = full_url.split("#"),
        trgt = parts[1],
        target_top = $("#"+trgt).offset().top;

        $('html, body').animate({scrollTop:target_top}, 600);
        $('#moxyportfolio-single').slideUp(500, function(){
            $(this).load(link,function(){
                $(this).slideDown(500);
            });
        });
    });

    // Close Portfolio Single View
    $('#moxyportfolio-single-wrap').on('click', '.close-folio-item',function(event) {
        event.preventDefault();
        var full_url = '#moxyportfolio',
        parts = full_url.split("#"),
        trgt = parts[1],
        target_offset = $("#"+trgt).offset(),
        target_top = target_offset.top;
        $('html, body').animate({scrollTop:target_top}, 600);
        $("#moxyportfolio-single").slideUp(500);
    });

    // Contact form
    var form = $('#main-contact-form');
    form.submit(function(event){
        event.preventDefault();
        var form_status = $('<div class="form_status"></div>');
        $.ajax({
            url: $(this).attr('action'),
            beforeSend: function(){
                form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
            }
        }).done(function(data){
            form_status.html('<p class="text-success">Thank you for contact us. As early as possible  we will contact you</p>').delay(3000).fadeOut();
        });
    });

   
});

$(document).ready(function() {
    "use strict";

    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen = window_height - header_height;

    $(".mpoltheme .fullscreen").css("height", window_height)
    $(".mpoltheme .fitscreen").css("height", fitscreen);

    //------- Niceselect  js --------//  

   

    //------- Lightbox  js --------//  

    $('mpoltheme .img-gal').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $('mpoltheme .play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    //------- Counter  js --------//  

    $('mpoltheme .counter').counterUp({
        delay: 10,
        time: 1000
    });

    //------- Accordion  js --------//  

    jQuery(document).ready(function($) {

        if (document.getElementById("accordion")) {

            var accordion_1 = new Accordion(document.getElementById("accordion"), {
                collapsible: false,
                slideDuration: 500
            });
        }
    });

    //------- Superfist nav menu  js --------//  

    $('.mpoltheme .nav-menu').superfish({
        animation: {
            opacity: 'show'
        },
        speed: 400
    });

    //------- Mobile Nav  js --------//  

    if ($('.mpoltheme #nav-menu-container').length) {
        var $mobile_nav = $('.mpoltheme #nav-menu-container').clone().prop({
            id: 'muk-mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" id="muk-mobile-nav-toggle"><i class="lnr lnr-menu"></i></button>');
        $('body').append('<div id="muk-mobile-body-overly"></div>');
        $('#muk-mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function(e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
        });

        $(document).on('click', '#muk-mobile-nav-toggle', function(e) {
            $('body').toggleClass('mobile-nav-active');
            $('#muk-mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
            $('#muk-mobile-body-overly').toggle();
        });

        $(document).click(function(e) {
            var container = $("#muk-mobile-nav, #muk-mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#muk-mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
                    $('#muk-mobile-body-overly').fadeOut();
                }
            }
        });
    } else if ($("#muk-mobile-nav, #muk-mobile-nav-toggle").length) {
        $("#muk-mobile-nav, #muk-mobile-nav-toggle").hide();
    }

    //------- Smooth Scroll  js --------//  

    $('.nav-menu a, #muk-mobile-nav a, .scrollto').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;

                if ($('#mpolheader').length) {
                    top_space = $('#mpolheader').outerHeight();

                    if (!$('#mpolheader').hasClass('header-fixed')) {
                        top_space = top_space;
                    }
                }

                $('html, body').animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }

                if ($('body').hasClass('muk-mobile-nav-active')) {
                    $('body').removeClass('muk-mobile-nav-active');
                    $('#muk-mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
                    $('#muk-mobile-body-overly').fadeOut();
                }
                return false;
            }
        }
    });

    $(document).ready(function() {

        $('html, body').hide();

        if (window.location.hash) {

            setTimeout(function() {

                $('html, body').scrollTop(0).show();

                $('html, body').animate({

                    scrollTop: $(window.location.hash).offset().top - 108

                }, 1000)

            }, 0);

        } else {

            $('html, body').show();

        }

    });

    //------- Header Scroll Class  js --------//  

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#mpolheader').addClass('header-scrolled');
        } else {
            $('#mpolheader').removeClass('header-scrolled');
        }
    });

    //------- Owl Carusel  js --------//  
 if ( $('.active-testimonial').length ){
    $('.active-testimonial').owlCarousel({
        items: 2,
        loop: true,
        margin: 30,
        dots: true,
        autoplayHoverPause: true,
        autoplay: true,
        nav: true,
        navText: ["<span class='lnr lnr-arrow-up'></span>", "<span class='lnr lnr-arrow-down'></span>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1,
            },
            768: {
                items: 2,
            }
        }
    });


    $('.active-brand-carusel').owlCarousel({
        items: 5,
        loop: true,
        autoplayHoverPause: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3,
            },
            991: {
                items: 4,
            },
            1024: {
                items: 5,
            }
        }
    });
}
    //------- Timer Countdown  js --------//  

    if (document.getElementById("count")) {

        var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="count"
            document.getElementById("count").innerHTML =

                "<div class='col'><span>" + days + "</span><br> Days " + "</div>" + "<div class='col'><span>" + hours + "</span><br> Hours " + "</div>" + "<div class='col'><span>" + minutes + "</span><br> Minutes " + "</div>" + "<div class='col'><span>" + seconds + "</span><br> Seconds </div>";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("count").innerHTML = "EXPIRED";
            }
        }, 1000);

    }

    

   

});

