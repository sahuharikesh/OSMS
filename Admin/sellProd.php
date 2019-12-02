<?php
define('TITLE','Selling Product');
define('PAGE','assest');
 include('../connection.php');
 include('includes/header.php');
 session_start();
 if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";  
}
if(isset($_REQUEST['sellProd'])){
    if(($_REQUEST['cname'] == "")||($_REQUEST['address'] == "")||($_REQUEST['quantity'] == "")||
    ($_REQUEST['stotal'] == "")||($_REQUEST['sdate'] == "")){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">All Fields are Required</div>';
    }else
    {  
        $pid = $_REQUEST['pid'];
        $cname = $_REQUEST['cname'];
        $address = $_REQUEST['address'];
        $name = $_REQUEST['name'];
        $quantity = $_REQUEST['quantity'];
        $scost = $_REQUEST['scost'];
        $stotal = $_REQUEST['stotal'];
        $sdate = $_REQUEST['sdate'];
        $available = $_REQUEST['available'] - $_REQUEST['quantity'];
        
        $sql = "INSERT INTO `sell`( `cname`, `address`, `name`, `quantity`, `scost`, `stotal`, `sdate`) VALUES ('$cname','$address','$name','$quantity','$scost','$stotal','$sdate')";
        //$sql = "INSERT INTO `assest`( `name`, `date`, `available`, `total`, `ocost`, `scost`) VALUES ('$name','$date','$available','$total','$ocost','$scost')";
        if($conn->query($sql) == TRUE){
            $genid = mysqli_insert_id($conn);
            session_start();
            $_SESSION['myid'] = $genid;
        //$regmsg = '<div class="alert alert-warning mt-2" role="alert">Product Added Successfully..</div>';
        echo "<script> location.href='sellSuccess.php'</script>";
        }
        $usql = "UPDATE `assest` SET `available`='$available' WHERE pid ='$pid'";
        $conn->query($usql);
        //else{
       // $regmsg = '<div class="alert alert-warning mt-2" role="alert">Faild to Add Product ..</div>';
   // }
    }
 }
 ?>
<!-- edit part -->
<div class="col-sm-6 mt-5 mx-5 jumbotron">
    <h3 class="text-center"> Customer Bill </h3>
  <?php 
   if(isset($_REQUEST['sell'])){
   $sql = "SELECT * FROM `assest` WHERE pid = {$_REQUEST['id']}";
   $result= $conn->query($sql);
   $row = $result->fetch_assoc();
   } 
?>
    <form action="" method="post" class="mx-3"autocomplete="off">
    <div class="form-group">
        <label for="request">Product ID</label>
        <input type="text" name="pid" id="pid" class="form-control" 
        value="<?php if(isset($row["pid"])) echo $row["pid"];?>" readonly>
    </div>
    <div class="form-group">
        <label for="cname">Customer Name</label>
        <input type="text" name="cname" id="cname" class="form-control" placeholder="Customer Name" 
        value="<?php if(isset($row["cname"])) echo $row["cname"];?>">
    </div>
    <div class="form-group">
        <label for="address">Customer Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Customer Address" 
        value="<?php if(isset($row["address"])) echo $row["address"];?>">
    </div>
    <div class="form-group">
        <label for="cname">Product Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Product Name" readonly
        value="<?php if(isset($row["name"])) echo $row["name"];?>">
    </div>

    <div class="form-group">
        <label for="available">Available</label>
        <input type="text" name="available" id="available" class="form-control" placeholder="available" readonly
        value="<?php if(isset($row["available"])) echo $row["available"];?>">
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="quantity"
         value="<?php if(isset($row["quantity"])) echo $row["quantity"];?>">
    </div>

    <div class="form-group">
        <label for="scost"> Price Each Product</label>
        <input type="number" name="scost" id="scost" class="form-control" placeholder="scost" readonly
         value="<?php if(isset($row["scost"])) echo $row["scost"];?>">
    </div>
    <div class="form-group">
        <label for="total">Total Price</label>
        <input type="number" name="stotal" id="stotal" class="form-control" placeholder="stotal"
         value="<?php if(isset($row["stotal"])) echo $row["stotal"];?>">
    </div>
    <div class="form-group">
        <label for="date">Selling Date</label>
        <input type="date" name="sdate" id="sdate" class="form-control" placeholder="sdate"
         value="<?php if(isset($row["sdate"])) echo $row["sdate"];?>">
    </div>
    <div class="text-center mt-5">
    <button type="submit" class="btn btn-primary" name="sellProd">Submit</button>
    <a href="assest.php" class="btn btn-secondary" name="close">Close</a>
    </div>
    <?php if(isset($regmsg)) { echo $regmsg;} ?>

    </form>
 </div>
 <!-- footer -->
<?php include('includes/footer.php');?>