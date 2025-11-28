<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $fullName      = isset($_POST['fullName']) ? htmlspecialchars($_POST['fullName'], ENT_QUOTES, 'UTF-8') : '';
    $email         = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '';
    $contactNumber = isset($_POST['contactNumber']) ? htmlspecialchars($_POST['contactNumber'], ENT_QUOTES, 'UTF-8') : '';
    $message       = isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8') : '';

    // Collect visitor info
    $remoteIP  = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    $pageURL   = $_SERVER['HTTP_REFERER'] ?? 'Not Available';

    // Basic required fields check
    if ($fullName && $email && $contactNumber) {
        $to = "business@imacengineering.com";
        $subject = "Received inquiry from website : www.imacengineering.com";

        // Addresses & names (keep as you set previously)
        $fromEmail     = "digital@hbsoftweb.com";
        $fromName      = "HB Softweb";
        $replyToEmail  = "business@imacengineering.com";
        $replyToName   = "IMAC Engineering";

        // >>> Optional CC <<<
        $cc = "info@hbsoftweb.com"; // change or set to "" to disable

        // Email headers
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= 'From: "' . addslashes($fromName) . "\" <{$fromEmail}>\r\n";
        $headers .= 'Reply-To: "' . addslashes($replyToName) . "\" <{$replyToEmail}>\r\n";
        if (!empty($cc)) {
            $headers .= "Cc: {$cc}\r\n";
        }
        $headers .= "Return-Path: {$fromEmail}\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

        // Email body (Message added back)
        $body = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                body { font-family: Arial, sans-serif; background-color: #ffffff; margin: 0; padding: 0; }
                .email-container { max-width: 600px; margin: 0 auto; border-top: 4px solid #f97316; background-color: #ffffff; padding: 20px; box-shadow: 0 0 5px rgba(0,0,0,0.05); }
                .email-header { text-align: center; margin-bottom: 20px; }
                .email-body { font-size: 16px; color: #333333; }
                .email-body p { margin-bottom: 15px; }
                .label { font-weight: bold; color: #000000; }
                @media only screen and (max-width: 600px) { .email-container { padding: 15px; } }
            </style>
        </head>
        <body>
            <div class="email-container">
                <div class="email-header">
                    <h2>Received inquiry from website : www.imacengineering.com</h2>
                </div>
                <div class="email-body">
                    <p><span class="label">Full Name:</span> ' . $fullName . '</p>
                    <p><span class="label">Email:</span> ' . $email . '</p>
                    <p><span class="label">Contact Number:</span> ' . $contactNumber . '</p>' .
                    (!empty($message) ? '<p><span class="label">Message:</span> ' . nl2br($message) . '</p>' : '') .
                   '<hr style="border:none;border-top:1px solid #eee;margin:16px 0;">
                    <p><span class="label">Page URL:</span> ' . $pageURL . '</p>
                    <p><span class="label">Remote IP:</span> ' . $remoteIP . '</p>
                    <p><span class="label">User Agent:</span> ' . $userAgent . '</p>
                </div>
            </div>
        </body>
        </html>
        ';

        if (mail($to, $subject, $body, $headers)) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
