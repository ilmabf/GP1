<?php


class EmployeeModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team, $flag)
    {
        $columns = array('First_Name', 'Last_Name', 'Contact_Number', 'Email', 'Date_Enrolled', 'Salary', 'NIC_No', 'Team', 'Flag');
        $param = array(':fname', ':lname', ':phone', ':email', ':date', ':salaary', ':nic', ':team', ':flag');
        $values = array($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team, $flag);
        $result = $this->db->insert("employee", $columns, $param, $values);
        return $result;
    }

    function getEmployeeDetails()
    {
        $result = $this->db->select("*", "employee", "LEFT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE Flag = 1 UNION (SELECT * FROM employee RIGHT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE (service_team_leader.STL_ID IS NULL AND Flag = 1));");
        return $result;

        //LEFT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE Flag = 1 UNION (SELECT * FROM employee RIGHT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE (service_team_leader.STL_ID IS NULL AND Flag = 1));
        //LEFT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID UNION (SELECT * FROM employee RIGHT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE service_team_leader.STL_ID IS NULL);
    }

    function getTeamCount()
    {
        $selection = array("Team", "count(Team)");
        $result = $this->db->select($selection, "employee", "GROUP BY Team;");
        return $result;
    }

    function employeeSaveEdit($empId, $columnValue)
    {
        $columns = array('Contact_Number', 'Email', 'Salary');
        $param = array(':contactNumber', ':email', ':salary');

        $conditionParam = ':empId';
        $conditionValue = $empId;

        $result = $this->db->update("employee", $columns, $param, $columnValue, $conditionParam, $conditionValue, "WHERE Employee_ID = :empId;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function employeeUpdate($empId, $columnValue)
    {
        $columns = array('Flag', 'Team');
        $param = array(':flag', ':team');
        $conditionParam = ':empId';
        $conditionValue = $empId;

        $result = $this->db->update("employee", $columns, $param, $columnValue, $conditionParam, $conditionValue, "WHERE Employee_ID = :empId;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    //update employee set Flag = 0 WHERE Employee_ID = :empId;
    //updateTwo("employee", "WHERE Employee_ID = :empId;", ':empId', $empId);
}
