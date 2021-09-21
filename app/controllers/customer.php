<?php

    require 'libs/mailer.php';

    session_start();
    $_SESSION['error'] = '';
    $_SESSION['flag'] = 0;
<<<<<<< HEAD
    $_SESSION['verifyBox'] = 0; 
=======
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
    
class Customer extends Controller{

    function __construct(){
        parent::__construct();
    }

    function signup(){
        $this->view->render('customerSignup');
    }

    function register(){
        
        $_SESSION["time"] = date("h:i:sa");

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $uname = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobilenumber'];
        $pwd = $_POST['pwd'];
        
        $array = array($uname, $email, $mobile);
        
        if($this->model->checkDuplicate($array)){
            $this->view->render('customerSignup');
            exit;
        }
        $options = ['cost' => 12];
        $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        $token = bin2hex(random_bytes(50));
        $result = $this->model->makeCustomer($fname, $lname, $uname, $email, $mobile, $hashedpwd, $token);
        $uid = $this->model->getCustID($uname);
<<<<<<< HEAD
        //echo "Echooo";
        //echo $uid[0]['User_ID'];
        
=======
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
        if($result){
            
            $mail=new Mailer();

            $output='<p>Dear User,</p>';
            $output.='<p>Welcome ';
            $output.= $fname . ' ' .$lname;
            $output.= ' to WandiWash!</p>';
            $output.='<p>We are glad you could join us!</p>';
            $output.='<p>Now that you are registered, you can obtain our car wash services at your venue!</p>';
            $output.='<p>Check our our website to know more about service packages and available times.</p>';
            $output.='<p>Click below to verify your account.</p>';	
            $output.='<p>------------------------------------------------------------</p>';		
            $output.='<p><a href="http://www.wandiwash.com/customer/verify/'.$uid[0]['User_ID']. '/'.$token . '">Click Here!</a></p>';
            $output.='<p>------------------------------------------------------------</p>';		
            $output.='<p>Thank you for registering,</p>';
            $output.='<p>WandiWash.</p>';
            $body = $output; 
            $subject = "Welcome to WandiWash!";

<<<<<<< HEAD
            if($mail->mailto($subject,$email,$body)){
                $_SESSION['verifyBox'] = 1;
                $this->view->render('customerSignup');
            }
=======
            $mail->mailto($subject,$email,$body);
            $this->view->render('customerVerify');
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
        }
        
    }

    function verify($uid, $token){
        if($this->model->checkToken($uid, $token)){

            $_SESSION["time"] = date("h:i:sa");
            $_SESSION["login"] = "loggedin";

            $this->view->render('customerHome');
        } 
    }

<<<<<<< HEAD
    function bookAwash() {
        $this->view->render('customerBookAWash');
    }

=======
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
}

