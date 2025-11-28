<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize input
    $name = htmlspecialchars(trim($_POST["name"] ?? ''));
    $number = htmlspecialchars(trim($_POST["number"] ?? ''));
    $organization = htmlspecialchars(trim($_POST["organization"] ?? ''));
    $email = htmlspecialchars(trim($_POST["email"] ?? ''));
    $services = htmlspecialchars(trim($_POST["services"] ?? ''));
    $message = htmlspecialchars(trim($_POST["message"] ?? ''));

    // Validate inputs
    $isValid = true;
    $errors = [];

    if (strlen($name) < 2) $errors[] = 'Invalid name';
    if (!preg_match('/^[0-9]{10}$/', $number)) $errors[] = 'Invalid phone number';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email';
    if (strlen($organization) < 2) $errors[] = 'Invalid organization';
    if (empty($services)) $errors[] = 'No service selected';
    if (strlen($message) < 5 || strlen($message) > 200) $errors[] = 'Invalid message length';

    if (!empty($errors)) {
        echo 'error'; // Don't send email
        exit;
    }

    // Email setup
    $to = "business@imacengineering.com";
    $subject = "New Contact Form Submission (Home page)";
    $headers = "From: noreply@imacengineering.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $email_body = "
    <html>
    <head>
      <style>
        body { font-family: Arial, sans-serif; background: #ffffff; }
        .email-container { max-width: 600px; margin: 0 auto; border-top: 2px solid #ff4612; padding: 20px; }
        .label { font-weight: bold; color: #000000; }
      </style>
    </head>
    <body>
      <div class='email-container'>
        <h2>New Contact Form Submission</h2>
        <p><span class='label'>Name:</span> $name</p>
        <p><span class='label'>Phone Number:</span> $number</p>
        <p><span class='label'>Organization:</span> $organization</p>
        <p><span class='label'>Email:</span> $email</p>
        <p><span class='label'>Service Interested:</span> $services</p>
        <p><span class='label'>Message:</span> $message</p>
        <p><span class='label'>Page URL:</span> ' . $pageURL . '</p>
        <p><span class='label'>Remote IP:</span> ' . $remoteIP . '</p>
        <p><span class='label'>User Agent:</span> ' . $userAgent . '</p>
      </div>
    </body>
    </html>";

    if (mail($to, $subject, $email_body, $headers)) {
        echo 'success';
    } else {
        echo 'error';
    }

} else {
    echo 'invalid';
}
?>
