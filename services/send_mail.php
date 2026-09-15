
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

function sendMail(
    string $to,
    string $subject,
    string $body,
    string $replyTo = ''
): bool {

    $mail = new PHPMailer(true);

    try {

        // SMTP configuration
        $mail->isSMTP();

        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@gmail.com';
        $mail->Password   = 'YOUR_GMAIL_APP_PASSWORD';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender
        $mail->setFrom(
            'your-email@gmail.com',
            'Donutstec Website'
        );

        // Receiver
        $mail->addAddress(
            'your-email@gmail.com',
            'Donutstec'
        );

        // Reply to customer
        if (!empty($replyTo)) {
            $mail->addReplyTo($replyTo);
        }

        // Email content
        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->AltBody = strip_tags($body);

        return $mail->send();

    } catch (Exception $e) {

        error_log(
            'PHPMailer Error: ' . $mail->ErrorInfo
        );

        return false;
    }
}