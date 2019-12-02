<?php
define('TITLE','Update Technician');
define('PAGE','technician');
 include('../connection.php');
 include('includes/header.php');
 session_start();
 if($_SESSION['is_adminlogin']){
     $aEmail=$_SESSION['aEmail'];
 }else{
    echo "<script> location.href='login.php'</script>";  
 }
 ?>
 <!-- edit part -->
 <div class="col-sm-6 mt-5 mx-5 jumbotron">
    <h3 class="text-center"> Update Technician Details</h3>
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM `technician` WHERE tid = {$_REQUEST['id']}";
   $result= $conn->query($sql);
   $row = $result->fetch_assoc();
   }
   if(isset($_REQUEST['update'])){
    if(($_REQUEST['tid'] == "")||($_REQUEST['name'] == "")||( $_REQUEST['city'] == "")||($_REQUEST['mobile'] == "")||($_REQUEST['email'] == "")){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Please Complete all  field..</div>';
    }else{
        $tid = $_REQUEST['tid'];
        $name = $_REQUEST['name'];
        $city = $_REQUEST['city'];
        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];
        $sql = "UPDATE technician SET tid ='$tid', name ='$name', city ='$city', mobile ='$mobile', email ='$email'  WHERE tid ='$tid'";
        if($conn->query($sql) == TRUE){
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Updated Successfully..</div>';
        }else{
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Unable to Update..</div>';
        }
    }
}
?>
    <form action="" method="post" class="mx-3" autocomplete="off">
    <div class="form-group">
        <label for="request">Technician ID</label>
        <input type="text" name="tid" id="tid" class="form-control" 
        value="<?php if(isset($row["tid"])) echo $row["tid"];?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name" 
        value="<?php if(isset($row["name"])) echo $row["name"];?>">
    </div>
    <div class="form-group">
        <label for="name">City</label>
        <input type="text" name="city" id="city" class="form-control" placeholder="City" 
        value="<?php if(isset($row["city"])) echo $row["city"];?>">
    </div>
    <div class="form-group">
        <label for="name">Mobile</label>
        <input type="number" name="mobile" id="mobile" class="form-control" placeholder="mobile" 
        value="<?php if(isset($row["mobile"])) echo $row["mobile"];?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email"
         value="<?php if(isset($row["email"])) echo $row["email"];?>">
    </div>
    <div class="text-center mt-5">
    <button type="submit" class="btn btn-primary" name="update">Update</button>
    <a href="technician.php" class="btn btn-secondary" name="close">Close</a>
    </div>
    <?php if(isset($regmsg)) { echo $regmsg;} ?>
    </form>
 </div>

 <!-- footer part -->
 <?php include('includes/footer.php');?>