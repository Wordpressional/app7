const scrape = require('website-scraper');

var fs = require('fs');
 
//var contents = fs.readFileSync('/var/www/html/staticweb/public/jsonfiles/testurl.txt');

//let jsonData = JSON.parse(fs.readFileSync('/var/www/html/staticweb/public/jsonfiles/testurl.json', 'utf-8'));
//const jsonData = require('/var/www/html/staticweb/public/jsonfiles/testurl.txt');
fs.readFile('./jsonfiles/testurl.txt', function(err, buf) {
//console.log(buf.toString());
//jsonData = buf.toString();
//var result = jsonData.replace(/\n\ /g, '');
//console.log(result);
result = JSON.parse(buf);

scrape({
    urls: result,
    directory: './downloadedstatic/node_website',
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
    console.log(result);
    console.log("Content succesfully downloaded");
}).catch(function (err) {
    console.log(err);
});

});