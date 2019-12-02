<?php
define('TITLE','Work Order');
define('PAGE','workOrder');
 include('../connection.php');
 include('includes/header.php');
 session_start();
 if($_SESSION['is_adminlogin']){
     $aEmail=$_SESSION['aEmail'];
 }else{
    echo "<script> location.href='login.php'</script>";
}
 ?>
 <!-- view part -->
 <div class="col-sm-6 mt-5 mx-5">
    <h3 class="text-center">Assigned Work Details</h3>
    <?php 
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM `assign` WHERE rid = {$_REQUEST['id']} ";
            $result= $conn->query($sql);
            $row = $result->fetch_assoc();
         ?>
          <table class="table table-boardered">
            <tbody>
                <tr>
                    <td>Request ID</td>
                    <td><?php if(isset($row['rid'])){echo $row['rid'];} ?></td>
                </tr>
                <tr>
                    <td>Request Inf</td>
                    <td><?php if(isset($row['request'])){echo $row['request'];} ?></td>
                </tr>
                <tr>
                    <td>Request Description</td>
                    <td><?php if(isset($row['name'])){echo $row['name'];} ?></td>
                </tr>
                <tr>
                    <td>Address 1</td>
                    <td><?php if(isset($row['address1'])){echo $row['address1'];} ?></td>
                </tr>
                <tr>
                    <td>Address 2</td>
                    <td><?php if(isset($row['address2'])){echo $row['address2'];} ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php if(isset($row['city'])){echo $row['city'];} ?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php if(isset($row['state'])){echo $row['state'];} ?></td>
                </tr>
                <tr>
                    <td>Zip</td>
                    <td><?php if(isset($row['zip'])){echo $row['zip'];} ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php if(isset($row['email'])){echo $row['email'];} ?></td>
                </tr>
                <tr>
                    <td>Technician</td>
                    <td><?php if(isset($row['assign'])){echo $row['assign'];} ?></td>
                </tr>
                <tr>
                    <td>Assigned Date</td>
                    <td><?php if(isset($row['date'])){echo $row['date'];} ?></td>
                </tr>
                <tr>
                    <td>Customer Sign</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Technician Sign</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <form action="" method="post" class="mb-3 mr-3 d-print-none d-inline">
                <input type="submit" name="" id="" value="Print" class="btn btn-primary" onClick="window.print()">
                </form>
                <form action="workOrder.php" method="post" class="mb-3 mr-3 d-print-none d-inline">
                <input type="submit" value="Close" class="btn btn-secondary">
                </form>
            </form>
        </div>
    <?php } ?>
 </div>
 <!-- footer -->
<?php include('includes/footer.php');?>