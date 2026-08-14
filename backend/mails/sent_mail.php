<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Prefer Composer autoload if installed.
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} else {
    // Fallback for a manual PHPMailer installation.
    $phpMailerBase = __DIR__ . '/../PHPMailer/src';

    if (!file_exists($phpMailerBase . '/PHPMailer.php')) {
        $phpMailerBase = __DIR__ . '/../../PHPMailer/src';
    }

    if (!file_exists($phpMailerBase . '/PHPMailer.php')) {
        die('PHPMailer library not found. Please install Composer dependencies or place the PHPMailer folder correctly.');
    }

    require_once $phpMailerBase . '/PHPMailer.php';
    require_once $phpMailerBase . '/SMTP.php';
    require_once $phpMailerBase . '/Exception.php';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $company = $_POST['company'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $service = $_POST['service'] ?? '';
    $budget = $_POST['budget'] ?? '';
    $message = $_POST['message'] ?? '';

    $mail = new PHPMailer(true);

   try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'donutstec@gmail.com'; // Your Gmail
        $mail->Password   = 'epbb uxpj qplg qxgd';   // Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;


        // Sender and recipient
        $mail->setFrom('info@codewithtec.com', 'Website Contact Form');
        $mail->addAddress('donutstec@gmail.com'); // Recipient email

        /* Attach all uploaded files
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
    $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
} else {
    echo "⚠️ File not uploaded. Error code: " . $_FILES['attachment']['error'];
}
    */
       
        // Email content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission";
        $mail->Body    = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 0 auto; background-color: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, rgb(7, 0, 139) 0%, #14048b 100%); color: #fff; padding: 20px; text-align: center; }
        .header h2 { margin: 0; font-size: 24px; }
        .content { padding: 30px; }
        .section { margin-bottom: 20px; }
        .section-title { font-weight: bold; color: rgb(1, 8, 135); font-size: 14px; text-transform: uppercase; margin-bottom: 5px; }
        .section-value { background-color: #f9f9f9; padding: 12px; border-left: 4px solid rgb(21, 2, 147); border-radius: 3px; }
        .footer { background-color: #f9f9f9; padding: 15px 30px; text-align: center; font-size: 12px; color: #777; border-top: 1px solid #e0e0e0; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>📩 New Contact Form Submission</h2>
        </div>
        <div class='content'>
            <div class='section'>
                <div class='section-title'>Name</div>
                <div class='section-value'>$name</div>
            </div>
            <div class='section'>
                <div class='section-title'>Email</div>
                <div class='section-value'>$email</div>
            </div>
            <div class='section'>
                <div class='section-title'>Phone</div>
                <div class='section-value'>$phone</div>
            </div>
            <div class='section'>
                <div class='section-title'>Company</div>
                <div class='section-value'>$company</div>
            </div>
            <div class='section'>
                <div class='section-title'>Service</div>
                <div class='section-value'>$service</div>
            </div>
            <div class='section'>
                <div class='section-title'>Budget</div>
                <div class='section-value'>$budget</div>
            </div>
            <div class='section'>
                <div class='section-title'>Subject</div>
                <div class='section-value'>$subject</div>
            </div>
            <div class='section'>
                <div class='section-title'>Message</div>
                <div class='section-value'>" . nl2br($message) . "</div>
            </div>
        </div>
        <div class='footer'>
            <p>This message was sent from your website contact form.</p>
        </div>
    </div>
</body>
</html>
";


        //     <h3>New Message from <br>$name</h3>
        //     <h3>Subject: $subject</h3>
        //     <p><strong>Email:</strong> $email</p>
        //     <p><strong>Message:</strong><br>$message</p>
        // ";

        // Send email
        $mail->send();

        // echo "thanks for the mail";
        // Reirect after success 
        header("Location: /success-contact");
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}


?>




