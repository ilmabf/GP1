<?php
date_default_timezone_set("Asia/Colombo");
session_start();
class Review extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        //Fetch reviews
        $result = $this->model->getUserReviews();
        $_SESSION['reviews'] = $result;
        $this->view->render('userReviews');
    }

    function write()
    {
        $this->view->render('customerGiveReview');
    }

    function store()
    {
        //get POST data
        $review = $_POST['review'];

        //get user data
        $details = $_SESSION['userDetails'];
        $id = $details[0]['User_ID'];

        //store review
        $reviewData = array(date('Y-m-d'), date("H:i:s"), $review, $id);
        if ($this->model->storeReview($reviewData)) {
            header("Location: /user/home");
        } else echo "ERROR";
    }
}
