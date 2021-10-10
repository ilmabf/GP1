<?php
session_start();

    class Index extends Controller{

        function __construct(){
            parent::__construct();
        }

        function index(){
            $this->view->render('userHome');
        }

        function logout(){
            session_unset();
            session_destroy();
            header("Location: /");
        }

    }
