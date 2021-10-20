<?php

include 'UserLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-location">
    <h2>Select Your Location</h2>
</div>

<div class="select-location">

    <div class="select-location-box">
        <form action="" method="post">
            <select name="location" id="location-types">
                <option value="ABC Road Kandy">ABC Road Kandy</option>
                <option value="23/A Galagedara">23/A Galagedara</option>
                <option value="32/C Galagedara">32/C Galagedara</option>
            </select>
        </form>
    </div>
</div>

<div class="google-location" style="text-align:center;">
    <!-- google api -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8229579296126!2d80.50619191725059!3d7.373730722101816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae341aee58e2aad%3A0xc15b721347b882fb!2sMalwathugoda%20Auto%20Service%20Station!5e0!3m2!1sen!2slk!4v1629713877312!5m2!1sen!2slk" width="70%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<div class="next-pg" style = "margin-right: 15%;">
    <button class="next-button"><a href="/booking/orderSummary" style="color: white; ">Next</a></button>
</div>
<div style="min-height: 20px;"></div>
