<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['user_name']);
    $email = htmlspecialchars($_POST['user_email']);
    $message = htmlspecialchars($_POST['user_message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kalanakasun2001@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'jbgx baer algu itfb'; // Replace with your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('kalanakasun2001@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Us Message';
        $mail->Body    = "
            <html>
            <head>
                <title>Contact Us Message</title>
            </head>
            <body>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            </body>
            </html>
        ";

        $mail->send();
        echo '<script>
            alert("Message sent successfully!");
            window.location.href = "contact.php";
        </script>';
    } catch (Exception $e) {
        echo '<script>
            alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '");
            window.location.href = "contact.php";
        </script>';
    }
}
?>
