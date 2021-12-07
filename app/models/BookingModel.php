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
}
