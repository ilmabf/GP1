<?php

class BookingModel extends Model
{
    public function getBookedDates()
    {
        // $stlCount = $this->db->select();
        // select Date, Time from reservation where count(reservation id) = stlCount group by date, time;
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
}
