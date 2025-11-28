<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get form data
    $name = htmlspecialchars($_POST["name"]);
    $number = htmlspecialchars($_POST["number"]);
    $organization = htmlspecialchars($_POST["organization"]);
    $email = htmlspecialchars($_POST["email"]);
    $services = htmlspecialchars($_POST["services"]);
    $message = htmlspecialchars($_POST["message"]);

    // Email setup
    $to = "priyankatiwari.hbsoftweb.com";  // 🔁 Replace with your actual email
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $email_body = "You have received a new message from your website:\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Number: $number\n";
    $email_body .= "Organization: $organization\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Service Interested: $services\n";
    $email_body .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "success"; // you can return JSON for AJAX use
    } else {
        echo "error";
    }
} else {
    echo "Invalid request.";
}
?>