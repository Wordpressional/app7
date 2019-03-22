(function($){
	"use strict";

	$(function(){
		$('#footer .widget_nav_menu').addClass('mad_nav_list style2');

		$('#main_navigation .current-menu-item').addClass('current');
		
		$('#mad_button').addClass('mad_button');
		
		$('.prev.page-numbers').addClass('icon-left-open-1');
		$('.next.page-numbers').addClass('icon-right-open-1');
		
		$('.comments-list .children .mad_post_comment').addClass('comment_level_2');
		
		$("#main_navigation ul.sub-menu").wrap("<div class='sub_menu_wrap clearfix'></div>");
		
		$('#main_navigation ul.sub-menu .sub_menu_wrap').addClass('sub_menu_inner type_2');
		
		$('#wp-calendar a').parent().addClass('link');
		
		
		
		// like button
		 $('[data-post-like]').on('click', function(e) {
                e.preventDefault();
                var _this = $(this);
                var post_id = _this.data('post_id');
                var inside = _this.data('inside');
                if ( 'undefined' == typeof post_id || 'undefined' == sn_like_post ) return;
                $.ajax({
                    type: 'post',
                    url: sn_like_post.url,
                    data: { action:'sn_like_post', nonce: sn_like_post.nonce, sn_post_like:'', post_id:post_id, inside: inside },
                    beforeSend: function() {
                       _this.append('<i class="icon-dot-3 absolute color_grey_light_2 tr_all d_block"></i>');
                    },
                    success: function( response ) {
                        console.log( response );
                        _this.html(response);
                    }
                });
            });
		
		
		// Elements position

		function itemPosition(){

		  if ($(window).width() >= '992')
		  {
		    $('#mad_item_first').detach().insertAfter('#mad_item_second');
		    $('#mad_item_first2').detach().insertAfter('#mad_item_second2');
		  } 
		  else 
		  {
		    $('#mad_item_second').detach().insertAfter('#mad_item_first');
		    $('#mad_item_second2').detach().insertAfter('#mad_item_first2');
		  }
		}
		$(window).load(itemPosition); 
		$(window).resize(itemPosition);

		// ie9 placeholder

		if($('html').hasClass('ie9')) {
			$('input[placeholder]').each(function(){
				$(this).val($(this).attr('placeholder'));
				var v = $(this).val();
				$(this).on('focus',function(){
					if($(this).val() === v){
						$(this).val("");
					}
				}).on("blur",function(){
					if($(this).val() == ""){
						$(this).val(v);
					}
				});
			});
			
		}

		// popup

		$('.share_popup').on('click', function() {

	        $('#share_popup_holder').fadeIn("slow");
	        
	    });

	    $(document).mouseup(function (e) {

		    var container = $("#share_popup_holder");
		    if (container.has(e.target).length === 0){
		        container.fadeOut("slow");
		    }

		});

		// Gallery carousel

	  	$.mad_global.mad_init_carousel();

		// tabs

		var tabs = $('.tabs-section');
		if(tabs.length){
			tabs.tabs({
				beforeActivate: function(event, ui) {
			        var hash = ui.newTab.children("li a").attr("href");
			   	},
				hide : {
					effect : "fadeOut",
					duration : 450
				},
				show : {
					effect : "fadeIn",
					duration : 450
				},
				updateHash : false
			});
		}

		if($('ul.smooth_tabs').length){
			$('ul.smooth_tabs li:first').addClass('ui-tabs-active');

			$('ul.smooth_tabs li a').click(function(){
			   $('ul.smooth_tabs').find('li').removeClass('ui-tabs-active');
			   $(this).parent('li').addClass("ui-tabs-active");
			  
			   var x = $(this).attr('href');
			   $(".smooth_item").removeClass('current_catalog_item');
			   $(".tabs_content ").children('h3').removeClass('current_catalog_item');
			   $(x).addClass('current_catalog_item');
			});
		}



	    // open dropdown

		$('#sort_button').css3Animate($('#sort_button').next('.sort_list'));

		// Loader
		if($('.mad__queryloader').length){
			$("body").queryLoader2({
				backgroundColor: '#fff',
				barColor : beautyconstruction_global.primary_color,
				barHeight: 4,
				deepSearch:true,
				minimumTime:1000,
				onComplete: function(){
					$(".loader").fadeOut('200');
				}
			});
		}
		
      	// Price Scale

		var slider;
		if($('#price').length){
			slider = $('#price').slider({ 
			 	orientation: "horizontal",
				range: true,
				values: [ 0, 250 ],
				min: 0,
				max: 250,
				slide : function(event ,ui){
					$(this).next().find('.first_limit').val('$' + ui.values[0]);
					$(this).next().find('.last_limit').val('$' + ui.values[1]);
				}
			});
		}

		// Appointment

		if($('#helpdeskform').length){
			
			$('.app_next').on("click", function() {
		        $('.app_selected').removeClass('app_selected').hide().next().show().addClass('app_selected');
		        $('#progressbar li.app_active').next().addClass('app_active');

		        if ($('#progress')) {};

		    });

		    $('.app_prev').on("click", function() {
		        $('.app_selected').removeClass('app_selected').hide().prev().show().addClass('app_selected');
		        $('#progressbar li.app_active').removeClass('app_active').prev().addClass('app_active');
		    });

		}

    
		// Sticky menu
		if($('body').hasClass('sticky_menu')) {
			 $('body').Temp({
				 sticky: true
			 });
		}
		/* ---------------------------------------------------- */
        /*	SmoothScroll										*/
        /* ---------------------------------------------------- */

		if(beautyconstruction_global.smooth_scroll ==  1) {
		
			try {
				$.browserSelector();
				var $html = $('html');
				if ( $html.hasClass('chrome') || $html.hasClass('ie11') || $html.hasClass('ie10') ) {
					$.smoothScroll();
				}
			} catch(err) {}

		}
		
		// fancybox

		if ($('a.gallery').length) {
			$('a.gallery').fancybox();
		}

		if ($('a.video').length) {
			$("a.video").on("click", function(){
		        $.fancybox({
		          href: this.href,
		          type: $(this).data("type")
		        }); // fancybox
		        return false   
		    }); // on
		}

	    // custom select

		if ($('.custom_select').length) {
			$('.custom_select').mad_custom_select();
		}

		// accordion & toggle

		var aItem = $('.accordion:not(.toggle) .accordion_item'),
			link = aItem.find('.a_title'),
			$label = aItem.find('label'),
			aToggleItem = $('.accordion.toggle .accordion_item'),
			tLink = aToggleItem.find('.a_title');

			aItem.add(aToggleItem).children('.a_title').not('.active').next().hide();

		function triggerAccordeon($item) {
			$item
				.addClass('active')
				.next().stop().slideDown()
				.parent().siblings()
				.children('.a_title')
				.removeClass('active')
				.next().stop().slideUp();
		}


		if ($label.length) {
			$label.on('click',function(){
				triggerAccordeon($(this).closest('.a_title'))
			});
		} else {
			link.on('click',function(){
				triggerAccordeon($(this))
			});
		}
			

		tLink.on('click',function(){
			$(this).toggleClass('active')
					.next().stop().slideToggle();

		})

		
		
		
		
		
		
		
		// Isotope

		$( window ).load(function() {

		  	var $container = $('.isotope');
		    // filter buttons
		     $('#filters button').on("click", function(){
		    	var $this = $(this);
		        // don't proceed if already selected
		        if ( !$this.hasClass('is-checked') ) {
		          $this.parents('#options').find('.is-checked').removeClass('is-checked');
		          $this.addClass('is-checked');
		        }
				var selector = $this.attr('data-filter');
				$container.isotope({  itemSelector: '.item', filter: selector });
				return false;
		    }); 
		     
		});

		$( window ).load(function() {
			$.mad_core.isotope();
		});

		

		

		// appear animation

	    function animate(){
	    	
	     $("[data-appear-animation]").each(function() {

	         var self = $(this);

	         self.addClass("appear-animation");

	         if($(window).width() > 800) {
	          self.appear(function() {

	           var delay = (self.attr("data-appear-animation-delay") ? self.attr("data-appear-animation-delay") : 1);

	           if(delay > 1) self.css("animation-delay", delay + "ms");
	           self.addClass(self.attr("data-appear-animation"));

	           setTimeout(function() {
	            self.addClass("appear-animation-visible");
	           }, delay);

	          }, {accX: 0, accY: -150});
	         } else {
	          self.addClass("appear-animation-visible");
	         }
	        });

	    }

	    animate();

	    $(window).on('resize',animate);

		

		// social widgets

		$('.sw_button').on('click',function(){
			$(this).parent().toggleClass('opened').siblings().removeClass('opened')
		});

		// countdown

		if($('#countdown').length){
			//var newYear = new Date(); 
			//newYear = new Date(newYear.getFullYear() + 2, -7, 1); 
			
			var newYear = new Date(jQuery('.countdown').html());
			var server_time = function(){
			  return new Date(jQuery('.countdown').data('time-now'));
			}
			
			if(jQuery('.countdown').hasClass('ult-usrtz')){
				$('#countdown').countdown({
					until: newYear,
					layout:'<div class="row"><div class="col-sm-3 col-xs-6">'+
					'<dl class="count_item"><dt class="main_title">{d<}{dn}</dt><dd><h5>{dl}</h5></dd></dl></div> {d>}'+ 
						'<div class="col-sm-3 col-xs-6">'+
					'<dl class="count_item"><dt class="main_title">{hn}</dt><dd><h5>{hl}</h5></dd></dl></div>'+
					' <div class="col-sm-3 col-xs-6"><dl class="count_item"><dt class="main_title">{mn}</dt><dd><h5>{ml}</h5></dd></dl></div>'+
					' <div class="col-sm-3 col-xs-6"><dl class="count_item"><dt class="main_title">{sn}</dt><dd><h5>{sl}</h5></dd></dl></div></div>'
				}); 
			
			}else{
				
			$('#countdown').countdown({
					until: newYear,
					layout:'<div class="row"><div class="col-sm-3 col-xs-6">'+
					'<dl class="count_item"><dt class="main_title">{d<}{dn}</dt><dd><h5>{dl}</h5></dd></dl></div> {d>}'+ 
						'<div class="col-sm-3 col-xs-6">'+
					'<dl class="count_item"><dt class="main_title">{hn}</dt><dd><h5>{hl}</h5></dd></dl></div>'+
					' <div class="col-sm-3 col-xs-6"><dl class="count_item"><dt class="main_title">{mn}</dt><dd><h5>{ml}</h5></dd></dl></div>'+
					' <div class="col-sm-3 col-xs-6"><dl class="count_item"><dt class="main_title">{sn}</dt><dd><h5>{sl}</h5></dd></dl></div></div>',
					serverSync:server_time
				}); 	
				
				
			}
			
		}
		

    
		/* ---------------------------------------------------- */
		/*	Responsive menu										*/
		/* ---------------------------------------------------- */

		$.mad_core.run();
    
	});

})(jQuery);