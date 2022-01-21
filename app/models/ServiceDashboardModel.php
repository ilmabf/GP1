<?php

class ServiceDashboardModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getNoOfBookings($stlID)
    {
        // $lastDay = date('Y-m-t');
        // $firstDay = date('Y-m-01');
        $firstDay = date('Y-m-01', strtotime('-1 month'));
        $lastDay = date('Y-m-t', strtotime('-1 month'));

        $result = $this->db->select(array("(WEEK(Date) - WEEK('$firstDay') + 1) AS Week", "COUNT(Reservation_ID) AS Reservations"), "reservation", "WHERE :first <= Date AND Date <= :last  AND Service_team_leader_ID = :stlId GROUP BY WEEK(Date) ORDER BY WEEK(Date);", array(":first", ":last", ":stlId"), array($firstDay, $lastDay, $stlID));
        return $result;
    }

    public function getTypeOfBookings($stlID)
    {
        $firstDay = date('Y-m-01', strtotime('-1 month'));
        $lastDay = date('Y-m-t', strtotime('-1 month'));

        $result = $this->db->select(array("wash_package.Name", "COUNT(Reservation_ID) AS Reservations"), "reservation", "INNER JOIN wash_package ON reservation.Wash_Package_ID = wash_package.Wash_Package_ID WHERE :first <= Date AND Date <= :last  AND Service_team_leader_ID = :stlId GROUP BY reservation.Wash_Package_ID;", array(":first", ":last", ":stlId"), array($firstDay, $lastDay, $stlID));
        return $result;
        // echo $result;
    }
}
