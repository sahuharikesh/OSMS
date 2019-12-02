<?php
define('TITLE','Update Product');
define('PAGE','assest');
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
    <h3 class="text-center"> Update Product Details</h3>
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM `assest` WHERE pid = {$_REQUEST['id']}";
   $result= $conn->query($sql);
   $row = $result->fetch_assoc();
   }
   if(isset($_REQUEST['update'])){
    if(($_REQUEST['pid'] == "")||($_REQUEST['name'] == "")||($_REQUEST['date'] == "")||($_REQUEST['available'] == "")||
    ($_REQUEST['total'] == "")||($_REQUEST['ocost'] == "")||($_REQUEST['scost'] == "")){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Please Complete all  field..</div>';
    }else{
        $pid = $_REQUEST['pid'];
        $name = $_REQUEST['name'];
        $date = $_REQUEST['date'];
        $available = $_REQUEST['available'];
        $total = $_REQUEST['total'];
        $ocost = $_REQUEST['ocost'];
        $scost = $_REQUEST['scost'];
        //$sql = "UPDATE assest SET pid ='$pid', name ='$name', date ='$date', mobile ='$mobile', available ='$available', total ='$total', ocost ='$ocost', scost ='$scost'  WHERE pid ='$pid'";
        $sql = "UPDATE `assest` SET `pid`='$pid',`name`='$name',`date`='$date',`available`='$available',`total`='$total',`ocost`='$ocost',`scost`='$scost' WHERE pid ='$pid'";
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
        <label for="request">Product ID</label>
        <input type="text" name="pid" id="pid" class="form-control" 
        value="<?php if(isset($row["pid"])) echo $row["pid"];?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name" 
        value="<?php if(isset($row["name"])) echo $row["name"];?>">
    </div>
    <div class="form-group">
        <label for="name">Date Of Purchase</label>
        <input type="date" name="date" id="date" class="form-control" placeholder="date" 
        value="<?php if(isset($row["date"])) echo $row["date"];?>">
    </div>
    <div class="form-group">
        <label for="available">Available</label>
        <input type="text" name="available" id="available" class="form-control" placeholder="available" 
        value="<?php if(isset($row["available"])) echo $row["available"];?>">
    </div>
    <div class="form-group">
        <label for="total">Total Cost</label>
        <input type="text" name="total" id="total" class="form-control" placeholder="total"
         value="<?php if(isset($row["total"])) echo $row["total"];?>">
    </div>
    <div class="form-group">
        <label for="ocost">Original Cost</label>
        <input type="text" name="ocost" id="ocost" class="form-control" placeholder="ocost"
         value="<?php if(isset($row["ocost"])) echo $row["ocost"];?>">
    </div>
    <div class="form-group">
        <label for="scost">Selling Price</label>
        <input type="text" name="scost" id="scost" class="form-control" placeholder="scost"
         value="<?php if(isset($row["scost"])) echo $row["scost"];?>">
    </div>
    <div class="text-center mt-5">
    <button type="submit" class="btn btn-primary" name="update">Update</button>
    <a href="assest.php" class="btn btn-secondary" name="close">Close</a>
    </div>
    <?php if(isset($regmsg)) { echo $regmsg;} ?>

    </form>
 </div>

 <!-- footer part -->
 <?php include('includes/footer.php');?>