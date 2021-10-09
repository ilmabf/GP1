<div class="bgImage">

<?php     
    
    if(isset($_SESSION['login'])){
        include 'userLoggedInHeader.php';
    }
    else{
        include 'userHeader.php';
    }
    
?>


<main>

<div id="container">

            <div class="review-box1" style = "background-color: rgb(255,255,255,0.9);">
            <div class="review-header">Feedback from our customers</div>
                            <div class = "review-box">
                                <?php
                                    $count  = 0; $result = $_SESSION['reviews']; 
                                    while ($count < $_SESSION['rowCount']){
                                        echo "<div class = 'userReview'>";
                                        echo "<div class = 'review-content'>";
                                        echo $result[$count]['Content'];
                                        echo "<br></div>";

                                        echo "<div class = 'review-customer'>";
                                        echo $result[$count]['First_Name']. " ". $result[$count]['Last_Name'];
                                        echo "</div>";
                                        
                                        echo "<div class = 'review-datetime'>";
                                        echo $result[$count]['Date']. " ". $result[$count]['Time'];
                                        echo "</div>";
                                        echo "</div>";
                                        $count = $count + 1;
                                    }
                                ?>
                            </div>
                    </div>
            </div>

    </div>
    
</main>

<?php 
    include 'userFooter.php';
?>



</html>
