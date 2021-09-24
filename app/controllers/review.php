<?php
session_start();
class Review extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $result = $this->model->getUserReviews();
        $_SESSION['reviews'] = $result;
        $result = $this->model->getCustomers();
        $_SESSION['customers'] = $result;
        $this->view->render('userReviews');
    }

    function write(){
        $this->view->render('customerGiveReview');
    }
   
}