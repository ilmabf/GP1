<?php

class BookingModel extends Model
{
    public function getBookedDates()
    {
        $stl = $this->db->select("*", "service_team_leader", "Null");
        $stlCount = $_SESSION['rowCount'];

        $selection1 = array("Date", "Time", "count(Reservation_ID) as NoOfBooking");

        $groupedSlots = $this->db->select($selection1, "reservation", "GROUP BY Date, Time;");
        // print_r($groupedSlots);
        // echo $groupedSlots[0]['Date'];

        // define a multidimensional array to hold the data
        // $bookedDates = array();
        // foreach ($groupedSlots as $slot) {
        //     if ($slot[2] == $stlCount) {
        //         // push the $slot[0] & $slot[1] the multidimensional array
        //         array_push($bookedDates, $slot['Date'], $slot['Time']);
        //     }
        // }
        // return array
        // print_r($bookedDates);
        // define a dictionary and keep key as the Date and value as the Time
        $bookedDatesDict = array();
        for ($i = 0; $i < count($groupedSlots); $i += 1) {
            if ($groupedSlots[$i][2] >= $stlCount) {
                $bookedDatesDict[$groupedSlots[$i][0]] = $groupedSlots[$i][1];
            }
        }
        return $bookedDatesDict;
    }

    function getWashPackage()
    {
        $result = $this->db->select("*", "wash_package", "Null");
        return $result;
    }

    function getServicePrice()
    {
        $result = $this->db->select("*", "wash_package_vehicle_category", "Null");
        return $result;
    }

    public function getVehicles($uid)
    {
        $result = $this->db->select("*", "customer_vehicle", "WHERE User_ID = :uid ;", ':uid', $uid);
        return $result;
    }

    function getAddress($uid)
    {
        $result = $this->db->select("*", "customer_location", "WHERE User_ID = :uid ;", ':uid', $uid);
        return $result;
    }

    function AddReserevation($reservationDetails)
    {
        $columns = array('Vehicle_ID','Address', 'Latitude', 'Longitude','Price', 'Total_price', 'Wash_Package_ID', 'Date', 'Time', 'Customer_ID');
        $param = array(':vehicleid',':addr', ':lat', ':lng', ':price', ':total', ':washPcakge', ':date', ':time', ':custID');
        $result = $this->db->insert("reservation", $columns, $param, $reservationDetails);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
    //For get Completed reservation list before current date
    function getCompletedReservationList(){
        
        $date = date('Y/m/d');
        
        $result = $this->db->select("*", "reservation", "WHERE Date < :date ;",':date',$date);
        return $result;
        
    }

    function getUpcomingReservationList(){
        
        $date = date('Y/m/d');
        
        $result = $this->db->select("*", "reservation", "WHERE Completed = 0 ;");
        return $result;
        
    }

    // For get details of selected completed reservation
    function getReservationDetails($order_id){
        $result = $this->db->select("*", "reservation", "WHERE Reservation_ID = :order_id ;",':order_id',$order_id);
        return $result;
        
    }
    //For get customer details for order summary,completed reservation
    function getCustomer($custo_id){
        $result = $this->db->select("*", "customer", "WHERE User_ID = :custo_id ;",':custo_id',$custo_id);
        return $result;
    }
    //For get wash package name for choosen wash package id
    function getSelectedWashPackage($washpackage_id)
    {
        $result = $this->db->select("Name", "wash_package", "WHERE Wash_Package_ID = :washpackage_id",':washpackage_id', $washpackage_id);
        return $result;
    }
    //For get vehicle details for choosen vehicle id
    function getSelectedVehicle($v_id)
    {
        $result = $this->db->select("*", "customer_vehicle", "WHERE VID = :v_id",':v_id', $v_id);
        return $result;
    }
     //For get before and after images for choosen reservation id
    function getSelectedImages($order_id)
    {
        $result = $this->db->select("*", "reservation_photos", "WHERE Reservation_ID = :order_id",':order_id', $order_id);
        return $result;
    }

    function getTeams(){

        $today = date('Y-m-d');

        $result = $this->db->select("DISTINCT team", "employee_records", "WHERE date = :date AND onWork = 1;", ":date", $today);
        return $result;
    }

    function assignServiceTeam($id, $members, $resId){
        $member1 = $members[0]['First_Name'] . " " . $members[0]['Last_Name'];
        $member2 = $members[1]['First_Name'] . " " . $members[1]['Last_Name'];
        $member3 = $members[2]['First_Name'] . " " . $members[2]['Last_Name'];
        $member4 = $members[3]['First_Name'] . " " . $members[3]['Last_Name'];

        $memColumns = array("Service_team_leader_ID","Member1", "Member2", "Member3", "Member4");
        $memParams = array(":stlID", ":Mem1", ":Mem2", ":Mem3", ":Mem4");
        $memValues = array($id, $member1, $member2, $member3, $member4);

        $result = $this->db->update("reservation", $memColumns, $memParams,$memValues, ":resID", $resId, "WHERE Reservation_ID = :resID;");
        return $result;
    }

    function getMembers($id){
        $today = date('Y-m-d');
        $selection = array("First_Name", "Last_Name");
        $result = $this->db->select($selection, "employee", "INNER JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND date = :date) WHERE onWork = 1 AND employee_records.team = :team;", array(":date", ":team"), array($today, $id));
        return $result;
    }
}
