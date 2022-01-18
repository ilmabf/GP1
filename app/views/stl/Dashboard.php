<?php
include 'views/user/LoggedInHeader.php';
?>
<div style="min-height: 110px;"></div>
<div>
    <h1 class="stl-dashboard-h1">Dashboard</h1>
    <?php print_r($_SESSION['typeOfBookings']);?>
</div>

<div style="min-height: 50px;"></div>

<div class="stlChartsR1">
    <img src="/public/images/stlChart1.png" class="stlChart1">
    <img src="/public/images/ManagerChart3.png" class="stlChart3">
</div>

<div class="stlChartsR2">
</div>