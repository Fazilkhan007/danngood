<?php
// Get data from form
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$number = trim($_POST['number'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate input
if (empty($name) || empty($number) || empty($message)) {
    header("Location: form.php?error=empty_fields");
    exit();
}

// Set email parameters
$to = "fazilk398@gmail.com";
$subject = "New Contact Form Submission";

// Prepare the message text
$txt = "Name: " . htmlspecialchars($name) . "\r\n" .
       "Email: " . htmlspecialchars($email) . "\r\n" .
       "Phone: " . htmlspecialchars($number) . "\r\n" .
       "Message: " . htmlspecialchars($message);

// Set headers
$headers = "From: fazilk398@gmail.com" . "\r\n" .
           "CC: coolfazil28@gmail.com";

// Send the email if the email address is valid
if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (mail($to, $subject, $txt, $headers)) {
        // Redirect to last.html on success
        header("Location: last.html");
        exit(); // Always call exit after a header redirect
    } else {
        // Log the error or redirect back with an error message
        header("Location: form.php?error=mail_failed");
        exit();
    }
} else {
    // Redirect back with an error message
    header("Location: form.php?error=invalid_email");
    exit();
}
?>
