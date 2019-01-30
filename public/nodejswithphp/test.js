function validate(list) {
  
const scrape = require('website-scraper');

scrape({
    urls: list,
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
    return("Content succesfully downloaded");
}).catch(function (err) {
    console.log(err);
});
  // ...
}
function myFunction1(req, resp) {
  return 5;
}

exports.data = { f1: myFunction1 };