<?php

class Admin extends Controller{

    function __construct(){
        parent::__construct();
    }

    function manageEmployee(){
        $this->view->render('adminManageEmployee');
    }
<<<<<<< HEAD
   
=======

    function manageService(){
        $this->view->render('adminManageService');
    }

>>>>>>> 69070d4877a3aed7e97625db61962db7e10f0cce
}