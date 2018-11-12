(function($) {  
$(document).foundation();
jQuery(document).ready(function(){$("#menuzord").menuzord({align: "left"}); });
$(document).ready(function() {
  $('#backTop').backTop({
    'position' : 15,
    'speed' : 500,
    'color' : 'red',
  });
  
});
})(jQuery);

(function($) {   
$(document).ready(function() {
var stickyNavTop = $('.ps_header').offset().top;
var stickyNav = function(){
var scrollTop = $(window).scrollTop();
if (scrollTop > stickyNavTop) { 
    $('.ps_header').addClass('sticky');
} else {
    $('.ps_header').removeClass('sticky'); 
}
};
stickyNav();
$(window).scroll(function() {
    stickyNav();
});
});
})(jQuery);


var swiper1 = new Swiper('.swiper1', { 
  slidesPerView: 1,spaceBetween: 0, autoplay: 2500, autoplayDisableOnInteraction: true, loop: true, 
  nextButton: '.swiper1-next', prevButton: '.swiper1-prev',  pagination: '.swiper-pagination1',  paginationClickable: true, 
  breakpoints: {360: { slidesPerView: 1, spaceBetweenSlides: 0},
    480: {slidesPerView: 1, spaceBetweenSlides: 0},
    640: {slidesPerView: 1, spaceBetweenSlides: 0}
  }
});
$('.swiper1').hover(function() {
    swiper1.stopAutoplay();
}, function() {
    swiper1.startAutoplay();
});

var swiper2 = new Swiper('.swiper2', { 
  slidesPerView: 4,spaceBetween: 30, autoplay: 2500, autoplayDisableOnInteraction: true, loop: true, 
  nextButton: '.swiper2-next', prevButton: '.swiper2-prev',  pagination: '.swiper-pagination2',  paginationClickable: true, 
  breakpoints: {360: { slidesPerView: 1, spaceBetweenSlides: 0},
    480: {slidesPerView: 2, spaceBetweenSlides: 20},
    640: {slidesPerView: 3, spaceBetweenSlides: 20}
  }
});
$('.swiper2').hover(function() {
    swiper2.stopAutoplay();
}, function() {
    swiper2.startAutoplay();
});

var swiper3 = new Swiper('.swiper3', { 
  slidesPerView: 4,spaceBetween: 20, autoplay: 2500, autoplayDisableOnInteraction: true, loop: true, 
  nextButton: '.swiper3-next', prevButton: '.swiper3-prev',  pagination: '.swiper-pagination3',  paginationClickable: true, 
  breakpoints: {360: { slidesPerView: 2, spaceBetweenSlides: 20},
    480: {slidesPerView: 2, spaceBetweenSlides: 20},
    640: {slidesPerView: 3, spaceBetweenSlides: 20}
  }
});
$('.swiper3').hover(function() {
    swiper3.stopAutoplay();
}, function() {
    swiper3.startAutoplay();
});
