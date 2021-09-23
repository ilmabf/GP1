<?php

class Review_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    public function getUserReviews(){
        $result = $this->db->select("*", "review", "Null");
        return $result;
    }

    public function getCustomers(){
        $selection = array('First_Name', 'Last_Name');
        $result = $this->db->select($selection, "customer", "INNER JOIN review ON customer.User_ID = review.Customer_ID;");
        return $result;
    }
}