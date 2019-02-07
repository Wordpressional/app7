var nodemailer = require('nodemailer');

// Create a SMTP transport object
// var transporter = nodemailer.createTransport("SMTP", {
//     service: 'gmail',
    
//         auth: {
//             user: "dynamicpwa",
//             pass: "cpzlwcxtaluakomb"
//         }
//     });
var transporter = nodemailer.createTransport({
 service: 'gmail',
 auth: {
            user: "pyrumas2019@gmail.com",
            pass: "SHDY7Nmg"
        }
});

console.log('SMTP Configured');

// Message object
var message = {

    // sender info
    from: 'Sender Name <pyrumas2019@gmail.com>',

    // Comma separated list of recipients
    to: '"Receiver Name" <pyrumas2019@gmail.com>',

    // Subject of the message
    subject: 'How to send mail in nodejs ✔', 

    // plaintext body
    text: 'Hello, everyone!',

    // HTML body
    html:'<p>s<b>sLook this</b>s  <img src=""/>s</p>s'+
         '<p>sHere i am send my picture attachment:<br/>s</p>s'
};

console.log('Sending Mail');
transporter.sendMail(message, function(error){
  if(error){
      console.log('Error occured');
      console.log(error.message);
      return;
  }
  console.log('Message sent successfully!');

  // if you don't want to use this transport object anymore, uncomment following line
  //transport.close(); // close the connection pool
});