window.Vue = require('vue');
import Task from './components/Task.vue';
Vue.config.productionTip = false;

Vue.component('comment', require('./components/comments/Comment.vue'));
Vue.component('comment-list', require('./components/comments/Comment-list.vue'));
Vue.component('comment-form', require('./components/comments/Comment-form.vue'));

Vue.component('like', require('./components/Like.vue'));




// $(document).ready(function() {
// $('.nav-item').on('click', function(){
// //$(this).addClass('active').removeClass('off').siblings().addClass('off').removeClass('active'); // no need to add .off
// //alert("hi");

// $(this).addClass('active').siblings().removeClass('active');

// });
// });


Vue.component("testone", require('./components/Test.vue'));



Vue.component('task', Task);


Vue.config.debug = true; 
Vue.config.devtools = true;

window.Event = new Vue();

const app = new Vue({
  el: '#app',
  

  mounted() {
    $('[data-confirm]').on('click', function () {
      return confirm($(this).data('confirm'))
    });
    
  }
});
