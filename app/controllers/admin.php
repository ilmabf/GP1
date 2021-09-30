<?php

class Admin extends Controller{

    function __construct(){
        parent::__construct();
    }

    function manageEmployee(){
        $this->view->render('adminManageEmployee');
    }
   
}