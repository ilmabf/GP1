<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

    class Mailer{
        public function mailto($subject,$to,$body){
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 1;
            $mail->Host = 'smtp.hostinger.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'hello@wandiwash.com';
            $mail->Password = 'Abuwandiwash123@.com';
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
                return true;
            }
        }
    }
