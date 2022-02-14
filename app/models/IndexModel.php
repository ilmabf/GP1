<?php

class IndexModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getVehicle()
    {
        $result = $this->db->select("DISTINCT Vehicle_Type", "wash_package_vehicle_category", "Null");
        return $result;
    }
    
    public function getWashPackage()
    {
        $result = $this->db->select("*", "wash_package", "Null");
        return $result;
    }

}
