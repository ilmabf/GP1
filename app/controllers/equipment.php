<?php

session_start();
$_SESSION['insertSuccess'] = '';

class Equipment extends Controller{

    function __construct(){
        parent::__construct();
    }
    function adminManageEquipment(){
        $result = $this->model->getEquipmentDetails();
        $_SESSION['equipmentDetails'] = $result;
        $this->view->render('adminManageEquipment');
    }
 
    function addNewEquipment(){

        $name = $_POST['name'];
        $price = $_POST['price'];
        $dateAcquired = $_POST['dateAcquired'];

        if(isset($name) && isset($price) &&  isset($dateAcquired) ) {
            //$equipmentInsertResult = $this->model->addEquipment($name, $price, $dateAcquired);
            if($this->model->addEquipment($name, $price, $dateAcquired)){
                $_SESSION['insertSuccess'] = 'Equipment added successfully';
                header("Location: /equipment/adminManageEquipment");
            }
        }else{
            echo "Errorrrr";
        }
    }
 
}