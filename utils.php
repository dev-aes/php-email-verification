<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require 'db.php';

/**
 *  Send an auth token for email verification
 */

function sendToken(string $smtp_host, string $smtp_username, string $smtp_password, int $smtp_port, string $recipient, string $subject, string $message) 
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $smtp_host;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $smtp_username;                     //SMTP username
        $mail->Password   = $smtp_password;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $smtp_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($smtp_username, 'Webmaster');
        $mail->addAddress($recipient);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return 'Your account has been registered. To login you need a fully verified account. A verification message has been sent to your email address';
    } 

    catch (\Exception $e) 
    {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


// handle Login




// handle registration
if(isset($_POST['register'])) 
{
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $password_confirmation = htmlentities($_POST['password_confirmation']);

    if($password !== $password_confirmation) {
        echo "<script>alert('Invalid Password')</script>";
        echo "<script>location.href='index.php'</script>";
    }

    $token = uniqid();

    $sql = "INSERT INTO users (name, email, password, token)
    VALUES ('$name', '$email', '$password', '$token')";

    if (mysqli_query($conn, $sql)) 
    {
        $smtp_host = 'smtp.gmail.com';
        $smtp_username = 'phcorneruser@gmail.com';
        $smtp_password = 'phcorneruser2022';
        $smtp_port = 465;
        $recipient = $email;
        $subject = "Account Update";


        $redirect_path = "<a href='http://localhost/email_verification/verify.php?token=$token'>Click here</a>";

        $message = "Thank you for waiting.Your account has been registered. To login you need a fully verified account. 
                     $redirect_path to verify your email address, again thank you for submitting your query have a great day!";

                    
        // trigger 
       $_SESSION['success']  = sendToken(
                                    $smtp_host,
                                    $smtp_username,
                                    $smtp_password,
                                    $smtp_port,
                                    $recipient,
                                    $subject,
                                    $message
                                );


    } 
    
    else 
    {
        $_SESSION['error'] = "Something went wrong!";
    }

    mysqli_close($conn);
    header('location:index.php');

}




























?>