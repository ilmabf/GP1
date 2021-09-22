<?php
require 'libs/mailer.php';

session_start();
$_SESSION['error'] = '';
$_SESSION['changePwdVerifyBox'] = 0;

class User extends Controller{

    function __construct(){
        parent::__construct();
    }

    function login(){
        $this->view->render('userLogin');
    }

    function passwordReset(){
        $this->view->render('userForgotPwd');
    }

    function passwordChange(){

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
                $output.='<p><a href="http://www.wandiwash.com/user/goToEnterNewPassword/'.$key.'/'.$email.'">Click Here</a></p>';		
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

                if($mail->mailto($subject,$email,$body)){
                    $_SESSION['changePwdVerifyBox'] = 1;
                    $this->view->render('userForgotPwd');
                }
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
        if(!isset($_POST['login']) && $_SESSION['login'] != "loggedin"){
            header("Location: login");
        }
        
        if($_SESSION['login'] == "loggedin"){
            if($this->model->checkCustomer($_SESSION['usernameemail'])){
                $_SESSION["role"] = "customer";
                $value = $this->model->checkVerified($_SESSION['usernameemail']);
                if($value[0]['Verified'] == "1"){
                    $_SESSION['Verified'] = "True";
                    $this->view->render('customerHome');
                    exit;
                }
                else{
                    $_SESSION['Verified'] = "False";
                    $this->view->render('customerVerify');
                    exit;
                }
            }
            else if($this->model->checkManager($_SESSION['usernameemail'])){
                $_SESSION["role"] = "manager";
                $this->view->render('managerHome');
                exit;
            }
            else if($this->model->checkSTL($_SESSION['usernameemail'])){
                $_SESSION["role"] = "stl";
                $this->view->render('stlHome');
                exit;
            }
            else{
                $_SESSION["role"] = "systemadmin";
                $this->view->render('systemAdminHome');
                exit;
            }
        }

        $uname = $_POST['usernameemail'];
        $pwd = $_POST['pwd'];

        if($this->model->authenticate($uname, $pwd)){
            
            $_SESSION['time'] = date("h:i:sa");
            $_SESSION['login'] = "loggedin";
            $_SESSION['usernameemail'] = $uname;
            echo $_SESSION['usernameemail'];
            if($this->model->checkCustomer($uname)){
                $_SESSION['role'] = "customer";
                $value = $this->model->checkVerified($uname);
                if($value[0]['Verified'] == "1"){
                    $_SESSION['Verified'] = "True";
                    $this->view->render('customerHome');
                }
                else{
                    $_SESSION['Verified'] = "False";
                    $this->view->render('customerVerify');
                }
            }
            else if($this->model->checkManager($uname)){
                $_SESSION['role'] = "manager";
                $this->view->render('managerHome');
            }
            else if($this->model->checkSTL($uname)){
                $_SESSION['role'] = "stl";
                $this->view->render('stlHome');
            }
            else{
                $_SESSION['role'] = "systemadmin";
                $this->view->render('systemAdminHome');
            }
        }
        else{
            $_SESSION['error'] = 'The email and password <br> that you entered did not match <br> our records.';
            $this->view->render('userLogin');
        }
    }
}