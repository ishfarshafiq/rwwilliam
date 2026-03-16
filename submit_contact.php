<?php
/**
 * Contact Form Handler
 * RW William PLT
 * 
 * This script handles contact form submissions:
 * 1. Validates required fields
 * 2. Sends a notification email to the company
 * 3. Sends a confirmation email to the sender
 * 4. Logs enquiries to CSV
 * 5. Returns JSON response for the AJAX frontend
 */

header('Content-Type: application/json');

// ============================================================
// CONFIGURATION - Update these values for your setup
// ============================================================
$receiverEmail = 'patma@webprodesign.my';      // Company email to receive enquiries
$companyName   = 'RW William PLT';

// ============================================================
// VALIDATE REQUEST METHOD
// ============================================================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

// ============================================================
// COLLECT & SANITIZE FORM DATA
// ============================================================
$firstName = trim(htmlspecialchars($_POST['firstName'] ?? ''));
$lastName  = trim(htmlspecialchars($_POST['lastName'] ?? ''));
$email     = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
$phone     = trim(htmlspecialchars($_POST['phone'] ?? ''));
$company   = trim(htmlspecialchars($_POST['company'] ?? ''));
$service   = trim(htmlspecialchars($_POST['service'] ?? ''));
$message   = trim(htmlspecialchars($_POST['message'] ?? ''));

$fullName  = $firstName . ' ' . $lastName;

// ============================================================
// VALIDATION
// ============================================================
$errors = [];

if (empty($firstName)) $errors[] = 'First Name is required.';
if (empty($lastName))  $errors[] = 'Last Name is required.';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email address is required.';
if (empty($message))   $errors[] = 'Message is required.';

if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode(' ', $errors)]);
    exit;
}

// ============================================================
// SEND NOTIFICATION EMAIL TO COMPANY
// ============================================================
$subject = "New Enquiry from {$fullName}" . ($service ? " - {$service}" : "");

$htmlBody = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #2C3E50; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; }
        .header { background: #00ADEF; color: white; padding: 24px; text-align: center; border-radius: 12px 12px 0 0; }
        .header h1 { margin: 0; font-size: 22px; }
        .body { background: #f8f9fa; padding: 24px; border-radius: 0 0 12px 12px; }
        .field { margin-bottom: 14px; }
        .label { font-weight: bold; color: #004B6E; }
        .value { color: #2C3E50; }
        .message-box { background: #fff; border-left: 4px solid #00ADEF; padding: 16px; margin-top: 16px; border-radius: 0 8px 8px 0; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>New Contact Enquiry</h1>
        </div>
        <div class='body'>
            <div class='field'><span class='label'>Name:</span> <span class='value'>{$fullName}</span></div>
            <div class='field'><span class='label'>Email:</span> <span class='value'><a href='mailto:{$email}'>{$email}</a></span></div>"
            . ($phone ? "<div class='field'><span class='label'>Phone:</span> <span class='value'>{$phone}</span></div>" : "")
            . ($company ? "<div class='field'><span class='label'>Company:</span> <span class='value'>{$company}</span></div>" : "")
            . ($service ? "<div class='field'><span class='label'>Service Interested In:</span> <span class='value'>{$service}</span></div>" : "")
            . "<div class='field' style='margin-top:20px'><span class='label'>Message:</span></div>
            <div class='message-box'>{$message}</div>
            <div class='field' style='margin-top:16px;font-size:12px;color:#888'>
                Submitted on: " . date('d M Y, h:i A') . "
            </div>
        </div>
        <div class='footer'>
            This enquiry was submitted via the {$companyName} contact page.
        </div>
    </div>
</body>
</html>";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: {$companyName} Website <noreply@rwwilliam.com>\r\n";
$headers .= "Reply-To: {$fullName} <{$email}>\r\n";

$mailSent = mail($receiverEmail, $subject, $htmlBody, $headers);

// ============================================================
// SEND CONFIRMATION EMAIL TO SENDER
// ============================================================
$confirmSubject = "We've Received Your Enquiry - {$companyName}";
$confirmBody = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #2C3E50; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; }
        .header { background: #00ADEF; color: white; padding: 24px; text-align: center; border-radius: 12px 12px 0 0; }
        .body { background: #f8f9fa; padding: 24px; border-radius: 0 0 12px 12px; }
        .message-box { background: #fff; border-left: 4px solid #00ADEF; padding: 16px; margin: 16px 0; border-radius: 0 8px 8px 0; font-style: italic; color: #6B7B8D; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>{$companyName}</h1>
        </div>
        <div class='body'>
            <p>Dear <strong>{$fullName}</strong>,</p>
            <p>Thank you for reaching out to {$companyName}. We have received your enquiry and our team will get back to you within <strong>24 hours</strong>.</p>
            <p>Here's a copy of your message:</p>
            <div class='message-box'>{$message}</div>
            <p>If your matter is urgent, please do not hesitate to call us directly at <strong>+603-7805 3859</strong>.</p>
            <p style='margin-top:24px'>Warm Regards,<br><strong>{$companyName}</strong><br>Petaling Jaya, Selangor Darul Ehsan, Malaysia</p>
        </div>
        <div class='footer'>
            This is an automated confirmation email. Please do not reply to this email.
        </div>
    </div>
</body>
</html>";

$confirmHeaders  = "MIME-Version: 1.0\r\n";
$confirmHeaders .= "Content-Type: text/html; charset=UTF-8\r\n";
$confirmHeaders .= "From: {$companyName} <noreply@rwwilliam.com>\r\n";

mail($email, $confirmSubject, $confirmBody, $confirmHeaders);

// ============================================================
// LOG ENQUIRY TO CSV
// ============================================================
$logFile = 'uploads/contact_log.csv';
$logDir  = dirname($logFile);

if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

if (!file_exists($logFile)) {
    $headerRow = ['Date', 'First Name', 'Last Name', 'Email', 'Phone', 'Company', 'Service', 'Message'];
    $fp = fopen($logFile, 'w');
    fputcsv($fp, $headerRow);
    fclose($fp);
}

$logRow = [date('Y-m-d H:i:s'), $firstName, $lastName, $email, $phone, $company, $service, $message];
$fp = fopen($logFile, 'a');
fputcsv($fp, $logRow);
fclose($fp);

// ============================================================
// RETURN SUCCESS RESPONSE
// ============================================================
echo json_encode([
    'status'  => 'success',
    'message' => 'Your message has been sent successfully!'
]);
exit;
