<html>
<head>
<title>Search Patient</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style='background-color:#3498DB;'>
<?php
include("func.php");
if(isset($_POST['patient_search-submit']))
{
    $contact=$_POST['search'];
    $query="select * from doctorapp where contact='$contact'";
    $result=mysqli_query($con,$query);
    echo "
    <div class='container' style='background-color:#3498DB;height:100vh;width:100%;'>
    <div class='container-fluid' style='background-color:#3498DB;'>
    <div class='card' style='background-color:#3498DB;border:none;'>
    <div class='card-body' style='background-color:#3498DB;color:#ffffff;padding-top:80px;border-color:none;'>
    <table class='table table-hover' style='color:white;'>
        <thead>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email id</th>
        <th>Contact</th>
        <th>Doctor Appointment</th>
        <th>Payment Status</th>
        </tr>
        </thead>
        <tbody>";
    while($row=mysqli_fetch_array($result)){
    $fname=$row['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $contact=$row['contact'];
    $docapp=$row['docapp'];
    $payment=$row['payment'];
    echo "<h2 style='text-align:center;margin-bottom:50px';>Search Results</h2>
    <tr>
        <td>$fname</td>
        <td>$lname</td>
        <td>$contact</td>
        <td>$email</td>
        <td>$docapp</td>
        <td>$payment</td>
        </tr>";
    }
    echo "</tbody></table></div></div></div></div></div>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>