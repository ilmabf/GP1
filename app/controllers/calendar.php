<?php

require 'libs/Mailer.php';
date_default_timezone_set("Asia/Colombo");
session_start();
class Calendar extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //Get reservations for today
    function Today()
    {
        $id = $_SESSION['stlDetails'][0]['STL_ID'];
        $_SESSION['todayReservations'] = $this->model->getSTLtodayReservationList($id);
        if ($_SESSION['role'] == "stl") {
            $this->view->render('stl/AssignedOrders');
            exit;
        }
    }
    //view order details for stl
    function Order($orderID)
    {
        $_SESSION['todayOrder'] = $this->model->getReservationDetails($orderID); //order details

        //Prevent STL from seeing details of unassigned orders
        if($_SESSION['stlDetails'][0]['STL_ID'] != $_SESSION['todayOrder'][0]['Service_team_leader_ID']){
            header("Location: /calendar/Today");
        }
        
        $_SESSION['customer'] = $this->model->getCustomer($_SESSION['todayOrder'][0]['Customer_ID']); //customer details who booked order
        $_SESSION['vehicle'] = $this->model->getSelectedVehicle($_SESSION['todayOrder'][0]['Vehicle_ID']); //vehicle details service done
        $_SESSION['washpackage'] = $this->model->getSelectedWashPackage($_SESSION['todayOrder'][0]['Wash_Package_ID']); //wash package selected

        if ($_SESSION['role'] == "stl") {
            $this->view->render('stl/OrderDetails');
            exit;
        }
    }

    function completeService($orderID)
    {
        if ($_SESSION['role'] == "stl") { 

            $targetDir = "/public/images/";
            $fileName1 = basename($_FILES["beforeServiceImage"]["name"]);
            $fileName2 = basename($_FILES["afterServiceImage"]["name"]);
            $targetFilePath1 = $targetDir . $fileName1;
            $targetFilePath2 = $targetDir . $fileName2;
            
            $fileType1 = strtolower(pathinfo($targetFilePath1, PATHINFO_EXTENSION));
            $fileType2 = strtolower(pathinfo($targetFilePath2, PATHINFO_EXTENSION));

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

            if (in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes) ) {

                if ( move_uploaded_file($_FILES["beforeServiceImage"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$targetFilePath1)  ) {
                    if (move_uploaded_file($_FILES["afterServiceImage"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$targetFilePath2 ) ) {
              
                    $this->model->uploadImages($orderID, $fileName1, $fileName2);

                    }
                }

            }
           if ($this->model->completeOrder($orderID)) {

                $fname = $_SESSION['customer'][0]['First_Name'];
                $lname = $_SESSION['customer'][0]['Last_Name'];
                $email = $_SESSION['customer'][0]['Email'];

                $total = $_SESSION['todayOrder'][0]['Total_price'];
                $washPackage = $_SESSION['washpackage'][0]['Name'];
                $vehicle = $_SESSION['vehicle'][0]['VID'];

                $mail = new Mailer();

                $output = '<p>Dear ';
                $output .= $fname . ' ' . $lname;
                $output = '</p>';
                $output .= '<p>Thank you for booking WandiWash! We are glad to have you as a customer.</p>';
                $output .= '<p>Here is your invoice of the service!</p>';

                $output .= '<p>Total - Rs.'. $total. '</p>';
                $output .= '<p>Wash Package - .'. $washPackage. '</p>';
                $output .= '<p>Vehicle - '. $vehicle. '</p>';
                $output .= '<p>------------------------------------------------------------</p>';
                $output .= '<p>Kindly rate our service through our website. You can also provide any feedback as a review. We hope to see you again!</p>';
                $output .= '<p>Thank You,</p>';
                $output .= '<p>WandiWash.</p>';
                $body = $output;
                $subject = "Your reservation is now complete!";

                if ($mail->mailto($subject, $email, $body)) {
                    //email has been sent
                    header("Location: /calendar/Today");
                }
            }
        }
    }
    
    
}
