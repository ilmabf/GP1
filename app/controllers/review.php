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
        $this->view->render('user/Reviews');
    }

    function write()
    {
        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/GiveReview');
        }
    }

    function store($txtInput)
    {
        if ($_SESSION['role'] == "customer") {
            $details = $_SESSION['userDetails'];
            $id = $details[0]['User_ID'];

            //store review
            $reviewData = array(date('Y-m-d'), date("H:i:s"), $txtInput, $id);
            if ($this->model->storeReview($reviewData)) {
                header("Location: /user/home");
            }
        }
    }
}
