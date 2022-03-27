<?php
include 'views/user/LoggedInHeader.php';
?>

<div class="bgImage" style="height: 100%;">
    <div style="min-height: 110px;"></div>

    <div>
        <h1 class="stl-home-h1">Home | <?php echo date("d-m-Y"); ?></h1>

        <div class="stl-home-main">

            <div class="stl-home-main-flex">

                <div class="stlHome-block1">
                    <h3><a href="/calendar/Today" style="color:#193498;">Jobs Assigned</a></h3>
                </div>

                <div class="stlHome-block2">
                    <h3><a href="/serviceDashboard/" style="color:#193498;">Dashboard</a></h3>
                </div>

            </div>

        </div>

    </div>