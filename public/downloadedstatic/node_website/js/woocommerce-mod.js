(function ($) {

	
	


	/*	LOAD READY
	/* --------------------------------------------- */

	$(window).load(function () {

	});

	/*	DOM READY
	/* --------------------------------------------- */

	$(function () {
		
		$('.price_slider_amount .button').addClass('mad_button');

		// Nav_List
		
		 var cc = $('list_grid');
	      if (cc == 'g') {
	        $('#product_list').addClass('v_list');
	        $('#product_list').removeClass('v_grid');
	        $('.Clist').addClass('active');
	        $('.Cgrid').removeClass('active');
	      } else {
	        $('#product_list').removeClass('v_list');
	        $('#product_list').addClass('v_grid');
	        $('.Cgrid').addClass('active');
	        $('.Clist').removeClass('active');    
	      }

	      $('.cgrid').on("click", function() {
	        console.log(1);
	        $(this).addClass('active');
	        $('.clist').removeClass('active');
	        $('#product_list').fadeOut(300, function() {
	          $(this).addClass('v_grid').removeClass('v_list').fadeIn(300);
	        });
	        // $.cookie('list_grid', '1' , { expires: 7, path: vmSiteurl });
	        return false;
	      });
	      
	     $('.clist').on("click", function() {
	        console.log(2);
	        $(this).addClass('active');
	        $('.cgrid').removeClass('active');              
	        $('#product_list').fadeOut(300, function() {
	          $(this).removeClass('v_grid').addClass('v_list').fadeIn(300);
	        });
	        // $.cookie('list_grid','g', { expires: 7, path: vmSiteurl });
	        return false;
	      });
		
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
		
		// Quantity

		
		
		
		
			$(document).on( 'click', '.plus, .minus', function (e) {
					e.preventDefault();
					// Get values
					var $qty		= $( this ).closest( '.quantity' ).find( '.input-text' ),
						currentVal	= parseFloat( $qty.val() ),
						max			= parseFloat( $qty.attr( 'max' ) ),
						min			= parseFloat( $qty.attr( 'min' ) ),
						step		= $qty.attr( 'step' );

					// Format values
					if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
					if ( max === '' || max === 'NaN' ) max = '';
					if ( min === '' || min === 'NaN' ) min = 0;
					if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

					// Change the value
					if ( $( this ).is( '.plus' ) ) {
						if ( max && ( max == currentVal || currentVal > max ) ) {
							$qty.val( max );
						} else {
							$qty.val( currentVal + parseFloat( step ) );
						}
					} else {
						if ( min && ( min == currentVal || currentVal < min ) ) {
							$qty.val( min );
						} else if ( currentVal > 0 ) {
							$qty.val( currentVal - parseFloat( step ) );
						}
					}

					// Trigger change event
					$qty.trigger( 'change' );
				});
		
		
		//product-gallery carousel

		if($('.woocommerce-product-gallery--with-images .flex-control-nav').length){
				$('.woocommerce-product-gallery--with-images .flex-control-nav').each(function(){
					
					/* Max items counting */
					var data = $(this).data();
					console.log(data);
					var max_items = $('.woocommerce-product-gallery--with-images').data('columns');
					var tablet_items = max_items;
					if(max_items > 1){
						tablet_items = max_items - 1;
					}
					var mobile_items = 1;

					var autoplay_carousel = $(this).data('autoplay');
					
					$('.woocommerce-product-gallery--with-images .flex-control-nav').owlCarousel({
						items : max_items,
						margin : 30,
						URLhashListener : false,
						navSpeed : 800,
						nav : true,
						navText:false,
						responsive : {
					        0:{
					            items:tablet_items
					        },
					        400:{
					            items:max_items
					        },
					        481:{
					            items:tablet_items
					        },
					        980:{
					            items:max_items
					        }
					    }
				    });
				});
			    
			}

	});

})(jQuery);

