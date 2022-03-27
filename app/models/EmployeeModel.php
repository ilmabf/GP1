<?php


class EmployeeModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // admin 

    function makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $flag)
    {
        $columns = array('First_Name', 'Last_Name', 'Contact_Number', 'Email', 'Date_Enrolled', 'Salary', 'NIC_No', 'Flag');
        $param = array(':fname', ':lname', ':phone', ':email', ':date', ':salaary', ':nic', ':flag');
        $values = array($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $flag);
        $result = $this->db->insert("employee", $columns, $param, $values);
        return $result;
    }

    function getUserData()
    {
        $result = $this->db->select("*", "users", "Null");
        return $result;
    }

    function getEmployeeDetails()
    {
        $result = $this->db->select("*", "employee", "WHERE STL_ID IS NULL && Flag = 1;");
        return $result;
    }

    function getStlData()
    {
        $selection = array("employee.Employee_ID", "employee.First_Name", "employee.Last_Name", "employee.Contact_Number", "employee.Email", "employee.Date_Enrolled", "employee.Salary", "employee.NIC_No", "users.Username", "service_team_leader.file_name", "service_team_leader.STL_ID");
        $result = $this->db->select($selection, "employee", "INNER JOIN users ON employee.STL_ID = users.STL_ID INNER JOIN service_team_leader ON employee.STL_ID = service_team_leader.STL_ID WHERE employee.Flag != 0;");
        return $result;
    }

    function getEmployeeAttendanceDetails()
    {
        $selection = array("employee.Employee_ID", "employee.First_Name", "employee.Last_Name", "employee_records.team", "employee_records.onWork");

        $yesterday = date('Y-m-d', time() - 60 * 60 * 24);
        $today = date('Y-m-d');
        $x = $this->db->select("*", "employee_records", "WHERE date = '$today';");
        if (sizeof($x) == 0) {
            $result = $this->db->select(
                $selection,
                "employee",
                "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NULL AND employee.Flag = 1);",
                ":day",
                $yesterday
            );
        } else {
            $result = $this->db->select(
                $selection,
                "employee",
                "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NULL AND employee.Flag = 1);",
                ":day",
                $today
            );
        }
        return $result;
    }

    function getStlAttendanceDetails()
    {
        $selection = array("employee.Employee_ID", "employee.STL_ID", "employee.First_Name", "employee.Last_Name", "employee_records.team", "employee_records.onWork");
        $yesterday = date('Y-m-d', time() - 60 * 60 * 24);
        $today = date('Y-m-d');
        $x = $this->db->select("*", "employee_records", "WHERE date = '$today';");
        if (sizeof($x) == 0) {
            $result = $this->db->select($selection, "employee", "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NOT NULL AND employee.Flag = 1);", ":day", $yesterday);
        } else {
            $result = $this->db->select($selection, "employee", "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NOT NULL AND employee.Flag = 1);", ":day", $today);
        }

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
        $conditionParam = ':empId';
        $conditionValue = $empId;

        $result = $this->db->update("employee", "Flag", ":flag", "0", $conditionParam, $conditionValue, "WHERE Employee_ID = :empId;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function stlUpdate($empId, $columnValue)
    {
        $conditionParam = ':empId';
        $conditionValue = $empId;

        $result = $this->db->update("employee", "STL_ID", ":stlId", "null", $conditionParam, $conditionValue, "WHERE Employee_ID = :empId;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function makeSTLPhoto($imageFile, $nic)
    {
        $result = $this->db->insert("service_team_leader", "file_name", ":fileName", $imageFile);
        return $result;
    }

    function getStlDetails()
    {
        $result = $this->db->select("*", "service_team_leader", "Null");
        return $result;
    }

    // get last stlid
    function getLastSTLID()
    {
        $result = $this->db->select("STL_ID", "service_team_leader", "ORDER BY STL_ID DESC LIMIT 1;");
        return $result;
    }

    function stlUserAdd($stlId, $stlUserName, $hashedpwd, $stlEmail, $flag)
    {
        $columns = array('Username', 'PASSWORD', 'Email', 'STL_ID');
        $param = array(':username', ':password', ':email', ':stlId');
        $values = array($stlUserName, $hashedpwd, $stlEmail, $stlId);

        $result = $this->db->insert("users", $columns, $param, $values);
        return $result;
    }

    function empStlIDAdd($stlId, $nic)
    {
        $conditionParam = ':nic';
        $conditionValue = $nic;

        $result = $this->db->update("employee", 'STL_ID', ':stlId', $stlId, $conditionParam, $conditionValue, "WHERE NIC_No = :nic;");
        return $result;
    }

    // manager 

    function getEmpData()
    {
        $today = date("Y-m-d");
        $flagForToday = $this->db->select("count", "employee_records", "WHERE date = :day;", ":day", $today);
        if($flagForToday>0){
            $_SESSION['flagForToday'] = 1;
        }

        $selection = array("employee.First_Name", "employee.Last_Name", "employee.Contact_Number", "employee.Email", "employee.Date_Enrolled", "employee.Salary", "employee.NIC_No", "employee_records.team", "employee_records.onWork");
        $today = date("Y-m-d");
        $result = $this->db->select($selection, "employee", "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NULL AND employee.Flag = 1);", ":day", $today);
        return $result;
    }

    function getStlAttendanceData()
    {
        $today = date("Y-m-d");
        $flagForToday = $this->db->select("count", "employee_records", "WHERE date = :day AND STL_ID IS NOT NULL;", ":day", $today);
        if($flagForToday>0){
            $_SESSION['flagForToday2'] = 1;
        }

        $selection = array("employee.First_Name", "employee.Last_Name", "employee.Contact_Number", "employee.Email", "employee.Date_Enrolled", "employee.Salary", "employee.NIC_No", "employee_records.team", "employee_records.onWork");
        
        $result = $this->db->select($selection, "employee", "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NOT NULL AND employee.Flag = 1);", ":day", $today);
        return $result;
    }

    function insertAttendance_emp($empID, $team, $onWork)
    {
        
        
        $today = date("Y-m-d");
        $columns = array('EmpID', 'Date', 'team', 'onWork');
        $param = array(':empId', ':date', ':team', ':onWork');
        $values = array($empID, $today, $team, $onWork);
        $result = $this->db->insert("employee_records", $columns, $param, $values);
        return $result;
    }

    function insertAttendance_stl($empID, $stlID, $onWork)
    {
        $today = date("Y-m-d");
        $columns = array('EmpID', 'Date', 'team', 'onWork', 'Stl_ID');
        $param = array(':empId', ':date', ':team', ':onWork', ':stlID');
        $values = array($empID, $today, $stlID, $onWork, $stlID);
        $result = $this->db->insert("employee_records", $columns, $param, $values);
        return $result;
    }

    function getStlOnWorkData()
    {
        $selection = array("employee.First_Name", "employee.Last_Name", "employee.Contact_Number", "employee.Email", "employee.Date_Enrolled", "employee.Salary", "employee.NIC_No", "employee_records.team", "employee_records.onWork");
        $today = date("Y-m-d");
        $result = $this->db->select($selection, "employee", "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NOT NULL AND employee.Flag = 1 AND employee_records.onWork = 1);", ":day", $today);
        return $result;
    }

    function getStlNotWorkData()
    {
        $selection = array("employee.First_Name", "employee.Last_Name", "employee.Contact_Number", "employee.Email", "employee.Date_Enrolled", "employee.Salary", "employee.NIC_No", "employee_records.team", "employee_records.onWork");
        $today = date("Y-m-d");
        $result = $this->db->select($selection, "employee", "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NOT NULL AND employee.Flag = 1 AND employee_records.onWork = 0);", ":day", $today);
        return $result;
    }

    function getEmpOnWorkData()
    {
        $selection = array("employee.First_Name", "employee.Last_Name", "employee.Contact_Number", "employee.Email", "employee.Date_Enrolled", "employee.Salary", "employee.NIC_No", "employee_records.team", "employee_records.onWork");
        $today = date("Y-m-d");
        $result = $this->db->select($selection, "employee", "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NULL AND employee.Flag = 1 AND employee_records.onWork = 1);", ":day", $today);
        return $result;
    }

    function getEmpNotWorkData()
    {
        $selection = array("employee.First_Name", "employee.Last_Name", "employee.Contact_Number", "employee.Email", "employee.Date_Enrolled", "employee.Salary", "employee.NIC_No", "employee_records.team", "employee_records.onWork");
        $today = date("Y-m-d");
        $result = $this->db->select($selection, "employee", "LEFT JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND employee_records.date = :day) WHERE (employee.STL_ID IS NULL AND employee.Flag = 1 AND employee_records.onWork = 0);", ":day", $today);
        return $result;
    }

    function getTeamCount()
    {
        $selection = "team";
        $result = $this->db->select($selection, "teamCount", "WHERE countID = 1;");
        return $result;
    }

    function updateNoOfTeams($count)
    {
        $columns = 'team';
        $param = ':team';
        $values = $count;
        $conditionParam = ':countID';
        $conditionValue = 1;
        $values = $count;
        $result = $this->db->update("teamcount", $columns, $param, $values, $conditionParam, $conditionValue, "WHERE countID = :countID;");
        return $result;
    }

    function stlDelete($stlId)
    {
        $result = $this->db->delete("service_team_leader", "WHERE STL_ID = :stlId;", ":stlId", $stlId);
        return $result;
    }

    function updateSTLPhoto($filename, $stlID)
    {
        $columns = 'file_name';
        $param = ':filename';
        $values = $filename;
        $conditionParam = ':stlID';
        $conditionValue = $stlID;
        $result = $this->db->update("service_team_leader", $columns, $param, $values, $conditionParam, $conditionValue, "WHERE STL_ID = :stlID;");
        return $result;
    }

    function getSTLEmpID($nic){
        $result = $this->db->select("Employee_ID", "employee", "WHERE NIC_No = :nic", ":nic", $nic);
        return $result;
    }

    function changeSTLAttendance($empID, $stlID){
        $date = date('Y/m/d');
        if($this->db->select("count", "employee_records", "WHERE Date = :date AND EmpID = :empID;", array(":date", ":empID"), array($date, $empID))){
            
            $columns = array("STL_ID", "team");
            $param = array(":stlID", ":t");
            $values = array($stlID, $stlID);
            $conditionParam = array(":date", ":empID");
            $conditionValue = array($date, $empID);
            $result = $this->db->update("employee_records", $columns, $param, $values, $conditionParam, $conditionValue, "WHERE Date = :date AND EmpID = :empID;");
        }
    }
}
