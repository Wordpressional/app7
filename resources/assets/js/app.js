require('./bootstrap');
require('./vue');






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



jQuery(function($) {

 var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
 $('.nav-item a').each(function() {
  if (this.href === path) {
   $(this).parents("li").addClass("active");
  }
  
 });
 
});
