
const scrape = require('website-scraper');

scrape({
    urls: [
        'http://localhost/dynamic/', // Will be saved with default filename 'index.html'
        {
            url: 'http://localhost/dynamic/thispage/test',
            filename: 'page1.html'
        },
        {
            url: 'http://localhost/dynamic/thispage/p3/',
            filename: 'page2.html'
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
}).catch(function (err) {
    console.log(err);
});