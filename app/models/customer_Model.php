<?php


class Customer_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function checkDuplicate($value){
        
        
        if($this->db->select('count', "users", "WHERE Username = '$value[0]';") > 0){
            $_SESSION['error'] = 'Username already exists';
            $_SESSION['flag'] = 1;
            return true;
        }
        if($this->db->select('count', "users", "WHERE Email = '$value[1]';") > 0){
            $_SESSION['error'] = 'Email already exists';
            $_SESSION['flag'] = 2;
            return true;
        }    
        if($this->db->select('count', "customer", "WHERE Contact_Number = '$value[2]';") > 0){
            $_SESSION['error'] = 'Mobile number already exists';
            $_SESSION['flag'] = 3;
            return true;
        }  
        return false;
    }

    function makeCustomer($fname, $lname, $uname, $email, $mobile, $hashedpwd, $token){
        $columns = array('Username', 'PASSWORD', 'Email');
        $values = array($uname, $hashedpwd, $email);
        $result = $this->db->insert("users", $columns, $values);
        if($result != "Success"){
            print_r($result);
            return false;
        }
        $uid = $this->db->select("User_ID", "users", "WHERE Username = '$uname';");
        $columns = array('User_ID','First_Name', 'Last_Name', 'Contact_Number', 'Date_Registered', 'Token', 'Verified');
        $values = array($uid[0]['User_ID'], $fname, $lname, $mobile, date("Y-m-d"), $token, '0');
        $result = $this->db->insert("customer", $columns, $values);
        if($result != "Success"){
            print_r($result);
            return false;
        }
        return true;
    }
    function getCustID($uname){
        $result = $this->db->select("users.User_ID", "users", "INNER JOIN customer ON customer.User_ID = users.User_ID WHERE users.Username = '$uname';");
        //echo $result;
        return $result;
    }

    function checkToken($uid, $token){
        $key = $this->db->select("Token", "customer", "WHERE User_ID = '$uid';");
        if($key[0]['Token'] == $token){
            $result = $this->db->update("customer", "Verified", "1", "WHERE User_ID = '$uid';");
            if($result == "Success"){
                return true;
            }
            else{
                print_r($result);
                return false;
            }
        }
        else return false;
    }
}