<?php
session_start();

class Service extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function equipment()
    {
        $_SESSION['equipmentDetails'] = $this->model->getEquipmentDetails();

        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('adminEquipment');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('managerEquipment');
        }
    }

    function washPackage()
    {
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('adminService');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('managerService');
        }
    }

    function addNewEquipment()
    {
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {

            //get POST data
            $name = $_POST['name'];
            $price = $_POST['price'];
            $dateAcquired = $_POST['dateAcquired'];

            if (isset($name) && isset($price) &&  isset($dateAcquired)) {

                //store equipment
                if ($this->model->addEquipment($name, $price, $dateAcquired)) {
                    header("Location: /service/equipment");
                }
            } else {
                echo "Errorrrr";
            }
        }
    }
}
