<?php

class Account_Model extends Model
{
    function vehicleAdd($values)
    {
        $columns = array('User_ID', 'VID', 'Model', 'Colour', 'Type', 'Manufacturer');
        $result = $this->db->insert("customer_vehicle", $columns, $values);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getVehicles($uid)
    {
        $result = $this->db->select("*", "customer_vehicle", "WHERE User_ID = '$uid';");
        return $result;
    }
}
