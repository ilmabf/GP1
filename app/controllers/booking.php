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

    function orderSummary() {
        $this->view->render('customerOrderSummary');
    }

    function customerHome() {
        $this->view->render('customerHome');
    }

    function upcoming(){
        $this->view->render('customerUpcomingReservations');
    }

    function upcomingOrder(){
        $this->view->render('customerViewUpcomingOrder');
    }

    function reschedule(){
        $this->view->render('customerReschedule');
    }

    function completed(){
        $this->view->render('customerCompletedReservations');
    }

    function completedOrder(){
        $this->view->render('customerViewCompletedOrder');
    }
}