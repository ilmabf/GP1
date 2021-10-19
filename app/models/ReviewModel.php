<?php

class ReviewModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getUserReviews()
    {
        $result = $this->db->selectTwo("*", "review", "INNER JOIN customer ON customer.User_ID = review.Customer_ID ORDER BY Date DESC, Time DESC;");
        return $result;
    }
    
    public function storeReview($reviewData)
    {
        $columns = array('Date', 'Time', 'Content', 'Customer_ID');
        $param = array(':date', ':time', ':content', ':customerid');
        $result = $this->db->insertTwo("review", $columns, $param, $reviewData);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
}
