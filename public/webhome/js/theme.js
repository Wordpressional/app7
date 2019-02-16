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

    $('.navbar-collapse ul li a').on('click', function() {  
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
        $('.navbar-collapse').find('.scroll a').each(function(){
            contentTop.push( $( $(this).attr('href') ).offset().top);
            contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
        })
        $.each( contentTop, function(i){
            if ( winTop > contentTop[i] - rangeTop ){
                $('.navbar-collapse li.scroll')
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

