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
        if ($_SESSION['role'] == "customer") {
            // get customer details
            $_SESSION['userDetails'] = $this->model->getCustDetails($_SESSION['userDetails'][0]['User_ID']);
            $_SESSION['vehicles'] = $this->model->getVehicles($_SESSION['userDetails'][0]['User_ID']);
            $_SESSION['address'] = $this->model->getAddress($_SESSION['userDetails'][0]['User_ID']);

            $this->view->render('customer/Account');
        }
    }

    function editMobile()
    {
        if ($_SESSION['role'] == "customer") {
            if (!isset($_POST['mobile'])) {
                header("Location: /account/");
                exit;
            }
            $newMobile = $_POST['mobile'];
            if ($this->model->checkMobile($newMobile)) {
                $_SESSION['Error'] = "Sorry, that mobile number already exists for another account";
                header("Location: /account/");
                exit;
            }
            $this->model->editMobileNum($newMobile, $_SESSION['userDetails'][0]['User_ID']);
            header("Location: /account/");
        }
    }

    function deleteAccount()
    {
        if ($_SESSION['role'] == "customer") {
            if (!isset($_POST['deleteAccountbtn'])) {
                header("Location: /account/");
                exit;
            }
            $this->model->deleteCustomerAccount($_SESSION['userDetails'][0]['User_ID']);
            header("Location: /user/logout");
        }
    }

    function addVehicle()
    {
        if ($_SESSION['role'] == "customer") {
            if (!isset($_POST['AddVehicleBtn'])) {
                header("Location: /account/");
                exit;
            }
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

    function editVehicle($vid)
    {
        if ($_SESSION['role'] == "customer") {
            if (!isset($_POST['EditVehicleBtn'])) {
                header("Location: /account/");
                exit;
            }
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
    }

    function deleteVehicle($vid)
    {
        if ($_SESSION['role'] == "customer") {
            $vid = str_replace('_', ' ', $vid);
            $id = $_SESSION['userDetails'][0]['User_ID'];
            if ($this->model->vehicleDelete($id, $vid)) {
                header("Location: /account/");
            }
        }
    }

    function saveAddress($address, $latitude, $longitude)
    {

        if ($_SESSION['role'] == "customer") {
            $address = str_replace('_', ' ', $address);
            $address = str_replace('|', '/', $address);
            // echo $address;
            // echo $latitude;
            // echo $longitude;
            $id = $_SESSION['userDetails'][0]['User_ID'];
            if ($this->model->addressAdd($id, $address, $latitude, $longitude)) {
                header("Location: /account/");
            }
        }
    }

    function deleteAddress($latitude, $longitude)
    {
        if ($_SESSION['role'] == "customer") {
            // $address = str_replace('_', ' ', $address);
            // $address = str_replace('|', '/', $address);
            // echo $address;
            $id = $_SESSION['userDetails'][0]['User_ID'];
            if ($this->model->addressDelete($id, $latitude, $longitude)) {
                header("Location: /account/");
            }
        }
    }
}
