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
            $this->view->render('admin/Equipment');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/Equipment');
        }
    }

    function washPackage()
    {
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('admin/Service');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/Service');
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
                echo "Error";
            }
        }
    }
    function editEquipment($eid,$team = null)
    {
     //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
             $eid = str_replace('_', ' ', $eid);

            if ($this->model->equipmentEdit($eid,$team)) {
                header("Location: /service/equipment");

             }
        }else {
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
        }else {
                echo "Error";
       }
   }
}
