var nodemailer = require('nodemailer');

// Create a SMTP transport object
// var transporter = nodemailer.createTransport("SMTP", {
//     service: 'gmail',
    
//         auth: {
//             user: "dynamicpwa",
//             pass: "cpzlwcxtaluakomb"
//         }
//     });

const args = process.argv;


var transporter = nodemailer.createTransport({
 service: 'gmail',
 auth: {
            user: args[2],
            pass: args[3]
        }
});

console.log('SMTP Configured');

// Message object
var message = {

    // sender info
    from: args[4],

    // Comma separated list of recipients
    to: args[5],

    // Subject of the message
    subject: args[6], 

    // plaintext body
    text: args[7],

    // HTML body
    html: args[8]+args[9]
};

console.log('Sending Mail');
transporter.sendMail(message, function(error){
  if(error){
      console.log('Error occured');
      console.log(error.message);
      return;
  }
  console.log('Message sent successfully!');
  console.log(args);

  // if you don't want to use this transport object anymore, uncomment following line
  //transport.close(); // close the connection pool
});