<?php
$con=mysqli_connect("localhost","root","","hospital");

if(isset($_POST['pat_submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $docapp=$_POST['docapp'];
    $payment=$_POST['payment'];
    $query="insert into doctorapp(fname,lname,email,contact,docapp,payment) values('$fname','$lname','$email','$contact','$docapp','$payment')";
    $result=mysqli_query($con,$query);
    if($result)
    {
        echo"<script>window.open('appointment.php','_self')</script>";
    }
}

if(isset($_POST['login_submit'])){
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="select * from login where username='$username' and password='$password'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result))
    {
        if(isset($_SESSION)) {
            $_SESSION['username']=$username;
        }
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre>';
        header("Location:admin-panel.php");
    }
    else{
        echo "<script>alert('Enter correct login.')</script>";
        echo "<script>window.open('index.php)</script>";
    }
}

if(isset($_POST['doc_sub']))
{
    global $con;
    $name=$_POST['name'];
    $query="insert into doctb(name) values('$name')";
    $result=mysqli_query($con,$query);
    if($result)
    header("Location:adddoc.php");

}

if(isset($_POST['update_data']))
{
    $contact=$_POST['contact'];
    $payment=$_POST['payment'];
    $query="update doctorapp set payment='$payment' where contact='$contact'";
    $result=mysqli_query($con,$query);
    if($result)
    header("Location:update.php");
}

function display_docs()
{
    global $con;
    $query="select * from doctb";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
    {
        $name=$row['name'];
        echo '<option value="'.$name.'">'.$name.'</option>';
    }
        
}

function get_patient_details(){
    global $con;
    $query="select * from doctorapp";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $fname=$row['fname'];
        $lname=$row['lname'];
        $email=$row['email'];
        $contact=$row['contact'];
        $docapp=$row['docapp'];
        $payment=$row['payment'];
        echo "<tr>
        <td>$fname</td>
        <td>$lname</td>
        <td>$email</td>
        <td>$contact</td>
        <td>$docapp</td>
        <td>$payment</td>
    </tr>";
    }
} 

function display_admin_panel(){
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Admin Panel</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid" style="background-color:#3498DB;">
        <a class="navbar-brand" href="#" style="color:white;margin-left:30px;"><i class="fa fa-solid fa-hospital-user"></i> Global Hospital</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="navbar-brand" href="logout.php" style="color:#e0e0d1;font-size:15px;"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </li>
          </ul>
          <form class="form-group" action="search-patient.php" method="post">
                            <div class="row" style="margin-right:20px;width:80%;--bs-gutter-x:0.3rem;">
                                <div class="col-md-10"><input type="text" name="search" class="form-control" placeholder="Enter contact"></div>
                            <div class="col-md-2"><input type="submit" name="patient_search-submit" class="btn btn-light" value="Search"></div>
                            </div>
                        </form>
        </div>
      </div>
    </nav>
        <div class="jumbotron" id="ab1"></div>
        <div class="container-fluid" style="margin:30px;">
        <div class="row">
      <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Appointment</a>
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Payment Status</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Prescription</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Doctors Section</a>
          <a class="list-group-item list-group-item-action" id="list-attends-list" data-toggle="list" href="#list-attends" role="tab" aria-controls="attends">Attendence</a>
        </div>
      </div>
          <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-body" style="color:#404040;font-size:23px;font-weight:500;text-align:center;">
                            Create an appointment
                            </div>
                                <div class="card-body" style="font-size:15px;color:#404040;">
                                <form action="func.php" method="post">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name :</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fname" name="fname" style="width:80%;margin-left:80px;" placeholder=""><br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Last Name :</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lname" name="lname" style="width:80%;margin-left:80px;" placeholder=""><br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email id :</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" style="width:80%;margin-left:80px;" placeholder=""><br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Contact :</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" name="contact" style="width:80%;margin-left:80px;" placeholder=""><br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Doctor :</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="docapp" style="width:80%;margin-left:80px;" name="docapp">
                                    <!--<option value="Dr. Puneet Sharma From 6pm to 8pm">Dr. Puneet Sharma From 6pm to 8pm<i class=" fa fa-solid fa-caret-down"></i></option>
                                    <option value="Dr. Ashok Shetty From 4pm to 6pm">Dr. Ashok Shetty From 4pm to 6pm<i class="fa fa-solid fa-caret-down"></i></option>
                                    <option value="Dr. Shaminder Mahajan From 4pm to 6pm">Dr. Shaminder Mahajan From 2pm to 4pm<i class="fa fa-solid fa-caret-down"></i></option>
                                    <option value="Dr. Rajiv Malhotra From 4pm to 6pm">Dr. Rajiv Malhotra From 12pm to 2pm<i class="fa fa-solid fa-caret-down"></i></option> -->
                                    <?php display_docs();?>
                                    </select><br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Payment :</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="payment" style="width:80%;margin-left:80px;">
                                    <option value="Paid">Paid<i class="fa fa-solid fa-caret-down"></i></option>
                                    <option value="Pay Later">Pay Later<i class="fa fa-solid fa-caret-down"></i></option>
                                    </select><br>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" name="pat_submit" value="Create New Entry">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="card" style="width:90%;">
                        <div class="card-body" style="width:100%;">
                            <form class="form-group" method="post" action="func.php">
                                <input type="text" name="contact" class="form-control" placeholder="Enter contact"><br>
                                <select name="payment" class="form-control">
                                <option value="Paid">Paid</option>
                                <option value="Pay later">Pay later</option>
                                </select><br><hr>
                                <input type="submit" value="update" name="update_data" class="btn btn-primary">
                            </form>
                        </div>
                    </div><br><br>
                
                </div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    <div class="card" style="width:95%;">
                        <div class="card-body" style="width:100%;">
                            <form class="form-group" method="post" action="func.php">
                                <label>Doctors Name :</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter doctors name"><br>
                                <input type="submit" value="Add Doctor" name="doc_sub" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
            </div>
            </div>
        </div>
        
          <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    </html>';
}

?>