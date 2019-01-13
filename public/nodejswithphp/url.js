var request = require("request")

var url = "http://127.0.0.1:8009/testjson"

request({
    url: url,
    json: true
}, function (error, response, body) {

    if (!error && response.statusCode === 200) {
        console.log(body); // Print the json response
        
        return body;
    }
})