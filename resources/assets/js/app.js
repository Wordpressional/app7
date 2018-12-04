require('./bootstrap');
require('./vue');

// $(document).ready(function() {
// $('.nav-item').on('click', function(){
// //$(this).addClass('active').removeClass('off').siblings().addClass('off').removeClass('active'); // no need to add .off
// //alert("hi");

// $(this).addClass('active').siblings().removeClass('active');

// });
// });
window.Vue = require('vue');

Vue.component('task', require('./components/Task.vue'));


const app = new Vue({
    el: '#app'
});

jQuery(function($) {

 var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
 $('.nav-item a').each(function() {
  if (this.href === path) {
   $(this).parents("li").addClass("active");
  }
  
 });
 
});
