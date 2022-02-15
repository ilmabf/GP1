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

    public function editMobileNum($newMob, $uid)
    {
        $result = $this->db->update("customer", "Contact_Number", ":mob", $newMob, ":uid", $uid, "WHERE User_ID = :uid ;");
        return $result;
    }

    public function checkMobile($mob){
        $result = $this->db->select("count", "customer", "WHERE Contact_Number = :mob ;", ':mob', $mob);
        if($result>0){
            return true;
        }
        else return false;
    }

    public function deleteCustomerAccount($uid)
    {

        $columns = array('Flag', 'Email', 'Username');
        $param = array(':flag', ':email', ':uname');
        $values = array(0, "null", "null", "null");

        $result = $this->db->update("users",  $columns, $param, $values, ":uid", $uid, "WHERE User_ID = :uid ;");
        $result = $this->db->update("customer", "Contact_Number", ":mob", "0000000000", ":uid", $uid, "WHERE User_ID = :uid ;");
        return $result;
    }

    public function getCustDetails($uid)
    {
        $result = $this->db->select("*", "users", "INNER JOIN customer on users.User_ID = customer.User_ID WHERE (customer.User_ID = :uid);", ":uid", $uid);
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
        // echo $id;echo "\n";
        
        // echo $latitude;echo "\n";
        // echo $longitude;
        // echo $address;

        $values = array($id, $address, $latitude, $longitude);
        $columns = array('User_ID','Address', 'Latitude', 'Longitude');
        $param = array(':userid',':addr', ':lat', ':lng');
        $result = $this->db->insert("customer_location", $columns, $param, $values);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function getAddress($uid){
        $result = $this->db->select("*", "customer_location", "WHERE User_ID = :uid ;", ':uid', $uid);
        return $result;
    }

    function addressDelete($id, $latitude, $longitude){
        $result = $this->db->delete("customer_location", "WHERE ( User_ID = :uid AND Latitude = :lat AND Longitude = :lng);", array(':uid', ':lat', ':lng'), array($id, $latitude, $longitude));
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
}
