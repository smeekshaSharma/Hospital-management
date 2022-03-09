<?php
$con=mysqli_connect("localhost","root","","hospital");
$username=$_POST['username'];
$password=$_POST['password'];
$query="select * from login where username='$username' and password='$password'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)==1)
{
    header("Location:admin-panel.php");
}
else{
    echo"<script>alert('Error login')</script>";
    echo"<script>window.open('index.php','_self')</script>";
}
?>