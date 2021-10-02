<div class="bgImage">
<?php 
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>
<main>

    <div id="container">
            
            <div class="review-box1">
                    <div class="review-header">We need your feedback!</div>
                        <form action="/user/home" method="post" id="user-login" name="loginForm" >
                            <div class = "review-box">
                            <textarea name="review" placeholder="Give us a review.." required style = "height:200px" ></textarea>
                            </div>
                            <button class="review-box-button" type="submit" name="login">Post Review</button>
                        </form>
                    </div>
            </div>

    </div>

</main>


<?php 
    include 'userFooter.php';
?>

</div>




</html>

</div>
