<?php


class Equipment_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function addEquipment($name, $price,  $dateAcquired){
        $columns = array('Name', 'Price', 'Date_Acquired');
        $values = array($name, $price,  $dateAcquired);
        $result = $this->db->insert("equipment", $columns, $values);
        return $result;
    }

    function getEquipmentDetails(){
        $result = $this->db->select("*", "equipment", "Null");
        return $result;
    }
}