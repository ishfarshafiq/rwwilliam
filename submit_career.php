<?php
/**
 * Career Application Form Handler
 * RW William PLT
 * 
 * This script handles career form submissions:
 * 1. Validates all required fields
 * 2. Saves the uploaded resume to server
 * 3. Sends a notification email to HR
 * 4. Sends a confirmation email to applicant
 * 5. Returns JSON response for the AJAX frontend
 */

header('Content-Type: application/json');

// ============================================================
// CONFIGURATION - Update these values for your setup
// ============================================================
$receiverEmail = 'patma@webprodesign.my';       // HR email to receive applications
$companyName   = 'RW William PLT';
$uploadDir     = 'uploads/resumes/';        // Directory to store resumes
$maxFileSize   = 5 * 1024 * 1024;           // 5MB max file size
$allowedTypes  = ['pdf', 'doc', 'docx'];

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
$fullName    = trim(htmlspecialchars($_POST['fullName'] ?? ''));
$email       = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
$phone       = trim(htmlspecialchars($_POST['phone'] ?? ''));
$employment  = trim(htmlspecialchars($_POST['employment'] ?? ''));
$department  = trim(htmlspecialchars($_POST['department'] ?? ''));
$location    = trim(htmlspecialchars($_POST['location'] ?? ''));
$hire        = trim(htmlspecialchars($_POST['hire'] ?? ''));

// ============================================================
// VALIDATION
// ============================================================
$errors = [];

if (empty($fullName))   $errors[] = 'Full Name is required.';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email address is required.';
if (empty($phone))      $errors[] = 'Phone number is required.';
if (empty($employment)) $errors[] = 'Current employment/institution is required.';
if (empty($department)) $errors[] = 'Department is required.';
if (empty($location))   $errors[] = 'Preferred location is required.';
if (empty($hire))       $errors[] = 'Type of hire is required.';

// Validate resume file
if (!isset($_FILES['resume']) || $_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
    $errors[] = 'Resume file is required.';
} else {
    $file = $_FILES['resume'];
    $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($fileExt, $allowedTypes)) {
        $errors[] = 'Only PDF, DOC, and DOCX files are allowed.';
    }
    if ($file['size'] > $maxFileSize) {
        $errors[] = 'File size must be under 5MB.';
    }
}

if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode(' ', $errors)]);
    exit;
}

// ============================================================
// SAVE RESUME FILE
// ============================================================
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Create unique filename: timestamp_name_resume.ext
$safeName = preg_replace('/[^a-zA-Z0-9]/', '_', $fullName);
$uniqueName = date('Ymd_His') . '_' . $safeName . '_resume.' . $fileExt;
$uploadPath = $uploadDir . $uniqueName;

if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to upload resume. Please try again.']);
    exit;
}

// ============================================================
// SEND NOTIFICATION EMAIL TO HR
// ============================================================
$subject = "New Career Application - {$fullName} ({$department}, {$location})";

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
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>New Career Application</h1>
        </div>
        <div class='body'>
            <div class='field'><span class='label'>Full Name:</span> <span class='value'>{$fullName}</span></div>
            <div class='field'><span class='label'>Email:</span> <span class='value'>{$email}</span></div>
            <div class='field'><span class='label'>Phone:</span> <span class='value'>{$phone}</span></div>
            <div class='field'><span class='label'>Current Employment:</span> <span class='value'>{$employment}</span></div>
            <div class='field'><span class='label'>Department:</span> <span class='value'>{$department}</span></div>
            <div class='field'><span class='label'>Preferred Location:</span> <span class='value'>{$location}</span></div>
            <div class='field'><span class='label'>Type of Hire:</span> <span class='value'>{$hire}</span></div>
            <div class='field'><span class='label'>Resume:</span> <span class='value'>{$uniqueName}</span></div>
            <div class='field' style='margin-top:16px;font-size:12px;color:#888'>
                Submitted on: " . date('d M Y, h:i A') . "
            </div>
        </div>
        <div class='footer'>
            This application was submitted via the {$companyName} career page.
        </div>
    </div>
</body>
</html>";

// Build multipart email with resume attachment
$boundary = md5(time());

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "From: {$companyName} Career Portal <noreply@rwwilliam.com>\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

// Read the uploaded resume file
$fileContent = file_get_contents($uploadPath);
$encodedFile = chunk_split(base64_encode($fileContent));

// Determine MIME type for attachment
$mimeTypes = [
    'pdf'  => 'application/pdf',
    'doc'  => 'application/msword',
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
];
$fileMime = $mimeTypes[$fileExt] ?? 'application/octet-stream';
$originalFileName = basename($file['name']); // Use original filename for attachment

// Build the email body with attachment
$emailBody  = "--{$boundary}\r\n";
$emailBody .= "Content-Type: text/html; charset=UTF-8\r\n";
$emailBody .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$emailBody .= $htmlBody . "\r\n\r\n";

$emailBody .= "--{$boundary}\r\n";
$emailBody .= "Content-Type: {$fileMime}; name=\"{$originalFileName}\"\r\n";
$emailBody .= "Content-Transfer-Encoding: base64\r\n";
$emailBody .= "Content-Disposition: attachment; filename=\"{$originalFileName}\"\r\n\r\n";
$emailBody .= $encodedFile . "\r\n";
$emailBody .= "--{$boundary}--";

$mailSent = mail($receiverEmail, $subject, $emailBody, $headers);

// ============================================================
// SEND CONFIRMATION EMAIL TO APPLICANT
// ============================================================
$confirmSubject = "Application Received - {$companyName}";
$confirmBody = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #2C3E50; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; }
        .header { background: #00ADEF; color: white; padding: 24px; text-align: center; border-radius: 12px 12px 0 0; }
        .body { background: #f8f9fa; padding: 24px; border-radius: 0 0 12px 12px; }
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
            <p>Thank you for your interest in joining {$companyName}. We have successfully received your application for the <strong>{$department}</strong> department at our <strong>{$location}</strong> office.</p>
            <p>Our HR team will review your application and get back to you if your profile matches our current requirements. Please allow 5-7 working days for us to process your application.</p>
            <p>In the meantime, feel free to explore more about us at <a href='https://www.rwwilliam.com' style='color:#00ADEF'>www.rwwilliam.com</a>.</p>
            <p style='margin-top:24px'>Best Regards,<br><strong>HR Department</strong><br>{$companyName}</p>
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
// OPTIONAL: LOG APPLICATION TO CSV
// ============================================================
$logFile = 'uploads/applications_log.csv';
$logDir  = dirname($logFile);

if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

// Create header row if file doesn't exist
if (!file_exists($logFile)) {
    $headerRow = ['Date', 'Full Name', 'Email', 'Phone', 'Employment', 'Department', 'Location', 'Hire Type', 'Resume File'];
    $fp = fopen($logFile, 'w');
    fputcsv($fp, $headerRow);
    fclose($fp);
}

$logRow = [date('Y-m-d H:i:s'), $fullName, $email, $phone, $employment, $department, $location, $hire, $uniqueName];
$fp = fopen($logFile, 'a');
fputcsv($fp, $logRow);
fclose($fp);

// ============================================================
// RETURN SUCCESS RESPONSE
// ============================================================
echo json_encode([
    'status'  => 'success',
    'message' => 'Your application has been submitted successfully!'
]);
exit;
