<?php 
    
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Pick Your Time</h2>
</div>

<div class="wash-date">
    <h3>Wash Date</h3>

    <div id="closeOnClick">
        <button class="btncls" onclick="closeOnClickDemo()">Click to open date picker</button>
        <input type="text" id="datedemo">

    </div>
</div>

<div class="select-time">
    <h3>Select Time Period</h3>

    <div class="select-time-box">
        <select name="time" id="time-types">
            <option value="8 am - 10 am">8 am - 10 am</option>
            <option value="12 pm - 2 pm">12 am - 2 pm</option>
            <option value="4 pm - 6 pm">4 pm - 6 pm</option>
        </select>
    </div>
</div>

<div class="next-pg">
    <button class="next-button"><a href="/booking/bookAWash3" style="color: white;">Next</a></button>
</div>
 

<?php
    include 'userFooter.php';
?>