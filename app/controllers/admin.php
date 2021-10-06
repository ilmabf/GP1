<?php

class Admin extends Controller{

    function __construct(){
        parent::__construct();
    }

    function manageService(){
        $this->view->render('adminManageService');
    }

}