<?php
 
    require ("class.phpmailer.php");
 
    if(isset($_POST['name'])){
        $name=$_POST['name']; // Get Name value from HTML Form
        $email=$_POST['mail'];  // Get Email Value
        $message=$_POST['comment']; // Get Message Value
         
         
        $mail = new PHPMailer();
         
        $mail->IsSMTP();
        $mail->Host = "localhost"; // Your Domain Name
         
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = "diahshintad@gmail.com"; // Your Email ID
        $mail->Password = "waterlotus098"; // Password of your email id
         
        $mail->From ($email);
        $mail->FromName ($name);
        $mail->AddAddress ("diahshintad@gmail.com"); // On which email id you want to get the message
        $mail->AddCC ($email);
         
        $mail->IsHTML(true);
         
        $mail->Subject = "Enquiry from Website submitted by $name"; // This is your subject
         
        // HTML Message Starts here
         
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
        // HTML Message Ends here
         
             
        if(!$mail->Send()) {
            // Message if mail has been sent
            echo "<script>
                alert('Submission failed.');
            </script>";
        }
        else {
            // Message if mail has been not sent
            echo "<script>
                alert('Email has been sent successfully.');
            </script>";
        }
 
    }
?>