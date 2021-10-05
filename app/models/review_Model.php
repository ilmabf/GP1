<?php

class Review_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    public function getUserReviews(){
        $result = $this->db->select("*", "review", "INNER JOIN customer ON customer.User_ID = review.Customer_ID ORDER BY Time DESC;");
        return $result;
    }

    // public function getCustomers(){
    //     $selection = array('First_Name', 'Last_Name');
    //     $result = $this->db->select("*", "review", "LEFT JOIN customer ON customer.User_ID = review.Customer_ID;");
    //     return $result;
    // }

    public function storeReview($reviewData){
        $columns = array('Date', 'Time', 'Content', 'Customer_ID');
        $result = $this->db->insert("review", $columns, $reviewData);
        if($result== "Success"){
            return true;
        }
        else print_r($result);
    }
}