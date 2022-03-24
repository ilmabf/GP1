<?php
include 'views/user/LoggedInHeader.php';
?>
<div class="bgImage2">

    <div id="mainbox">

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
                    <button class="review-box-button" type="button" name="login" onclick="fnCheckForRestrictedWords();">Post Review</button>
                </div>
            </form>
        </div>
    </div>

    <div class="addVehicleform" id="containn">
        <div class="forma">
            <h2 class="login-signupheader">You cannot add restricted words for the review.</h2>
            <div id="error-msg" style="font-size: medium;"></div>
            <form action="" method="post" id="delete-Address-Form"><br>
                <button id="closeErrorBtn" class="formSubmitButton" type="submit" name="signup" onclick="closeError()">Close</button>
            </form>
        </div>
    </div>

    <script src="/public/js/CustomerGiveReview.js"></script>
    <script src="/public/js/ErrorMessage.js"></script>