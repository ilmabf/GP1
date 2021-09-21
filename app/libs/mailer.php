<?php
use PHPMailer\PHPMailer\PHPMailer;
// echo getcwd();
require 'vendor/autoload.php';

    class Mailer{
        public function mailto($subject,$to,$body){
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'smtp.hostinger.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'hello@wandiwash.com';
            $mail->Password = 'wandiwashAbu@123.com';
            $mail->setFrom('hello@wandiwash.com', 'wandiwash');
            $mail->addReplyTo('wandiwash@gmail.com', 'wandiwash');
            $mail->addAddress($to); 
            $mail->isHTML(true);                                  
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);
            
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
<<<<<<< HEAD
                // echo 'The email message was sent.';
                return true;
=======
                echo 'The email message was sent.';
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
            }
        }
    }
    
    
    
?>