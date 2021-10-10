<?php


class Service_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function addEquipment($name, $price,  $dateAcquired)
    {
        $columns = array('Name', 'Price', 'Date_Acquired');
        $values = array($name, $price,  $dateAcquired);
        $result = $this->db->insert("equipment", $columns, $values);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getEquipmentDetails()
    {
        $result = $this->db->select("*", "equipment", "Null");
        return $result;
    }
}
