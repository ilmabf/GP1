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
        // get customer vehicles
        $_SESSION['vehicles'] = $this->model->getVehicles($_SESSION['userDetails'][0]['User_ID']);
        $this->view->render('customer/Account');
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

    function editVehicle($vid){
        $vid = str_replace('_', ' ', $vid);
        $model = $_POST['model'];
        $color = $_POST['color'];
        $vehicleType = $_POST['type'];
        $manufacturer = $_POST['manufacturer'];

        $id = $_SESSION['userDetails'][0]['User_ID'];
        $values = array($model, $color, $vehicleType, $manufacturer);

        if ($this->model->vehicleEdit($id, $vid, $values)) {
            header("Location: /account/");
        }
    }

    function deleteVehicle($vid){
        $vid = str_replace('_', ' ', $vid);
        $id = $_SESSION['userDetails'][0]['User_ID'];
        if ($this->model->vehicleDelete($id, $vid)) {
            header("Location: /account/");
        }
    }
}
