<?php 
  
    include 'userLoggedInHeader.php';
    $details = $_SESSION['userDetails'];
?>

<main>
    <div id = "container">
    <div class="account-box1">
            <div class="account-header">My Account</div>
            <div class="account-box2">
             <div class = "account-image">    </div>   
             <div class = "account-details" >
              <?php echo $details[0]['First_Name']. " " .$details[0]['Last_Name'];?>      
</div>
                    
</div>
</div>

</main>

<?php 
    include 'userFooter.php';
?>



</html>
