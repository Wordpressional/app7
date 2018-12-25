<template>
<div>
    <button @click="broadcast">Trigger An Echo Event</button>

    <p v-for="message in messages" v-text="message"></p>

    
    </div>
</template>
<script>

  import axios from 'axios';  
 import Echo from "laravel-echo";
 
export default {


  data: function () {
    
  return {
      		
            messages: []
        }
        
    },

    mounted() {
    console.log('Component mounted on test.');
    setTimeout(() => {
    this.startfunc();
    }, 100);
    },



    methods: {
        broadcast() {
        
            axios.get('broadcast-test');

            this.getmsg();

            console.log(this.messages);
        },

        startfunc() {

         console.log('Component mounted on test start.');
        
        console.log(window.Echo);
    	
    	window.Echo.channel('global')
            .listen('.TestEvent', (e) => {
               this.messages.unshift(e.data);
                console.log("hi");
            });
           
        },

        getmsg(){
        console.log(this.messages);
            return this.messages;

                               
        
        }

    }
}
</script>