<?php


class EmployeeModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $flag)
    {
        $columns = array('First_Name', 'Last_Name', 'Contact_Number', 'Email', 'Date_Enrolled', 'Salary', 'NIC_No', 'Flag');
        $param = array(':fname', ':lname', ':phone', ':email', ':date', ':salaary', ':nic', ':flag');
        $values = array($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $flag);
        $result = $this->db->insert("employee", $columns, $param, $values);
        return $result;
    }

    function getEmployeeDetails()
    {
        // $selection = array("First_name", "Last_Name", "Contact_Number", "Email", "Date_Enrolled", "Salary", "NIC_No");
        $result = $this->db->select("*", "employee", "WHERE STL_ID IS NULL && Flag = 1;");
        return $result;

        //LEFT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE Flag = 1 UNION (SELECT * FROM employee RIGHT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE (service_team_leader.STL_ID IS NULL AND Flag = 1));
        //LEFT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID UNION (SELECT * FROM employee RIGHT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE service_team_leader.STL_ID IS NULL);
        // LEFT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE Flag = 1 UNION (SELECT * FROM employee RIGHT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE (service_team_leader.STL_ID IS NULL AND Flag = 1));
    }

    function getStlData()
    {
        $selection = array("employee.Employee_ID", "employee.First_Name", "employee.Last_Name", "employee.Contact_Number", "employee.Email", "employee.Date_Enrolled", "employee.Salary", "employee.NIC_No", "users.Username", "service_team_leader.Photo");
        $result = $this->db->select($selection, "employee", "INNER JOIN users ON employee.STL_ID = users.STL_ID INNER JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE employee.Flag != 0;");
        return $result;
    }

    function getEmployeeAttendanceDetails()
    {
        $selection = array("employee.First_Name", "employee.Last_Name", "employee_records.team", "employee_records.onWork");

        $result = $this->db->select($selection, "employee", "INNER JOIN employee_records ON employee.Employee_ID = employee_records.EmpID WHERE employee_records.Stl_ID IS NULL AND employee.Flag != 0;");
        return $result;
    }

    function getStlAttendanceDetails()
    {
        $selection = array("employee.First_Name", "employee.Last_Name", "employee_records.team", "employee_records.onWork");
        $result = $this->db->select($selection, "employee", "INNER JOIN employee_records ON employee.STL_ID = employee_records.Stl_ID");
        return $result;
    }

    // function getTeamCount()
    // {
    //     $selection = array("Team", "count(Team)");
    //     $result = $this->db->select($selection, "employee", "GROUP BY Team;");
    //     return $result;
    // }

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
        // $columns = array('Flag', 'On_Work');
        // $param = array(':flag', ':onWork');
        $conditionParam = ':empId';
        $conditionValue = $empId;

        $result = $this->db->update("employee", "Flag", ":flag", "0", $conditionParam, $conditionValue, "WHERE Employee_ID = :empId;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    //update employee set Flag = 0 WHERE Employee_ID = :empId;
    //updateTwo("employee", "WHERE Employee_ID = :empId;", ':empId', $empId);

    function stlPhotoAdd($tempname)
    {
        $result = $this->db->insert("service_team_leader", "Photo", ":photo", $tempname);
        return $result;
    }

    function getStlDetails()
    {
        $result = $this->db->select("*", "service_team_leader", "Null");
        return $result;
    }

    function stlUserAdd($stlId, $stlUserName, $hashedpwd, $stlEmail)
    {
        $columns = array('Username', 'PASSWORD', 'Email', 'STL_ID');
        $param = array(':username', ':password', ':email', ':stlId');
        $values = array($stlUserName, $hashedpwd, $stlEmail, $stlId);

        $result = $this->db->insert("users", $columns, $param, $values);
        return $result;
    }
}


// LEFT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE Flag = 1 UNION (SELECT * FROM employee RIGHT JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE (service_team_leader.STL_ID IS NULL AND Flag = 1));