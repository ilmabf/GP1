<?php
session_start();

class Signup extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('customer/Signup');
    }
}
