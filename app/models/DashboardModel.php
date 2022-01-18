<?php

class DashboardModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getNoOfBookings()
    {
        $firstDay = date('Y-m-01', strtotime('-1 month'));
        $lastDay = date('Y-m-t', strtotime('-1 month'));

        $result = $this->db->select( array("(WEEK(Date) - WEEK('$firstDay') + 1) AS Week", "COUNT(Reservation_ID) AS Reservations"), "reservation", "WHERE :first <= Date AND Date <= :last GROUP BY WEEK(Date) ORDER BY WEEK(Date);", array(":first", ":last"), array($firstDay, $lastDay));
        return $result;
    }

    public function getTypeOfBookings()
    {
        $firstDay = date('Y-m-01', strtotime('-1 month'));
        $lastDay = date('Y-m-t', strtotime('-1 month'));

        $result = $this->db->select( array("wash_package.Name", "COUNT(Reservation_ID) AS Reservations"), "reservation", "INNER JOIN wash_package ON reservation.Wash_Package_ID = wash_package.Wash_Package_ID WHERE :first <= Date AND Date <= :last GROUP BY reservation.Wash_Package_ID;", array(":first", ":last"), array($firstDay, $lastDay));
        return $result;
    }

    public function getRevenue()
    {
        $firstDay = date('Y-m-01', strtotime('-1 month'));
        $lastDay = date('Y-m-t', strtotime('-1 month'));

        $result = $this->db->select( array("(WEEK(Date) - WEEK('$firstDay') + 1) AS Week","(SUM(Total_price)) AS Price"), "reservation", "WHERE :first <= Date AND Date <= :last GROUP BY WEEK(Date);", array(":first", ":last"), array($firstDay, $lastDay));
        return $result;
    }

    public function getTeamBookings()
    {
        $firstDay = date('Y-m-01', strtotime('-1 month'));
        $lastDay = date('Y-m-t', strtotime('-1 month'));

        $result = $this->db->select( array("Service_team_leader_ID", "COUNT(Reservation_ID) AS Reservations"), "reservation", "WHERE :first <= Date AND Date <= :last GROUP BY Service_team_leader_ID;", array(":first", ":last"), array($firstDay, $lastDay));
        return $result;
    }
}