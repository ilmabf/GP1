<?php
class CalendarModel extends Model
{

    //To get assigned reservation list to stl
    function getSTLtodayReservationList($stlID)
    {
        $today = date('Y-m-d');
        $param = array(':today', ':stlID');
        $paramvalue = array($today, $stlID);
        $result = $this->db->select('*', "reservation", "WHERE Date = :today AND Service_team_leader_ID = :stlID AND Completed = 0 ;", $param, $paramvalue);
        return $result;
    }
    // For get details of selected completed reservation
    function getReservationDetails($orderID)
    {
        $result = $this->db->select("*", "reservation", "WHERE Reservation_ID = :orderID ;", ':orderID', $orderID);
        return $result;
    }
    //For get customer details for order summary,completed reservation
    function getCustomer($custoID)
    {
        $result = $this->db->select("Email, customer.*","customer", "INNER JOIN users on customer.User_ID = users.User_ID WHERE customer.User_ID = :custoID ;", ':custoID', $custoID);
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
    function uploadImages($orderID, $beforePhoto, $afterPhoto)
    {
        $time = date('Y-m-d h:m:s');
        $columns = array("Reservation_ID", "Picture_before", "Picture_after", "Time_Uploaded");
        $param = array(':orderID', ':beforePhoto', ':afterphoto', ':time');
        $values = array($orderID, $beforePhoto, $afterPhoto, $time);
        $result = $this->db->insert("reservation_photos", $columns, $param, $values);
        return $result;
    }

    function completeOrder($orderID){
        $result = $this->db->update("reservation", "Completed", ":completed", 1, ":resID", $orderID, "WHERE Reservation_ID = :resID;");
        return $result;
    }
}