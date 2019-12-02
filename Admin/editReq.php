<?php
define('TITLE','Update Requester');
define('PAGE','requester');
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
    <h3 class="text-center"> Update Requester Details</h3>
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM `user` WHERE uid = {$_REQUEST['id']}";
   $result= $conn->query($sql);
   $row = $result->fetch_assoc();
   }
   if(isset($_REQUEST['update'])){
    if(($_REQUEST['uid'] == "")||($_REQUEST['name'] == "")||($_REQUEST['email'] == "")){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Please Complete all  field..</div>';
    }else{
        $uid = $_REQUEST['uid'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $sql = "UPDATE user SET uid ='$uid', name ='$name', email ='$email'  WHERE uid ='$uid'";
        if($conn->query($sql) == TRUE){
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Updated Successfully..</div>';
        }else{
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Unable to Update..</div>';
        }
    }
}
?>
    <form action="" method="post" class="mx-3"autocomplete="off">
    <div class="form-group">
        <label for="request">Request ID</label>
        <input type="text" name="uid" id="uid" class="form-control" 
        value="<?php if(isset($row["uid"])) echo $row["uid"];?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name" 
        value="<?php if(isset($row["name"])) echo $row["name"];?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email"
         value="<?php if(isset($row["email"])) echo $row["email"];?>">
    </div>
    <div class="text-center mt-5">
    <button type="submit" class="btn btn-primary" name="update">Update</button>
    <a href="requester.php" class="btn btn-secondary" name="close">Close</a>
    </div>
    <?php if(isset($regmsg)) { echo $regmsg;} ?>
    </form>
 </div>

 <!-- footer part -->
 <?php include('includes/footer.php');?>