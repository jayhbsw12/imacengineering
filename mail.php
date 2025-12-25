<?php
// mail.php — Contact Us form mailer (popup-mail layout/headers)
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'error';
    exit;
}

// ---------- Sanitize inputs (match form field *names*) ----------
$Name = isset($_POST['Name']) ? htmlspecialchars($_POST['Name'], ENT_QUOTES, 'UTF-8') : '';
$Email = isset($_POST['Email']) ? htmlspecialchars($_POST['Email'], ENT_QUOTES, 'UTF-8') : '';
$Phone = isset($_POST['Phone']) ? htmlspecialchars($_POST['Phone'], ENT_QUOTES, 'UTF-8') : '';
$Organization = isset($_POST['Organization']) ? htmlspecialchars($_POST['Organization'], ENT_QUOTES, 'UTF-8') : '';
$Service = isset($_POST['Service']) ? htmlspecialchars($_POST['Service'], ENT_QUOTES, 'UTF-8') : '';
// HTML has name="Message" (singular). Keep fallback to "Messages" just in case.
$MessagesRaw = $_POST['Message'] ?? ($_POST['Messages'] ?? '');
$Messages = htmlspecialchars($MessagesRaw, ENT_QUOTES, 'UTF-8');

// ---------- Visitor info ----------
$remoteIP = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$pageURL = $_SERVER['HTTP_REFERER'] ?? 'Not Available';

// ---------- Basic validation ----------
if (!$Name || !$Email || !$Phone || !$Organization || !$Service || !$Messages) {
    echo 'error';
    exit;
}
if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    echo 'error';
    exit;
}

// ---------- Mail settings (aligned with popup-mail.php style) ----------
$to = "business@imacengineering.com";
$subject = "Received inquiry from website : www.imacengineering.com";

// Addresses & names
$fromEmail = "jaymodihbsoftweb@gmail.com";
$fromName = "HB Softweb";
$replyToEmail = "business@imacengineering.com";
$replyToName = "IMAC Engineering";

// Optional CC (set to "" to disable)
$cc = "digital@hbsoftweb.com";

// ---------- Headers ----------
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= 'From: "' . addslashes($fromName) . "\" <{$fromEmail}>\r\n";
$headers .= 'Reply-To: "' . addslashes($replyToName) . "\" <{$replyToEmail}>\r\n";
if (!empty($cc)) {
    $headers .= "Cc: {$cc}\r\n";
}
$headers .= "Return-Path: {$fromEmail}\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

// ---------- HTML body (popup layout, Contact Us fields) ----------
$body = '
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
 body{font-family:Arial,sans-serif;background:#fff;margin:0;padding:0}
 .email-container{max-width:600px;margin:0 auto;border-top:4px solid #f97316;background:#fff;padding:20px;box-shadow:0 0 5px rgba(0,0,0,0.05)}
 .email-header{text-align:center;margin-bottom:20px}
 .email-body{font-size:16px;color:#333}
 .email-body p{margin-bottom:12px}
 .label{font-weight:bold;color:#000}
 @media(max-width:600px){.email-container{padding:15px}}
</style>
</head>
<body>
 <div class="email-container">
  <div class="email-header">
   <h2>Received inquiry from website : www.imacengineering.com</h2>
  </div>
  <div class="email-body">
   <p><span class="label">Name:</span> ' . $Name . '</p>
   <p><span class="label">Email:</span> ' . $Email . '</p>
   <p><span class="label">Phone:</span> ' . $Phone . '</p>
   <p><span class="label">Organization:</span> ' . $Organization . '</p>
   <p><span class="label">Selected Service:</span> ' . $Service . '</p>
   <p><span class="label">Message:</span> ' . nl2br($Messages) . '</p>
   <hr style="border:none;border-top:1px solid #eee;margin:16px 0">
   <p><span class="label">Page URL:</span> ' . $pageURL . '</p>
   <p><span class="label">Remote IP:</span> ' . $remoteIP . '</p>
   <p><span class="label">User Agent:</span> ' . $userAgent . '</p>
  </div>
 </div>
</body>
</html>
';

// ---------- Send ----------
$sent = @mail($to, $subject, $body, $headers);
if ($sent) {
    echo 'success';
} else {
    // Useful for debugging server-side mail issues
    error_log("mail() failed on contact-us: to={$to}; subject={$subject}", 0);
    echo 'error';
}
