<?php

class AccountModel extends Model
{
    function vehicleAdd($values)
    {
        $columns = array('User_ID', 'VID', 'Model', 'Colour', 'Type', 'Manufacturer');
        $param = array(':userid', ':vid', ':model', ':color', ':type', ':manufacturer');
        // $result = $this->db->insert("customer_vehicle", $columns, $values);
        $result = $this->db->insert("customer_vehicle", $columns, $param, $values);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function getVehicles($uid)
    {
        $result = $this->db->select("*", "customer_vehicle", "WHERE User_ID = :uid ;", ':uid', $uid);
        return $result;
    }

    function vehicleEdit($uid, $vid, $columnValue)
    {
        $columns = array('Model', 'Colour', 'Type', 'Manufacturer');
        $param = array(':model', ':color', ':type', ':manufacturer');

        $conditionParam = array(':uid', ':vid');
        $conditionValue = array($uid, $vid);
        $result = $this->db->update("customer_vehicle", $columns, $param, $columnValue, $conditionParam, $conditionValue, "WHERE (User_ID = :uid AND VID = :vid);");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function vehicleDelete($uid, $vid)
    {
        $result = $this->db->delete("customer_vehicle", "WHERE ( User_ID = :uid AND VID = :vid );", array(':uid', ':vid'), array($uid, $vid));
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function addressAdd($id, $address, $latitude, $longitude)
    {
        $values = array($id, $address, $latitude, $longitude);
        $columns = array('User_ID','Address', 'Latitude', 'Longitude');
        $param = array(':userid',':addr', ':lat', ':lng');
        $result = $this->db->insert("customer_location", $columns, $param, $values);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function getAddress($uid){
        $result = $this->db->select("Address", "customer_location", "WHERE User_ID = :uid ;", ':uid', $uid);
        return $result;
    }
}
