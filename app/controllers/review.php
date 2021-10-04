<?php
date_default_timezone_set("Asia/Colombo");
session_start();
class Review extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $result = $this->model->getUserReviews();
        $_SESSION['reviews'] = $result;
        // $result = $this->model->getCustomers();
        // $_SESSION['customers'] = $result;
        $this->view->render('userReviews');
    }

    function write(){
        $this->view->render('customerGiveReview');
    }
   
    function store(){
        $review = $_POST['review'];
        // $dt = new DateTime("now", new DateTimeZone('Asia/Colombo'));
        // $time = $dt->format('H:i:s');
        $details = $_SESSION['userDetails'];
        $id = $details[0]['User_ID'];
        $reviewData = array(date('Y-m-d'), date("h:i:s"), $review, $id);
        if($this->model->storeReview($reviewData)){
            header("Location: /user/home");
        }
        else echo "ERROR";
    }
}