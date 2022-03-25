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

        $_SESSION['itemDetails'] = $this->model->getItemDetails();
        $_SESSION['equipmentDetails'] = $this->model->getEquipmentDetails();
        $_SESSION['teamDetails'] = $this->model->getTeamDetails();
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('admin/Equipment');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/Equipment');
        }
    }

    function addNewCategory()
    {
        if ($_SESSION['role'] == "systemadmin") {
            $category = $_POST['category'];
            $this->model->addCategory($category);
            header("Location: /service/equipment");
        }
    }

    function addNewEquipment()
    {
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {

            //get POST data
            $itemID = $_POST['item_id'];
            $name = $_POST['name'];
            $itemCode = $_POST['itemCode'];
            $price = $_POST['price'];
            $dateAcquired = $_POST['dateAcquired'];

            if (isset($itemID)  && isset($name) && isset($itemCode) && isset($price) &&  isset($dateAcquired)) {

                //store equipment
                if ($this->model->addEquipment($itemID, $name, $itemCode, $price, $dateAcquired)) {

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


    function markReturn($eqId)
    {
        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->returnEquipment($eqId)) {
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
        $_SESSION['vehicleTypes'] = $this->model->getVehicle();
        $_SESSION['servicePrice'] = $this->model->getServicePrice();
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('admin/Service');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/Service');
        }
    }

    function addWashPackage()
    {
        $name = $_POST['washpackagename'];
        $description = $_POST['description'];

        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->addService($name, $description)) {
                header("Location: /service/washPackage");
            }
        }
    }

    function editWashPackage($washPackgeID)
    {

        $description = $_POST['description'];

        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->editService($washPackgeID, $description)) {
                header("Location: /service/washPackage");
            }
        }
    }

    function deleteWashPackage($washPackgeID)
    {

        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->deleteService($washPackgeID)) {
                header("Location: /service/washPackage");
            }
        }
    }

    function addVehicleType()
    {

        $name = $_POST['vehicleName'];

        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->addVehicle($name, $_SESSION['washpackages'])) {
                header("Location: /service/washPackage");
            }
        }
    }

    function deleteVehicleType($vehicleName)
    {

        $vehicleName = str_replace('_', ' ', $vehicleName);
        $vehicleName = str_replace('|', '-', $vehicleName);

        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->deleteVehicle($vehicleName)) {
                header("Location: /service/washPackage");
            }
        }
    }

    function addPrice($washPackageID, $vehicleName, $price)
    {
        if ($_SESSION['role'] == "systemadmin") {
            if ($this->model->insertPrice($washPackageID, $vehicleName, $price)) {
                header("Location: /service/washPackage");
            }
        }
    }
}
