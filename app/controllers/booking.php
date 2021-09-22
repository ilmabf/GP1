<?php

class Booking extends Controller{

    function __construct(){
        parent::__construct();
    }

    function bookAwash() {
        $this->view->render('customerBookAWash');
    }

    function bookAWash2() {
        $this->view->render('customerBookAWash2');
    }

    function bookAWash3() {
        $this->view->render('customerBookAWash3');
    }

    function orderSummary() {
        $this->view->render('customerOrderSummary');
    }
}