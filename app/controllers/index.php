<?php
    class Index extends Controller{

        function __construct(){
            parent::__construct();
        }

        function index(){
            $this->view->render('userHome');
        }
<<<<<<< HEAD
=======

        function logout(){
            session_destroy();
            header("Location: /");
        }

>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
    }
?>
