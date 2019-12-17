<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Load Composer's autoloader
// require 'vendor/autoloa/d.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($_POST['name'])){
    $name=$_POST['name']; // Get Name value from HTML Form
    $email=$_POST['mail'];  // Get Email Value
    $message=$_POST['comment']; // Get Message Value

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
    $mail->Username = 'diahshintad@gmail.com';
    //Password to use for SMTP authentication
    $mail->Password = 'waterlotus098';
    //Set who the message is to be sent from
    $mail->setFrom('diahshintad@gmail.com', 'First Last');
    //Set an alternative reply-to address
    $mail->addReplyTo('diahshintad@gmail.com', 'First Last');
    //Set who the message is to be sent to
    $mail->addAddress($email, 'John Doe');
    //Set the subject line
    $mail->Subject = 'PHPMailer GMail SMTP test';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';

    $mail->Body = "
    <html>
        <body>
            <table style='width:600px;'>
                <tbody>
                    <tr>
                        <td style='width:150px'><strong>Name: </strong></td>
                        <td style='width:400px'>$name</td>
                    </tr>
                    <tr>
                        <td style='width:150px'><strong>Email ID: </strong></td>
                        <td style='width:400px'>$email</td>
                    </tr>
                    <tr>
                        <td style='width:150px'><strong>Message: </strong></td>
                        <td style='width:400px'>$message</td>
                    </tr>
                </tbody>
            </table>
        </body>
    </html>
    ";
    //Attach an image file
    // $mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: '. $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }
}
?>