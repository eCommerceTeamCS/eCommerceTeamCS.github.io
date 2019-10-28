<?php
//$message = wordwrap($message,70);
//mail($email,"LitKits",$message);

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require '../vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'litkitsco@gmail.com';
//Password to use for SMTP authentication
$mail->Password = 'litkits2020!!';
//Set who the message is to be sent from
$mail->setFrom('litkitsco@gmail.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('litkitsco@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('litkitsco@gmail.com', 'First Last');
//Set the subject line
$mail->Subject = 'Thanks for registering with us!';

$mail->Body = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors

if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'Message sent!';
 ?>
