<?php

class CalendarModel extends Model
{

    //To get assigned reservation list to stl
    function getSTLtodayReservationList($stl_id){
        $today = date('Y-m-d');
        $param = array(':today',':stl_id');
        $paramvalue = array($today,$stl_id);
        $result = $this->db->select('*', "reservation", "WHERE Date = :today AND Service_team_leader_ID = :stl_id ;", $param, $paramvalue);
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
    function uploadImages($order_id, $beforePhoto, $afterPhoto){
        $time = date('y-m-d h-min-sec');
        $columns = array("Reservation_ID","Picture_before","Picture_after","Time_Uploaded");
        $param = array(':order_id',':beforePhoto',':afterphoto',':timeUploaded');
        $values = array($order_id, $beforePhoto, $afterPhoto,$time);
        $result = $this->db->insert("reservation_photos", $columns, $param, $values));
        return $result;
    }

}