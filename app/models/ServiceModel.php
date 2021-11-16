<?php


class ServiceModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function addEquipment($name, $price,  $dateAcquired)
    {
        $columns = array('Name', 'Price', 'Date_Acquired');
        $param = array(':name', ':price', ':date');
        $values = array($name, $price,  $dateAcquired);
        $result = $this->db->insert("equipment", $columns, $param, $values);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getEquipmentDetails()
    {
        $result = $this->db->select("*", "equipment", "WHERE (Availability =1);");
        return $result;
    }
  
    function equipmentEdit($eid,$value)
    {
        $column='Team';
        $param=':team';
   
       $result = $this->db->update("equipment", $column, $param, $value, ':eid', $eid,"WHERE (Equipment_ID = :eid);");
        if ($result == "Success") {
            return true;
        } else print_r($result);

    }
    function equipmentDelete($eid)
    {
       
        $result = $this->db->update("equipment","Availability", ':availability', 0, ':eid', $eid,"WHERE (Equipment_ID = :eid);");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
}
