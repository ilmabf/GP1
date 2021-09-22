<?php 
    
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-location">
    <h2>Select Your Location</h2>
</div>

<div class="select-location">

    <div class="select-location-box">
        <select name="location" id="location-types">
            <option value="ABC Road Kandy">ABC Road Kandy</option>
            <option value="23/A Galagedara">23/A Galagedara</option>
            <option value="32/C Galagedara">32/C Galagedara</option>
        </select>
    </div>
</div>

<div class="google-location">
    <!-- google api -->
</div>

<div class="next-pg">
    <button class="next-button"><a href="/booking/orderSummary" style="color: white;">Next</a></button>
</div>

<?php
    include 'userFooter.php';
?>