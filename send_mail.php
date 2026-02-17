<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Extract fields from nested array structure
$firstName = htmlspecialchars(trim($_POST['field_name']['value'] ?? ''));
$lastName = htmlspecialchars(trim($_POST['field_name']['last'] ?? ''));
$email = filter_var(trim($_POST['field_email']['value'] ?? ''), FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars(trim($_POST['field_message']['value'] ?? ''));
$phone = htmlspecialchars(trim($_POST['field_phone']['value'] ?? ''));


// Combine name parts
$name = trim($firstName . ' ' . $lastName);
$subject = "New message from contact form";

// Validation
if (!$name || !$email || !$message) {
    exit("All fields are required and must be valid.");
}

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'mail.newharvestfellowshipchurch.tz';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@newharvestfellowshipchurch.tz';
    $mail->Password = 'DS8ywrFb8TGLDYw';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender & recipient
    $mail->setFrom('info@newharvestfellowshipchurch.tz', 'New Harvest Website');
    $mail->addAddress('info@newharvestfellowshipchurch.tz', 'Pastor Jacob');
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "<strong>Name:</strong> {$name} 🌟<br>
    <strong>Email:</strong> {$email} 📧<br>
    <strong>Phone:</strong> {$phone} 📞<br><br>" . nl2br($message) . "<br><br>
    <em>\"The Lord bless you and keep you; the Lord make his face shine on you and be gracious to you.\" - Numbers 6:24-25 🙏</em>";
               
    $mail->AltBody = "Name: {$name}\nEmail: {$email}\n\n{$message}\n\n\"The Lord bless you and keep you; the Lord make his face shine on you and be gracious to you.\" - Numbers 6:24-25";

    $mail->send();
    echo "Message sent successfully! ✉️🙏";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// Auto-refresh after 5 seconds
header("Refresh: 2; url=/index.php");
