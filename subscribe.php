<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
$country = htmlspecialchars(trim($_POST['country'] ?? ''), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);

if ($name === '' || $country === '' || !$email) {
    header('Location: index.php?subscribe=invalid');
    exit();
}

$mail = new PHPMailer(true);

try {
    $smtpHost = getenv('SMTP_HOST') ?: 'mail.newharvestfellowshipchurch.tz';
    $smtpUser = getenv('SMTP_USER') ?: 'info@newharvestfellowshipchurch.tz';
    $smtpPass = getenv('SMTP_PASS') ?: 'DS8ywrFb8TGLDYw';
    $smtpPort = (int) (getenv('SMTP_PORT') ?: 587);
    $toEmail = getenv('MAIL_TO') ?: 'info@newharvestfellowshipchurch.tz';

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtpPort;

    $mail->setFrom($smtpUser, 'NHFC Newsletter');
    $mail->addAddress($toEmail, 'NHFC Newsletter Desk');
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'New newsletter subscription';
    $mail->Body = "<strong>Name:</strong> {$name}<br>
    <strong>Country:</strong> {$country}<br>
    <strong>Email:</strong> {$email}";
    $mail->AltBody = "Name: {$name}\nCountry: {$country}\nEmail: {$email}";

    $mail->send();
    header('Location: index.php?subscribe=success');
    exit();
} catch (Exception $e) {
    header('Location: index.php?subscribe=failed');
    exit();
}
