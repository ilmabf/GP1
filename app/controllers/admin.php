<?php

class Admin extends Controller{

    function __construct(){
        parent::__construct();
    }

    function manageEmployee(){
        $this->view->render('adminManageEmployee');
    }

    function manageService(){
        $this->view->render('adminManageService');
    }

}