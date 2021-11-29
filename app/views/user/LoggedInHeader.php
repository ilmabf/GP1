<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <script>
        var viewport = document.querySelector("meta[name=viewport]");
        viewport.setAttribute("content", viewport.content + ", height=" + window.innerHeight);
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="icon" href="/public/images/drop.png">

    <link rel="stylesheet" href="/public/css/actors/admin/Home.css">
    <link rel="stylesheet" href="/public/css/actors/admin/ManageEmployee.css">
    <link rel="stylesheet" href="/public/css/actors/admin/ManageEquipment.css">
    <link rel="stylesheet" href="/public/css/actors/admin/ManageService.css">

    <link rel="stylesheet" href="/public/css/actors/customer/Account.css">
    <link rel="stylesheet" href="/public/css/actors/customer/BookAWash.css">
    <link rel="stylesheet" href="/public/css/actors/customer/BookAWash2.css">
    <link rel="stylesheet" href="/public/css/actors/customer/GiveReview.css">
    <link rel="stylesheet" href="/public/css/actors/customer/Help.css">
    <link rel="stylesheet" href="/public/css/actors/customer/Home.css">
    <link rel="stylesheet" href="/public/css/actors/customer/MyOrders.css">
    <link rel="stylesheet" href="/public/css/actors/customer/OrderSummary.css">
    <link rel="stylesheet" href="/public/css/actors/customer/Signup.css">
    <link rel="stylesheet" href="/public/css/actors/customer/UpcomingOrder.css">

    <link rel="stylesheet" href="/public/css/actors/manager/CompletedOrder.css">
    <link rel="stylesheet" href="/public/css/actors/manager/CompletedReservation.css">
    <link rel="stylesheet" href="/public/css/actors/manager/Dashboard.css">
    <link rel="stylesheet" href="/public/css/actors/manager/EmployeeDetails.css">
    <link rel="stylesheet" href="/public/css/actors/manager/EquipmentDetails.css">
    <link rel="stylesheet" href="/public/css/actors/manager/Home.css">
    <link rel="stylesheet" href="/public/css/actors/manager/ServiceDetails.css">
    <link rel="stylesheet" href="/public/css/actors/manager/UpcomingOrder.css">
    <link rel="stylesheet" href="/public/css/actors/manager/UpcomingReservation.css">

    <link rel="stylesheet" href="/public/css/actors/stl/AssignedOrders.css">
    <link rel="stylesheet" href="/public/css/actors/stl/Dashboard.css">
    <link rel="stylesheet" href="/public/css/actors/stl/Home.css">
    <link rel="stylesheet" href="/public/css/actors/stl/OrderDetails.css">

    <link rel="stylesheet" href="/public/css/actors/user/Footer.css">
    <link rel="stylesheet" href="/public/css/actors/user/Header.css">
    <link rel="stylesheet" href="/public/css/actors/user/Home.css">
    <link rel="stylesheet" href="/public/css/actors/user/Login.css">
    <link rel="stylesheet" href="/public/css/actors/user/Reviews.css">

    <link rel="stylesheet" href="/public/css/components/Forms.css">
    <link rel="stylesheet" href="/public/css/components/Buttons.css">

    <link rel="stylesheet" href="/public/css/Utilities.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/public/js/Maps.js"></script>
    <title>WandiWash</title>
</head>

<body>

    <header class="header-desk">
        <div class="header-logo-1"></div>
        <div class="buttons-header-desk">
            <button class="signupColor"><a href="/user/logout" class="header-button-login">Logout</a></button>
        </div>
        <nav>
            <ul>
                <li><a href="/user/home">Home</a></li>
                <li><a href="/review/">Reviews</a></li>
            </ul>
        </nav>
    </header>

    <header class="header-mobile">
        <div class="header-logo-2"></div>

        <nav>
            <ul class="nav-nav nav-links">
                <li><a href="/user/home">Home</a></li>
                <li><a href="/review/">Reviews</a></li>
                <li><button style="background-color: #7B113A; border-radius:10px;"><a href="/user/logout" class="header-button-logout">Logout</a></button></li>
            </ul>
        </nav>
    </header>