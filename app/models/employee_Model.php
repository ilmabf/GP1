<?php


class Employee_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team){
        $columns = array('First_Name', 'Last_Name', 'Contact_Number', 'Email', 'Date_Enrolled', 'Salary', 'NIC_No', 'Team');
        $values = array($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team);
        $result = $this->db->insert("employee", $columns, $values);
        return $result;
    }

    function getEmployeeDetails(){
        $result = $this->db->select("*", "employee", "Null");
        return $result;
    }
}