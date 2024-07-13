<?php
// contact.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "filyayardan1234@gmail.com"; 
    $subject = "New Contact Form Submission";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/html; charset=UTF-8";

    $email_body = "<html><body>";
    $email_body .= "<h2>Contact Form Submission</h2>";
    $email_body .= "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    $email_body .= "<p><strong>Phone:</strong> $phone</p>";
    $email_body .= "<p><strong>Address:</strong> $address</p>";
    $email_body .= "<p><strong>Message:</strong> $message</p>";
    $email_body .= "</body></html>";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "<p>Thank you for your message. We will get back to you soon.</p>";
    } else {
        echo "<p>Sorry, there was a problem sending your message. Please try again later.</p>";
    }
} else {
    // Redirect to contact page if accessed directly
    header("Location: /");
    exit();
}
?>
