<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $phone = $_POST['mobile'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Set recipient email address
    $to = "Prabhu.292@gmail.com"; // Replace with your email
    
    // Set email subject
    $subject = "New Consultation Request from $name";
    
    // Compose email body
    $email_body = "
    <html>
    <head>
        <title>New Consultation Request</title>
    </head>
    <body>
        <h2>Consultation Request Details</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong> $message</p>
    </body>
    </html>
    ";
    
    // Set headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    
    // Send email
    $mail_sent = mail($to, $subject, $email_body, $headers);
    
    // Check if mail was sent successfully
    if ($mail_sent) {
        echo "<script>alert('Thank you! Your consultation request has been sent.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error sending your message. Please try again later.'); window.location.href='index.html';</script>";
    }
}
?>