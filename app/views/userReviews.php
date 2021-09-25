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

            <div class="review-box1">
            <div class="review-header">Feedback from our customers</div>
                            <div class = "review-box">
                                <?php
                                    $count  = 0; $result = $_SESSION['reviews']; $customer = $_SESSION['customers'];
                                    while ($count < $_SESSION['rowCount']){
                                        echo "<div class = 'review-content'>";
                                        echo $result[$count]['Content'];
                                        echo "<br></div>";

                                        echo "<div class = 'review-customer'>";
                                        echo $customer[$count]['First_Name']. " ". $customer[$count]['Last_Name'];
                                        echo "</div>";
                                        
                                        echo "<div class = 'review-datetime'>";
                                        echo $result[$count]['Date']. " ". $result[$count]['Time'];
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
