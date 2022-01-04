<?php

class ServiceDashboardModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getNoOfBookings($stlID)
    {
        $lastDay = date('Y-m-t');
        $firstDay = date('Y-m-01');
        $result = $this->db->select( array("WEEK(Date)", "COUNT(Reservation_ID) AS Reservations"), "reservation", "WHERE :first <= Date AND Date <= :last  AND Service_team_leader_ID = :stlId GROUP BY WEEK(Date) ORDER BY WEEK(Date);", array(":first", ":last", ":stlId"), array($firstDay, $lastDay, $stlID));
        return $result;
    }
}