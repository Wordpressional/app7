require('./bootstrap');
require('./vue');
import Task from './components/Task.vue';
// $(document).ready(function() {
// $('.nav-item').on('click', function(){
// //$(this).addClass('active').removeClass('off').siblings().addClass('off').removeClass('active'); // no need to add .off
// //alert("hi");

// $(this).addClass('active').siblings().removeClass('active');

// });
// });
window.Vue = require('vue');





Vue.component('task', Task);



//const router = new VueRouter({
//     base: '/dynamic/',
//});

//const app = new Vue({
//    el: '#app',
//    components: { App, task},
//    router,
//});

/*Vue.use(VueRouter);



const router = new VueRouter({
   
    mode: 'history',
     base: '/dynamic/'
});*/

const app = new Vue({
    el: '#app',
   
    components: {
        Task
    }
});

jQuery(function($) {

 var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
 $('.nav-item a').each(function() {
  if (this.href === path) {
   $(this).parents("li").addClass("active");
  }
  
 });
 
});
