<?php

class Account_Model extends Model{

    // public function getCustDetails($uname){
    //     $result = $this->db->select("*", "users","INNER JOIN customer on users.User_ID = customer.User_ID WHERE (Username = '$uname' OR Email = '$uname');");
    //     return $result;
    //     print_r($result);
    // }

    function vehicleAdd($values){
        $columns = array('User_ID', 'VID', 'Model', 'Colour', 'Type', 'Manufacturer');
        $result = $this->db->insert("customer_vehicle", $columns, $values);
        if($result == "Success"){
            return true;
        }
        else print_r($result);
    }
    
    public function getVehicles($uid){
        $result = $this->db->select("*", "customer_vehicle","WHERE User_ID = '$uid';");
        return $result;
        // print_r($result);
    }
}