<?php

include 'UserLoggedInHeader.php';
?>

<div class="bgImage" style="height: 100%;">
<div style="min-height: 110px;"></div>
<h2 style="color: #193498; text-align:center;">Edit Employee</h3>

<form action="/employee/setUpdate" method="POST" class="empUpdateForm">
    <div class="contentform">

        <input type="hidden" name="Empid" value="<?php echo $_SESSION['employeeDetails'][$_SESSION['id']]['Employee_ID'] ?>">

        <div class="leftcontact">
            <div class="form-group">
                <p>First Name</p>
                <input type="text" name="empNewFirstName" value="<?php echo $_SESSION['employeeDetails'][$_SESSION['id']]["First_Name"] ?>">
            </div>

            <div class="form-group">
                <p>Contact Number</p>
                <input type="number" name="empNewContactNo" value="<?php echo $_SESSION['employeeDetails'][$_SESSION['id']]["Contact_Number"] ?>">
            </div>

            <div class="form-group">
                <p>Date Enrolled</p>
                <input type="date" name="empNewDateEnrolled" value="<?php echo $_SESSION['employeeDetails'][$_SESSION['id']]["Date_Enrolled"] ?>">
            </div>

            <div class="form-group">
                <p>NIC</p>
                <input type="text" name="empNewNIC" value="<?php echo $_SESSION['employeeDetails'][$_SESSION['id']]["NIC_No"] ?>">
            </div>
        </div>

        <div class="rightcontact">

            <div class="form-group">
                <p>Last Name</p>
                <input type="text" name="empNewLastName" value="<?php echo $_SESSION['employeeDetails'][$_SESSION['id']]["Last_Name"] ?>">
            </div>

            <div class="form-group">
                <p>Email</p>
                <input type="email" name="empNewEmail" value="<?php echo $_SESSION['employeeDetails'][$_SESSION['id']]["Email"] ?>">
            </div>

            <div class="form-group">
                <p>Salary</p>
                <input type="number" name="empNewSalary" value="<?php echo $_SESSION['employeeDetails'][$_SESSION['id']]["Salary"] ?>">
            </div>

            <div class="form-group">
                <p>Team</p>
                <input type="number" name="empNewTeam" value="<?php echo $_SESSION['employeeDetails'][$_SESSION['id']]["Team"] ?>">
            </div>

        </div>
    </div>

    <button type="submit" class="bouton-contact">Send</button>
</form>

