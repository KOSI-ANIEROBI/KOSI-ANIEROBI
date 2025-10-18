<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If using Composer

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'arejoicekosi@gmail.com';
    $mail->Password   = 'your-app-password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('arejoicekosi@gmail.com');
    $mail->addReplyTo($_POST['email'], $_POST['name']);

    // Content
    $mail->isHTML(false);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = "From: " . $_POST['name'] . "\n";
    $mail->Body   .= "Email: " . $_POST['email'] . "\n\n";
    $mail->Body   .= "Message:\n" . $_POST['message'];

    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
?>
