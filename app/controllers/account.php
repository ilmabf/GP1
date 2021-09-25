<?php
session_start();

class Account extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $uname = $_SESSION['usernameemail'];
        $result = $this->model->getCustDetails($uname);
        $_SESSION['userDetails'] = $result;
        $this->view->render('customerAccount');
    }
   
}