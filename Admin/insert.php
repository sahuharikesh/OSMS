<?php
define('TITLE','Add Requester');
define('PAGE','requester');
 include('../connection.php');
 include('includes/header.php');
 session_start();
 if($_SESSION['is_adminlogin']){
     $aEmail=$_SESSION['aEmail'];
 }else{
    echo "<script> location.href='login.php'</script>";  
 }
 if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['rName'] == "")||($_REQUEST['rEmail'] == "")||($_REQUEST['rPass'] == "")){
        $regmsg = '<div class="alert alert-pimary mt-2" role="alert">All Fields are Required</div>';
    }else
    {  
        $rName=$_REQUEST['rName'];
        $rEmail=$_REQUEST['rEmail'];
        $rPass=$_REQUEST['rPass'];

        $sql= "INSERT INTO `user`( `name`, `email`, `password`) VALUES ('$rName','$rEmail','$rPass')";
        if($conn->query($sql) == TRUE){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Requester Added Successfully..</div>';
        }else{
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Faild to Add Requester ..</div>';
    }
    }
 }
 ?>
<!-- Requester part -->
<div class="col-sm-6 mt-4 mx-5 jumbotron">
    <h3 class="text-center mb-3">Add New Requester</h3>
    <form action="" class="mx-3" method="POST" autocomplete="off">
          <div class="form-group">
            <i class="fa fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="rName">
          </div>
          <div class="form-group">
            <i class="fa fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="rEmail">
          </div>
          <div class="form-group">
            <i class="fa fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="rPass">
          </div>
          <button type="submit" class="btn btn-primary mt-4 mb-3 btn-block shadow-sm font-weight-bold " name="rSignup">Add</button>
          <a href="requester.php" class="btn btn-secondary   btn-block shadow-sm font-weight-bold">Close</a>
          
            <?php if(isset($regmsg)) { echo $regmsg;} ?>
        </form>
</div>
<!-- footer -->
<?php include('includes/footer.php');?>