<?php
define('TITLE','Insert Technician');
define('PAGE','technician');
 include('../connection.php');
 include('includes/header.php');
 session_start();
 if($_SESSION['is_adminlogin']){
     $aEmail=$_SESSION['aEmail'];
 }else{
    echo "<script> location.href='login.php'</script>";  
 }
 if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['rName'] == "")||($_REQUEST['city'] == "")||($_REQUEST['mobile'] == "")||($_REQUEST['rEmail'] == "")){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">All Fields are Required</div>';
    }else
    {  
        $rName=$_REQUEST['rName'];
        $city=$_REQUEST['city'];
        $mobile=$_REQUEST['mobile'];
        $rEmail=$_REQUEST['rEmail'];
        $sql = "INSERT INTO `technician`( `name`, `city`, `mobile`, `email`) VALUES ('$rName','$city','$mobile','$rEmail')";
        //$sql= "INSERT INTO `user`( `name`, `email`, `password`) VALUES ('$rName','$rEmail','$rPass')";
        if($conn->query($sql) == TRUE){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Technician Added Successfully..</div>';
        }else{
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Faild to Add Technician ..</div>';
    }
    }
 }
 ?>
<!-- Requester part -->
<div class="col-sm-6 mt-4 mx-5 jumbotron">
    <h3 class="text-center mb-3">Add New Technician</h3>
    <form action="" class="mx-3" method="POST"autocomplete="off">
          <div class="form-group">
            <i class="fa fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="rName">
          </div>
          <div class="form-group">
            <i class="fa fa-bar"></i><label for="city" class="font-weight-bold pl-2">City</label>
            <input type="text" class="form-control" placeholder="City" name="city">
          </div>
          <div class="form-group">
            <i class="fa fa-phone"></i><label for="mobile" class="font-weight-bold pl-2">Mobile</label>
            <input type="number" class="form-control" placeholder="Password" name="mobile">
          </div>
          <div class="form-group">
            <i class="fa fa-envelope"></i><label for="email" class="font-weight-bold pl-2">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="rEmail">
          </div>
          <button type="submit" class="btn btn-primary mt-4 mb-3 btn-block shadow-sm font-weight-bold " name="rSignup">Add</button>
          <a href="technician.php" class="btn btn-secondary   btn-block shadow-sm font-weight-bold">Close</a>
          
            <?php if(isset($regmsg)) { echo $regmsg;} ?>
        </form>
</div>
<!-- footer -->
<?php include('includes/footer.php');?>