<?php

class Review extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->view->render('userReviews');
    }

    function write(){
        $this->view->render('customerGiveReview');
    }
    
}