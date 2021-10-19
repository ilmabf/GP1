<?php


class EmployeeModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team)
    {
        $columns = array('First_Name', 'Last_Name', 'Contact_Number', 'Email', 'Date_Enrolled', 'Salary', 'NIC_No', 'Team');
        $param = array(':fname', ':lname', ':phone', ':email', ':date', ':salaary', ':nic', ':team');
        $values = array($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team);
        $result = $this->db->insertTwo("employee", $columns,$param, $values);
        return $result;
    }

    function getEmployeeDetails()
    {
        $result = $this->db->selectTwo("*", "employee", "Null");
        return $result;
    }
}
