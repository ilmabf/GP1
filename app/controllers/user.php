<?php
<<<<<<< HEAD
// echo getcwd();
=======
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
require 'libs/mailer.php';

session_start();
$_SESSION['error'] = '';
<<<<<<< HEAD
$_SESSION['changePwdVerifyBox'] = 0;
=======
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225

class User extends Controller{

    function __construct(){
        parent::__construct();
    }

    function login(){
        $this->view->render('userLogin');
    }

    function reviews(){
        $this->view->render('userReviews');
    }

    function passwordReset(){
        $this->view->render('userForgotPwd');
    }

    function passwordChange(){

<<<<<<< HEAD
=======
        if(!isset($_POST['send_pwd_email'])){
            header("Location: login");
        }

>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
        $email = $_POST["email_to_send_pwd"];

        if($this->model->passwordExists($email)){

            $expFormat = mktime(
                date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
            );

            $expDate = date("Y-m-d H:i:s",$expFormat);
            $key = md5(2418*2+$email);
            $addKey = substr(md5(uniqid(rand(),1)),3,10);
            $key = $key . $addKey;

            if($this->model->insertToPwdTemp($email,$key,$expDate)){

                $mail=new Mailer();
                
                $output='<p>Dear user,</p>';
                $output.='<p>Please click on the following link to reset your password.</p>';
                $output.='<p>-------------------------------------------------------------</p>';
<<<<<<< HEAD
                $output.='<p><a href="http://www.wandiwash.com/user/goToEnterNewPassword/'.$key.'/'.$email.'">Click Here</a></p>';		
=======
                $output.='<p><a href="http://www.wandiwash.com/user/goToEnterNewPassword/'.$key.'/'.$email.'">
                https://www.wandiwash.com/user/goToEnterNewPassword
                ?key='.$key.'&email='.$email.'&action=reset</a></p>';		
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
                $output.='<p>-------------------------------------------------------------</p>';
                $output.='<p>Please be sure to copy the entire link into your browser.
                The link will expire after 1 day for security reason.</p>';
                $output.='<p>If you did not request this forgotten password email, no action 
                is needed, your password will not be reset. However, you may want to log into 
                your account and change your security password as someone may have guessed it.</p>';   	
                $output.='<p>Thanks,</p>';
                $output.='<p>WandiWash</p>';
                $body = $output; 
                $subject = "Password Recovery - wandiwash.com";

<<<<<<< HEAD
                if($mail->mailto($subject,$email,$body)){
                    $_SESSION['changePwdVerifyBox'] = 1;
                    $this->view->render('userForgotPwd');
                }
=======
                $mail->mailto($subject,$email,$body);
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
            }
            else{
                echo "insertion error";
            }

        }
        else{
            $_SESSION['error'] = 'We couldn\'t find that email<br>within our records';
            $this->view->render('userForgotPwd'); 
        }
    

    }

    function goToEnterNewPassword($key, $email){

            $curDate = date("Y-m-d H:i:s");

            if($this->model->checkPasswordResetKey($key, $email)){

                $date = $this->model->getPasswordResetExpDate($key, $email);
                if($date[0]['expDate'] >= $curDate ){
                    $_SESSION['email'] = $email;
                    $this->view->render('userChangePwd');
                }else{
                    echo "Link expired";
                }
            }
            else echo "URL incorrect";
        
    }

    function updatePassword(){
<<<<<<< HEAD
        
            $email = $_SESSION['email'];
            $newPassword = $_POST["new_pwd"];
            //echo $email;
            $options = ['cost' => 12];
            $hashedpwd = password_hash($newPassword, PASSWORD_BCRYPT, $options);

            if($this->model->updateUserPassword($email, $hashedpwd)){
                if($this->model->deletePwdTempTable($email)){
                    echo "Password changed";
                }else{
                    echo "Password not deleted";
                }
               
            }else{
                //echo"AAAAAAA";
            }
            
           
            $this->view->render('userHome'); 
        
    }

    function home(){
        $uname = $_POST['usernameemail'];
        $pwd = $_POST['pwd'];
        
=======
        if(!isset($_POST['confirm_new_pwd'])){
            header("Location: login");
        }
    
        $email = $_SESSION['email'];
        $newPassword = $_POST["new_pwd"];

        echo $email;
        $options = ['cost' => 12];
        $hashedpwd = password_hash($newPassword, PASSWORD_BCRYPT, $options);

        $this->model->updateUserPassword($email, $hashedpwd);
        $this->model->deletePwdTempTable($email);
        echo "Password changed";
        $this->view->render('userHome'); 
    }

    function home(){
        if(!isset($_POST['login'])){
            header("Location: login");
        }
        
        $uname = $_POST['usernameemail'];
        $pwd = $_POST['pwd'];

>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
        if($this->model->authenticate($uname, $pwd)){
            
            $_SESSION["time"] = date("h:i:sa");
            $_SESSION["login"] = "loggedin";
<<<<<<< HEAD

=======
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
            if($this->model->checkCustomer($uname)){
                $_SESSION["role"] = "customer";
                $value = $this->model->checkVerified($uname);
                if($value[0]['Verified'] == "1"){
                    $_SESSION['Verified'] = "True";
                    $this->view->render('customerHome');
                }
                else{
                    $_SESSION['Verified'] = "False";
                    $this->view->render('customerVerify');
                }
<<<<<<< HEAD

=======
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
            }
            else if($this->model->checkManager($uname)){
                $_SESSION["role"] = "manager";
                $this->view->render('managerHome');
            }
            else if($this->model->checkSTL($uname)){
                $_SESSION["role"] = "stl";
                $this->view->render('stlHome');
            }
            else{
                $_SESSION["role"] = "systemadmin";
                $this->view->render('systemAdminHome');
            }
        }
        else{
            $_SESSION['error'] = 'The email and password <br> that you entered did not match <br> our records.';
            $this->view->render('userLogin');
        }
    }
}