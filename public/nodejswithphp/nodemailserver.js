/*var http = require('http');

http.createServer(function (req, res) {
    console.log('request received');
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.end('_testcb(\'{"message": "Hello world!"}\')');
}).listen(8124);*/
var express     =    require('express'),
    //multer      =    require('multer'),
    app         =    express(),
    exec        =    require('child_process').exec,
    fs          =    require('fs');

const path = require('path');
const router = express.Router();
var cors = require('cors');

app.use(cors()); // Use this after the variable declaration
/*app.get('/', function (req, res) {
  res.send('hello world')
});*/


app.get('/',function(req,res) {
  res.sendFile(path.join(__dirname+'/index.html'));
});

app.get('/mymail', function(req, res){ var authu = req.query.authu; var authp = req.query.authp; var frome = req.query.frome; var toe = req.query.toe;  var sube = req.query.sube; var texte = req.query.texte; var wele = req.query.wele; var htmle = req.query.htmle;   exec("node mail.js "+authu+" "+authp+" "+ frome +" "+toe+" "+ sube+" "+ texte+" "+ wele +" "+ htmle , function (error, stdout, stderr) {res.send(stdout);});});


/*app.post('/wc',[
  multer({ dest: '/tmp/uploads/' }),
  function(req, res){
    child = exec("wc " + req.files.textfile.path +
                 "| awk {'print \"#lines: \"$1\" | #words: \"$2\" | #bytes: \"$3'}",
                 function(err, stdout) {
                   res.writeHead(200, {"Content-Type": "text/plain"});
                   res.end(stdout.trim() + " | " + req.files.textfile.originalname);
                   fs.unlink(req.files.textfile.path);
            });
}]);*/

app.listen(8123,function(){
    console.log("Working on port 8123");
});

