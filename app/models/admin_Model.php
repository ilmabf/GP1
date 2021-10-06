<?php


class Admin_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team){
        $columns = array('First_Name', 'Last_Name', 'Contact_Number', 'Email', 'Date_Enrolled', 'Salary', 'NIC_No', 'Team');
        $values = array($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team);
        $result = $this->db->insert("employee", $columns, $values);
        echo $result;
    }
    function addEquipmet($name, $price, $dateAcquired,$team){
        $columns = array('Name', 'Price', 'Date_Acquired','Team');
        $values = array($name, $price, $dateAcquired,$team);
        $result = $this->db->insert("equipment", $columns, $values);
        echo $result;
    }

}