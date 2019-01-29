
const scrape = require('website-scraper');

scrape({
    urls: [
        'http://ocr.kuwsdb.org', // Will be saved with default filename 'index.html'
        {
            url: 'http://ocr.kuwsdb.org/dashboard/pending.php',
            filename: 'pending.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/closed.php',
            filename: 'closed.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/all_complaints.php',
            filename: 'all_complaints.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/complaint_status.php',
            filename: 'complaint_status.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/index.php',
            filename: 'dashboardindex.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_all.php',
            filename: 'dashboard_all.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_total.php',
            filename: 'dashboard_total.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_category.php',
            filename: 'dashboard_category.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_sms2.php',
            filename: 'dashboard_sms2.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_phone2.php',
            filename: 'dashboard_phone2.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_email2.php',
            filename: 'dashboard_email2.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_facebook.php',
            filename: 'dashboard_facebook.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_whatsapp.php',
            filename: 'dashboard_whatsapp.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_telegram.php',
            filename: 'dashboard_telegram.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_web.php',
            filename: 'dashboard_web.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_tc.php',
            filename: 'dashboard_tc.html'
        },
        {
            url: 'http://ocr.kuwsdb.org/dashboard/dashboard_total.php',
            filename: 'dashboard_total.html'
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