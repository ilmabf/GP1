<?php

class BookingModel extends Model
{
    public function getBookedDates()
    {
        $teams = $this->db->select("team", "teamcount", "WHERE countID = '1';");
        $selection1 = array("Date", "Time", "count(Reservation_ID) as NoOfBooking");

        $groupedSlots = $this->db->select($selection1, "reservation", "GROUP BY Date, Time;");
        // define a dictionary and keep key as the Date and value as the Time
        $bookedDatesDict = array();
        for ($i = 0; $i < count($groupedSlots); $i += 1) {
            if ($groupedSlots[$i][2] >= $teams[0][0]) {
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

    function checkValidity($vehicle, $date, $time)
    {
        $result = $this->db->select("Reservation_ID", "reservation", "WHERE Vehicle_ID = :vehicle AND Date = :date AND Time = :time;", array(":vehicle", ":date", ":time"), array($vehicle, $date, $time));
        if (sizeof($result) > 0) {
            return "fail";
        } else return "success";
    }

    function AddReserevation($reservationDetails)
    {
        $columns = array('Vehicle_ID', 'Address', 'Latitude', 'Longitude', 'Price', 'Total_price', 'Wash_Package_ID', 'Date', 'Time', 'Customer_ID');
        $param = array(':vehicleid', ':addr', ':lat', ':lng', ':price', ':total', ':washPcakge', ':date', ':time', ':custID');
        $result = $this->db->insert("reservation", $columns, $param, $reservationDetails);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function UpdateReservation($orderID, $reservationDetails)
    {
        $columns = array('Vehicle_ID', 'Address', 'Latitude', 'Longitude', 'Price', 'Total_price', 'Wash_Package_ID', 'Date', 'Time', 'Customer_ID');
        $param = array(':vehicleid', ':addr', ':lat', ':lng', ':price', ':total', ':washPcakge', ':date', ':time', ':custID');
        $result = $this->db->update("reservation", $columns, $param, $reservationDetails, ':reservationID', $orderID, "WHERE Reservation_ID = :reservationID;");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    //For get Completed reservation list before current date
    function getCompletedReservationList()
    {
        $result = $this->db->select("*", "reservation", "WHERE Completed = 1 ;");
        return $result;
    }

    function getCompletedReservationList1()
    {
        // get completed reservation detail list with customer names
        $selection = array("reservation.Reservation_ID", "reservation.Vehicle_ID", "reservation.Date", "reservation.Time", "customer.First_Name", "customer.Last_Name", "reservation.Member1");
        $result = $this->db->select($selection, "reservation, customer", "WHERE reservation.Completed = 1 AND reservation.Customer_ID = customer.User_ID;");
        return $result;
    }

    //For get Completed reservation list before current date
    function getCustomerCompletedReservationList($custoID)
    {

        $result = $this->db->select("*", "reservation", "WHERE Completed = 1 AND Customer_ID = :custoID ;", ':custoID', $custoID);
        return $result;
    }

    function getUpcomingReservationList()
    {

        $date = date('Y/m/d');

        $result = $this->db->select("*", "reservation", "WHERE Completed = 0 ;");
        return $result;
    }

    function getUpcomingReservationList1()
    {
        // get reservation detail list with customer names
        $selection = array("reservation.Reservation_ID", "reservation.Vehicle_ID", "reservation.Date", "reservation.Time", "customer.First_Name", "customer.Last_Name", "reservation.Customer_ID", "reservation.Service_team_leader_ID");
        $result = $this->db->select($selection, "reservation, customer", "WHERE reservation.Completed = 0 AND reservation.Customer_ID = customer.User_ID;");
        return $result;
    }

    // For get details of selected completed reservation
    function getReservationDetails($orderID)
    {
        $result = $this->db->select("*", "reservation", "WHERE Reservation_ID = :orderID ;", ':orderID', $orderID);
        return $result;
    }
    //To get customer details for order summary,completed reservation
    function getCustomer($custoID)
    {
        $result = $this->db->select("*", "customer", "WHERE User_ID = :custoID ;", ':custoID', $custoID);
        return $result;
    }
    //For get wash package name for choosen wash package id
    function getSelectedWashPackage($washpackageID)
    {
        $result = $this->db->select("Name", "wash_package", "WHERE Wash_Package_ID = :washpackageID", ':washpackageID', $washpackageID);
        return $result;
    }
    //For get vehicle details for choosen vehicle id
    function getSelectedVehicle($vID)
    {
        $result = $this->db->select("*", "customer_vehicle", "WHERE VID = :vID", ':vID', $vID);
        return $result;
    }
    //For get before and after images for choosen reservation id
    function getSelectedImages($orderID)
    {
        $result = $this->db->select("*", "reservation_photos", "WHERE Reservation_ID = :orderID", ':orderID', $orderID);
        return $result;
    }

    function getTeams($time)
    {

        $today = date('Y-m-d');

        $result = $this->db->select("DISTINCT team", "employee_records", "WHERE date = :date AND onWork = 1;", ":date", $today);
        $result2 = $this->db->select("Service_team_leader_ID", "reservation", "WHERE Date = :date AND Time = :time;", array(":date", ":time"), array($today, $time));

        $k = 0;
        $final = array();
        for ($i = 0; $i < sizeof($result); $i++) {
            $flag = 0;
            for ($j = 0; $j < sizeof($result2); $j++) {
                if ($result[$i]['team'] == $result2[$j]['Service_team_leader_ID']) {
                    $flag = 1;
                }
            }
            if ($flag == 0) {
                $final[$k]['team'] = $result[$i]['team'];
                $k++;
            }
        }

        return $final;
    }

    function assignServiceTeam($id, $members, $resId)
    {
        $member1 = $members[0]['First_Name'] . " " . $members[0]['Last_Name'];
        $member2 = $members[1]['First_Name'] . " " . $members[1]['Last_Name'];
        $member3 = $members[2]['First_Name'] . " " . $members[2]['Last_Name'];
        $member4 = $members[3]['First_Name'] . " " . $members[3]['Last_Name'];

        $memColumns = array("Service_team_leader_ID", "Member1", "Member2", "Member3", "Member4");
        $memParams = array(":stlID", ":Mem1", ":Mem2", ":Mem3", ":Mem4");
        $memValues = array($id, $member1, $member2, $member3, $member4);

        $result = $this->db->update("reservation", $memColumns, $memParams, $memValues, ":resID", $resId, "WHERE Reservation_ID = :resID;");
        return $result;
    }

    function getCustomerDetails($resID)
    {
        $result = $this->db->select("*", "reservation", "INNER JOIN customer ON reservation.Customer_ID = customer.User_ID INNER JOIN users ON customer.User_ID = users.User_ID;");
        return $result;
    }

    function getMembers($id)
    {
        $today = date('Y-m-d');
        $selection = array("First_Name", "Last_Name");
        $result = $this->db->select($selection, "employee", "INNER JOIN employee_records ON (employee.Employee_ID = employee_records.EmpID AND date = :date) WHERE onWork = 1 AND employee_records.team = :team;", array(":date", ":team"), array($today, $id));
        return $result;
    }

    function getSTLDetails($stlID)
    {
        $selection = array("file_name", "First_Name", "Last_Name", "Contact_Number");
        $result = $this->db->select($selection, "employee", "INNER JOIN service_team_leader ON service_team_leader.STL_ID = employee.STL_ID WHERE service_team_leader.STL_ID = :stlid", ":stlid", $stlID);
        return $result;
    }

    function deleteReservation($resID)
    {
        $result = $this->db->delete("reservation", "WHERE Reservation_ID = :resID;", ":resID", $resID);
        return $result;
    }
    function rateService($orderID, $i)
    {
        $columns = array("Reservation_ID", "Rating");
        $params = array(":orderID", ":i");
        $values = array($orderID, $i);

        $result = $this->db->update("reservation", $columns, $params, $values, ":i", $i, "WHERE Reservation_ID = :orderID;");
        return $result;
    }


    function checkInvalidPrice($price, $washPackage, $vehicle){
        $result = $this->db->select("Type", "customer_vehicle", "WHERE VID = :vid", ":vid", $vehicle);
        $vehicleType = $result[0]['Type'];
        $result = $this->db->select("Price", "wash_package_vehicle_category", "WHERE Wash_Package_ID = :washPackage AND Vehicle_Type = :type", array(":washPackage", ":type"), array($washPackage, $vehicleType));
        $packagePrice = $result[0]['Price'];

        echo "price = " . $price;
        echo "packagePrice = " . $packagePrice;
        if ($price != $packagePrice) {
            return true;
        } else return false;
    }
}
