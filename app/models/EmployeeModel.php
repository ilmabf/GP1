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
        $result = $this->db->selectTwo("*", "employee", "LEFT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID UNION (SELECT * FROM employee RIGHT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE service_team_leader.STL_ID IS NULL);");
        return $result;
    }

    function getRelevantEmployee($empID)
    {
        $result = $this->db->select("*", "employee", "WHERE Employee_ID = '$empID';");
        return $result;
    }
}
