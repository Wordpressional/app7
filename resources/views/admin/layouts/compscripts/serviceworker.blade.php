<script src="{{ asset('upup.min.js') }}"></script>
<script src="{{ asset('upup.sw.min.js') }}"></script>
<script>
UpUp.start({
'content': 'You are Offline. Cannot reach site. Please check your internet connection.',
'service-worker-url': "{{ asset('upup.sw.min.js') }}"
});

$(document).ready(function() {

if ('serviceWorker' in navigator) {
console.log("Will the service worker register?");
navigator.serviceWorker.register("{{ asset('upup.sw.min.js') }}")
.then(function(reg){
console.log("Yes, it did.");
}).catch(function(err) {
console.log("No it didn't. This happened: ", err)
});
}



});


</script>