<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php?mail=invalid');
    exit();
}

// Extract fields from nested array structure
$firstName = htmlspecialchars(trim($_POST['field_name']['value'] ?? ''), ENT_QUOTES, 'UTF-8');
$lastName = htmlspecialchars(trim($_POST['field_name']['last'] ?? ''), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($_POST['field_email']['value'] ?? ''), FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars(trim($_POST['field_message']['value'] ?? ''), ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars(trim($_POST['field_phone']['value'] ?? ''), ENT_QUOTES, 'UTF-8');

$name = trim($firstName . ' ' . $lastName);
if ($name === '' || !$email || $message === '') {
    header('Location: contact.php?mail=invalid');
    exit();
}

$mail = new PHPMailer(true);

try {
    $smtpHost = getenv('SMTP_HOST') ?: 'mail.newharvestfellowshipchurch.tz';
    $smtpUser = getenv('SMTP_USER') ?: 'info@newharvestfellowshipchurch.tz';
    $smtpPass = getenv('SMTP_PASS') ?: 'DS8ywrFb8TGLDYw';
    $smtpPort = (int) (getenv('SMTP_PORT') ?: 587);
    $toEmail = getenv('MAIL_TO') ?: 'info@newharvestfellowshipchurch.tz';

    // Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtpPort;

    // Sender & recipient
    $mail->setFrom($smtpUser, 'New Harvest Website');
    $mail->addAddress($toEmail, 'NHFC Contact Desk');
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New message from contact form';
    $mail->Body = "<strong>Name:</strong> {$name}<br>
    <strong>Email:</strong> {$email}<br>
    <strong>Phone:</strong> {$phone}<br><br>" . nl2br($message) . "<br><br>
    <em>\"The Lord bless you and keep you; the Lord make his face shine on you and be gracious to you.\" - Numbers 6:24-25</em>";
    $mail->AltBody = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\n\n{$message}\n\n\"The Lord bless you and keep you; the Lord make his face shine on you and be gracious to you.\" - Numbers 6:24-25";

    $mail->send();
    header('Location: contact.php?mail=success');
    exit();
} catch (Exception $e) {
    header('Location: contact.php?mail=failed');
    exit();
}

