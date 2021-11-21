<?php
session_start();

class Service extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    // <------------------------------------- Equipment ------------------------------->
    function equipment()
    {
        $_SESSION['equipmentDetails'] = $this->model->getEquipmentDetails();

        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('admin/Equipment');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/Equipment');
        }
    }

    function addNewEquipment()
    {
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {

            //get POST data
            $item_id = $_POST['item_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $dateAcquired = $_POST['dateAcquired'];

            if (isset($item_id) && isset($name) && isset($price) &&  isset($dateAcquired)) {

                //store equipment
                if ($this->model->addEquipment($item_id,$name, $price, $dateAcquired)) {
                    header("Location: /service/equipment");
                }
            } else {
                echo "Error";
            }
        }
    }
    function editEquipment($eid, $team = null)
    {
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $eid = str_replace('_', ' ', $eid);

            if ($this->model->equipmentEdit($eid, $team)) {
                header("Location: /service/equipment");
            }
        } else {
            echo "Error";
        }
    }

    function deleteEquipment($eid)
    {
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {

            $eid = str_replace('_', ' ', $eid);

            if ($this->model->equipmentDelete($eid)) {
                header("Location: /service/equipment");
            }
        } else {
            echo "Error";
        }
    }


    // <------------------------------------- Service ------------------------------->
    function washPackage()
    {
        $_SESSION['washpackages'] = $this->model->getWashPackage();
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('admin/Service');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/Service');
        }
    }

    function addWashPackage(){
        $name = $_POST['washpackagename'];
        $description = $_POST['description'];

        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->addService($name, $description)) {
                header("Location: /service/washPackage");
            }
        }
    }

    function editWashPackage($washPackgeID){
        
        $description = $_POST['description'];

        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->editService($washPackgeID, $description)) {
                header("Location: /service/washPackage");
            }
        }
    }

    function deleteWashPackage($washPackgeID){
        
        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->deleteService($washPackgeID)) {
                header("Location: /service/washPackage");
            }
        }
    }
}
