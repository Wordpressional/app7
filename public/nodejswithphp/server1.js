var express = require('express'),
	test = require('./test.js'),
    list = require('./request.js').Request; // see  template

var app = express();

app.use(express.static(__dirname + '/public')); // exposes index.html, per below

app.get('/test.html', function(req, res){
    // run your request.js script
    // when index.html makes the ajax call to www.yoursite.com/request, this runs
    // you can also require your request.js as a module (above) and call on that:
    //res.send(list.getList()); // try res.json() if getList() returns an object or array
    console.log(list);
   var test =  test.f1();
   console.log(test);

});

app.listen(3000);