<?php
require 'libs/Mailer.php';
date_default_timezone_set("Asia/Colombo");
session_start();
$_SESSION['error'] = '';
$_SESSION['changePwdVerifyBox'] = 0;

class User extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function logout()
    {
        //destroy session variables
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/');
        session_regenerate_id(true);
        header("Location: /");
    }

    function passwordReset()
    {
        $this->view->render('user/ForgotPwd');
    }

    function passwordChange()
    {
        if (!isset($_POST["email_to_send_pwd"])) {
            header("Location: /login");
        }

        //get email
        $email = $_POST["email_to_send_pwd"];

        if ($this->model->passwordExists($email)) {

            //set expiration date for key
            $expFormat = mktime(
                date("H"),
                date("i"),
                date("s"),
                date("m"),
                date("d") + 1,
                date("Y")
            );

            $expDate = date("Y-m-d H:i:s", $expFormat);

            //generate key
            $key = md5(2418 * 2 . $email);
            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
            $key = $key . $addKey;

            //store temperory key
            if ($this->model->insertToPwdTemp($email, $key, $expDate)) {

                //send password reset email
                $mail = new Mailer();

                $output = '<p>Dear user,</p>';
                $output .= '<p>Please click on the following link to reset your password.</p>';
                $output .= '<p>-------------------------------------------------------------</p>';
                $output .= '<p><a href="http://www.wandiwash.com/user/EnterNewPassword/' . $key . '/' . $email . '">Click Here</a></p>';
                $output .= '<p>-------------------------------------------------------------</p>';
                $output .= '<p>Make sure to copy the entire link into your browser.
                The link will expire after 24 hours for security reasons.</p>';
                $output .= '<p>If you did not request a password reset, no action 
                is needed, your password will not be reset. However, you may want to log into 
                your account and change your security password as someone may have guessed it.</p>';
                $output .= '<p>Thanks,</p>';
                $output .= '<p>WandiWash</p>';
                $body = $output;
                $subject = "Password Recovery - wandiwash.com";

                if ($mail->mailto($subject, $email, $body)) {
                    $_SESSION['changePwdVerifyBox'] = 1;
                    $this->view->render('user/ForgotPwd');
                }
            } else {
                echo "insertion error";
            }
        } else {
            $_SESSION['error'] = 'Sorry, we couldn\'t find that email<br>within our records';
            $this->view->render('user/ForgotPwd');
        }
    }

    function EnterNewPassword($key, $email)
    {

        $curDate = date("Y-m-d H:i:s");

        //validate key
        if ($this->model->checkPasswordResetKey($key, $email)) {

            //get expiration date of key
            $date = $this->model->getPasswordResetExpDate($key, $email);
            if ($date[0]['expDate'] >= $curDate) {
                $_SESSION['email'] = $email;
                $this->view->render('user/ChangePwd');
            } else {
                echo "Link expired";
            }
        } else echo "URL incorrect";
    }

    function updatePassword()
    {
        if (!isset($_POST['confirm_new_pwd'])) {
            header("Location: /login");
        }

        //get email and new password
        $email = $_SESSION['email'];
        $newPassword = $_POST["new_pwd"];

        //password hashing
        $options = ['cost' => 12];
        $hashedpwd = password_hash($newPassword, PASSWORD_BCRYPT, $options);

        //update password
        $this->model->updateUserPassword($email, $hashedpwd);
        $this->model->deletePwdTempTable($email);

        $_SESSION['login'] = "loggedin";
        $_SESSION['usernameemail'] = $email;

        if ($this->model->checkCustomer($email)) {

            //get customer details
            $Details = $this->model->getCustDetails($email);
            $_SESSION['userDetails'] = $Details;

            //get customer vehicles
            $vehicles = $this->model->getVehicles($_SESSION['userDetails'][0]['User_ID']);
            $_SESSION['vehicles'] = $vehicles;

            //assign user role
            $_SESSION['role'] = "customer";

            //check customer verification status
            $value = $this->model->checkVerified($email);
            if ($value[0]['Verified'] == "1") {
                $_SESSION['Verified'] = "True";
            } else {
                $_SESSION['Verified'] = "False";
                $this->view->render('customer/Verify');
                exit;
            }
        } else if ($this->model->checkManager($email)) {
            //assign user role
            $_SESSION['role'] = "manager";
        } else if ($this->model->checkSTL($email)) {
            //assign user role
            $_SESSION['role'] = "stl";
        } else {
            //assign user role
            $_SESSION['role'] = "systemadmin";
        }
        header("Location: /user/home");
    }

    function home()
    {
        //redirect to login if not logged in or login button in not clicked
        if (!isset($_POST['login']) && !isset($_SESSION['login'])) {
            header("Location: /login");
        }

        //if already logged in redirect according to user roles
        if (isset($_SESSION['login'])) {
            if ($_SESSION['role'] == "customer") {
                $this->view->render('customer/Home');
                exit;
            } else if ($_SESSION['role'] == "manager") {
                $this->view->render('manager/Home');
                exit;
            } else if ($_SESSION['role'] == "stl") {
                $this->view->render('stl/Home');
                exit;
            } else {
                $this->view->render('admin/Home');
                exit;
            }
        }

        //get POST data from login page
        $uname = $_POST['usernameemail'];
        $pwd = $_POST['pwd'];

        //authenticate user
        if ($this->model->authenticate($uname, $pwd)) {

            //set session variables
            $_SESSION['login'] = "loggedin";
            $_SESSION['usernameemail'] = $uname;

            if ($this->model->checkCustomer($uname)) {

                //get customer details
                $details = $this->model->getCustDetails($uname);
                $_SESSION['userDetails'] = $details;

                //get customer vehicles
                $vehicles = $this->model->getVehicles($_SESSION['userDetails'][0]['User_ID']);
                $_SESSION['vehicles'] = $vehicles;

                //assign user role
                $_SESSION['role'] = "customer";

                //check customer verification status
                $value = $this->model->checkVerified($uname);
                if ($value[0]['Verified'] == "1") {
                    $_SESSION['Verified'] = "True";
                    $this->view->render('customer/Home');
                } else {
                    $_SESSION['Verified'] = "False";
                    $this->view->render('customer/Verify');
                }
            } else if ($this->model->checkManager($uname)) {
                //assign user role
                $_SESSION['role'] = "manager";
                $this->view->render('manager/Home');
            } else if ($this->model->checkSTL($uname)) {
                //assign user role
                $_SESSION['role'] = "stl";
                $this->view->render('stl/Home');
            } else {
                //assign user role
                $_SESSION['role'] = "systemadmin";
                $this->view->render('admin/Home');
            }
        } else {
            $_SESSION['error'] = 'The email and password that you entered did not match our records.';

            //lock user if there are more than three failed attempts
            $_SESSION["login_failed"] = 1;
            if (isset($_SESSION['login_failed'])) {
                if (!isset($_SESSION["login_attempts"])) {
                    $_SESSION["login_attempts"] = 1;
                } else {
                    $_SESSION["login_attempts"] += 1;
                }
                if ($_SESSION["login_attempts"] > 2) {
                    $_SESSION["locked"] = time();
                }
            }

            header("Location: /login");
        }
    }
}
