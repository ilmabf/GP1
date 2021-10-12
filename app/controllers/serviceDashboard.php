<?php

class ServiceDashboard extends controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('StlDashboard');
    }
}
