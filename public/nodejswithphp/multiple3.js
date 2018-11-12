var http = require("http");

http.createServer(function (request, response) {
   // Send the HTTP header 
   // HTTP Status: 200 : OK
   // Content Type: text/plain
   response.writeHead(200, {'Content-Type': 'text/plain'});
   
   // Send the response body as "Hello World"
   //response.end('Hello World\n');

/*const fs = require('fs')

fs.readFile('http://127.0.0.1:8009/testjson', 'utf8', (err, fileContents) => {
  if (err) {
    console.error(err)
    return
  }
  try {
    const data = JSON.parse(fileContents)
     response.write(data);
  } catch(err) {
    console.error(err)
  }
});*/

var request = require("request")

var url = "http://127.0.0.1:8009/testjson"

request({
    url: url,
    json: true
}, function (error, response, body) {

    if (!error && response.statusCode === 200) {
        console.log(body.name) // Print the json response

    }
});


/*const scrape = require('website-scraper');

scrape({
    urls: [
        'http://ocr.kuwsdb.org/', // Will be saved with default filename 'index.html'
        {
            url: 'http://ocr.kuwsdb.org/dashboard/escalation_matrix.php',
            filename: 'about.html'
        }
    ],
    directory: './node-website',
    subdirectories: [
        {
            directory: 'img',
            extensions: ['.jpg', '.png', '.svg']
        },
        {
            directory: 'js',
            extensions: ['.js']
        },
        {
            directory: 'css',
            extensions: ['.css']
        },
        {
            directory: 'fonts',
            extensions: ['.woff','.ttf']
        }
    ],
    sources: [
        {
            selector: 'img',
            attr: 'src'
        },
        {
            selector: 'link[rel="stylesheet"]',
            attr: 'href'
        },
        {
            selector: 'script',
            attr: 'src'
        }
    ]
}).then(function (result) {
    // Outputs HTML 
    // console.log(result);
    console.log("Content succesfully downloaded");
    response.write("Content succesfully downloaded");
    response.end();
}).catch(function (err) {
    console.log(err);
    
});*/



}).listen(8081);