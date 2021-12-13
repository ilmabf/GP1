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
            $bookedDatesDict[$groupedSlots[$i][0]] = $groupedSlots[$i][1];
        }
        return $bookedDatesDict;
    }

    function getWashPackage()
    {
        $result = $this->db->select("*", "wash_package", "Null");
        return $result;
    }

    function getServicePrice(){
        $result = $this->db->select("*", "wash_package_vehicle_category", "Null");
        return $result;
    }

    public function getVehicles($uid)
    {
        $result = $this->db->select("*", "customer_vehicle", "WHERE User_ID = :uid ;", ':uid', $uid);
        return $result;
    }

    function getAddress($uid){
        $result = $this->db->select("*", "customer_location", "WHERE User_ID = :uid ;", ':uid', $uid);
        return $result;
    }

    function AddReserevation($reservationDetails)
    {
        $columns = array('Vehicle_ID','Address', 'Latitude', 'Longitude','Price', 'Wash_Package_ID', 'Date', 'Time', 'Customer_ID');
        $param = array(':vehicleid',':addr', ':lat', ':lng', ':price', ':washPcakge', ':date', ':time', ':custID');
        $result = $this->db->insert("reservation", $columns, $param, $reservationDetails);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
}
