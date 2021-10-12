<?php
include 'userLoggedInHeader.php';
?>
<div class="bgImage2">

    <div id="container1">

        <div class="custGiveReview">
            <div class="review-header">We need your feedback!</div>
            <form action="/review/store" method="post" id="user-login" name="loginForm">
                <div class="Givereview-box">
                    <textarea name="review" placeholder="Give us a review.." required style="height: 63px;" maxlength="255" id="the-textarea"></textarea>

                </div>
                <div id="the-count">
                    <span id="current">0</span>
                    <span id="maximum">/ 255</span>
                </div>
                <div style="margin-top: 26px;">
                    <button class="review-box-button" type="submit" name="login">Post Review</button>
                </div>
            </form>
        </div>
    </div>

    <script src="/public/js/CustomerGiveReview.js"></script>