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
            $this->view->render('AdminEquipment');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('ManagerEquipment');
        }
    }

    function washPackage()
    {
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('AdminService');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('ManagerService');
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
