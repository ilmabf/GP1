<?php


class UserModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // -------------------- Authentication --------------------------------------- // 
    public function authenticate($uname, $pwd)
    {
        if ($this->db->select('count', "users", "WHERE (Username = :uname OR Email = :email) AND Flag = 1;", array(':uname', ':email'), array($uname, $uname)) > 0) {
            $hashed = $this->db->select("PASSWORD", "users", "WHERE Username = :uname OR Email = :email ;", array(':uname', ':email'), array($uname, $uname));
            if (password_verify($pwd, $hashed[0]['PASSWORD'])) {
                return true;
            } else return false;
        } else {
            return false;
        }
    }

    public function checkCustomer($uname)
    {
        if ($this->db->select('count', "customer", "INNER JOIN users ON customer.User_ID = users.User_ID WHERE Username = :uname OR Email = :email ;", array(':uname', ':email'), array($uname, $uname)) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkManager($uname)
    {
        if ($this->db->select('count', "users", "WHERE (Username = :uname OR Email = :email) AND User_ID = '2';", array(':uname', ':email'), array($uname, $uname)) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkSTL($uname)
    {
        if ($this->db->select('count', "users", "WHERE (Username = :uname OR Email = :email) AND STL_ID IS NOT NULL;", array(':uname', ':email'), array($uname, $uname)) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkVerified($uname)
    {

        $result = $this->db->select("customer.Verified", "customer", "INNER JOIN users ON customer.User_ID = users.User_ID WHERE users.Username = :uname OR users.Email = :email;", array(':uname', ':email'), array($uname, $uname));

        return $result;
    }

    // -------------------- Forgot Password --------------------------------------- // 

    public function passwordExists($email)
    {
        if ($this->db->select('count', "users", "WHERE Email = :email OR Username = :email;", array(':email', ':email'), array($email, $email)) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmail($uname){
        if ($this->db->select('count', "users", "WHERE Username = :uname;", ':uname', $uname) > 0) {
            $email = $this->db->select('Email', "users", "WHERE Username = :uname;", ':uname', $uname);
            return $email[0]['Email'];
        }
        else return  $uname;
    }

    public function insertToPwdTemp($email, $key, $expDate)
    {
        $columns = array('email', 'keyno', 'expDate');
        $param = array(':email', ':key', ':expdate');
        $values = array($email, $key, $expDate);
        $result = $this->db->insert("password_reset_temp", $columns, $param, $values);

        if ($result == "Success") {
            return true;
        } else {
            return false;
        }
    }

    public function checkPasswordResetKey($key, $email)
    {
        if ($this->db->select('count', "password_reset_temp", "WHERE email = :email AND keyno = :key;", array(':email', ':key'), array($email, $key)) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPasswordResetExpDate($key, $email)
    {
        $result = $this->db->select("expDate", "password_reset_temp", "WHERE email = :email AND keyno = :key;", array(':email', ':key'), array($email, $key));
        return $result;
    }

    public function updateUserPassword($email, $newPassword)
    {
        $columnValue = $newPassword;
        $conditionParam =  ':email';
        $conditionValue = $email;
        $result = $this->db->update("users", 'PASSWORD', ':password', $columnValue, $conditionParam, $conditionValue, "WHERE Email = :email;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    public function deletePwdTempTable($email)
    {
        $result = $this->db->delete("password_reset_temp", "WHERE email = :email;", ':email', $email);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    // -------------------- Account details --------------------------------------- //
    public function getVehicles($uid)
    {
        $result = $this->db->select("*", "customer_vehicle", "WHERE User_ID = :uid;", ':uid', $uid);
        return $result;
    }

    public function getCustDetails($uname)
    {
        $param = array(':uname', ':email');
        $paramValue = array($uname, $uname);
        $result = $this->db->select("*", "users", "INNER JOIN customer on users.User_ID = customer.User_ID WHERE (Username = :uname OR Email = :email);", $param, $paramValue);
        return $result;
    }
    //Get stl detail to use STL_ID in calendar controller to view today's reservation
    public function getSTLdetails($uname)
    {
        $param = array(':uname', ':email');
        $paramValue = array($uname, $uname);
        $result = $this->db->select("*", "users", "WHERE (Username = :uname OR Email = :email);", $param, $paramValue);
        return $result;
    }

    //Details for customer home page
    
    public function getVehicle()
    {
        $result = $this->db->select("DISTINCT Vehicle_Type", "wash_package_vehicle_category", "Null");
        return $result;
    }
    
    public function getWashPackage()
    {
        $result = $this->db->select("*", "wash_package", "Null");
        return $result;
    }
}
