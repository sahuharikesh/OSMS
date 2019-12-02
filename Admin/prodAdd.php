<?php
define('TITLE','Add Product');
define('PAGE','assest');
 include('../connection.php');
 include('includes/header.php');
 session_start();
 if($_SESSION['is_adminlogin']){
     $aEmail=$_SESSION['aEmail'];
 }else{
    echo "<script> location.href='login.php'</script>";  
 }
 if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['name'] == "")||($_REQUEST['date'] == "")||($_REQUEST['available'] == "")||
    ($_REQUEST['total'] == "")||($_REQUEST['ocost'] == "")||($_REQUEST['scost'] == "")){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">All Fields are Required</div>';
    }else
    {  
        $name = $_REQUEST['name'];
        $date = $_REQUEST['date'];
        $available = $_REQUEST['available'];
        $total = $_REQUEST['total'];
        $ocost = $_REQUEST['ocost'];
        $scost = $_REQUEST['scost'];
        $sql = "INSERT INTO `assest`( `name`, `date`, `available`, `total`, `ocost`, `scost`) VALUES ('$name','$date','$available','$total','$ocost','$scost')";
        if($conn->query($sql) == TRUE){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Product Added Successfully..</div>';
        }else{
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Faild to Add Product ..</div>';
    }
    }
 }
 ?>
<!-- Requester part -->
<div class="col-sm-6 mt-4 mx-5 jumbotron">
    <h3 class="text-center mb-3">Add New Product/Part</h3>
    <form action="" class="mx-3" method="POST"autocomplete="off">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name" 
        value="<?php if(isset($row["name"])) echo $row["name"];?>">
    </div>
    <div class="form-group">
        <label for="name">DOP</label>
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
          <button type="submit" class="btn btn-primary mt-4 mb-3 btn-block shadow-sm font-weight-bold " name="rSignup">Add</button>
          <a href="assest.php" class="btn btn-secondary   btn-block shadow-sm font-weight-bold">Close</a>
          
            <?php if(isset($regmsg)) { echo $regmsg;} ?>
        </form>
</div>
<!-- footer -->
<?php include('includes/footer.php');?>