<?php

session_start();
class Account extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // $uname = $_SESSION['usernameemail'];
        // $result = $this->model->getCustDetails($uname);
        // $_SESSION['userDetails'] = $result;
        // print_r($_SESSION['userDetails']);
        $_SESSION['vehicles'] = $this->model->getVehicles($_SESSION['userDetails'][0]['User_ID']);
        $this->view->render('customerAccount');
    }

    function addVehicle()
    {
        $vin = $_POST['vin'];
        $model = $_POST['model'];
        $color = $_POST['color'];
        $vehicleType = $_POST['vehicleType'];
        $manufacturer = $_POST['manufacturer'];
        $id = $_SESSION['userDetails'][0]['User_ID'];
        $values = array($id, $vin, $model, $color, $vehicleType, $manufacturer);
        if ($this->model->vehicleAdd($values)) {
            header("Location: /account/");
        }
    }
}
