<?php

class AccountModel extends Model
{
    function vehicleAdd($values)
    {
        $columns = array('User_ID', 'VID', 'Model', 'Colour', 'Type', 'Manufacturer');
        $param = array(':userid', ':vid', ':model', ':color', ':type', ':manufacturer');
        // $result = $this->db->insert("customer_vehicle", $columns, $values);
        $result = $this->db->insertTwo("customer_vehicle", $columns, $param, $values);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getVehicles($uid)
    {
        $result = $this->db->selectTwo("*", "customer_vehicle", "WHERE User_ID = :uid ;", ':uid', $uid);
        return $result;
    }
}
