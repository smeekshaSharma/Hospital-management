<!DOCTYPE html>
<?php
include("func.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Patient Details</title>
</head>
<body>
<div class="jumbotron" style="background:url('images/2.jpeg') no-repeat;background-size:cover;height:300px;"></div>
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
            <div class="row">
                <div class="col-md-1">
                    <a href="admin-panel.php" class="btn btn-light">Go Back</a>
                </div>
                <div class="col-md-3"><h3>Patient Details</h3></div>
                <div class="col-md-8">
                    <form class="form-group" action="search-patient.php" method="post">
                        <div class="row">
                            <div class="col-md-10"><input type="text" name="search" class="form-control" placeholder="enter contact"></div>
                        <div class="col-md-2"><input type="submit" name="patient_search-submit" class="btn btn-light" value="Search"></div>
                        </div>
                    </form>
            </div>
            </div>
</div>
            <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
            <table class="table table-hover">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email id</th>
      <th>Contact</th>
      <th>Doctor Appointment</th>
    </tr>
  </thead>
  <tbody>
    <?php get_patient_details();?>
  </tbody>
</table>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>