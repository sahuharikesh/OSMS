<!-- header part -->
<?php 
define('TITLE','Status');
define('PAGE','status');
include('includes/header.php');
include('../connection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}
?>
<!-- status check -->
<div class="col-sm-6 mt-5 mx-5">
    <form action="" method="post" class="form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checklist" class="mr-2">Enter Request ID:</label>
            <input type="number" name="checked" id="checked" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Search</button>
    </form>
    <?php
        if(isset($_REQUEST['checked'])){
            if($_REQUEST['checked'] == ""){
                $regmsg = '<div class="alert alert-primary mt-2" role="alert">Please Enter the Request ID..</div>';
            }else{
        $sql = "SELECT * FROM `assign` WHERE rid = {$_REQUEST['checked']} ";
        $result= $conn->query($sql);
        $row = $result->fetch_assoc();
       if(($row['rid'] == $_REQUEST['checked'])) {
    ?>
    <h3 class="text-center mt-5"> Assigned Work Details</h3>
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
                
            </tbody>
        </table>
        <div class="text-center">
            <form action="" method="post" class="mb-3 mr-3 d-print-none">
                <input type="submit" name="" id="" value="Print" class="btn btn-primary" onClick="window.print()">
                <input type="submit" value="Close" class="btn btn-secondary">
            </form>
        </div>
    <?php }else{
        echo '<div class="alert alert-info mt-4">Your Request is Still Pending..</div>';
    }
    }
 }?>
         <?php if(isset($regmsg)) { echo $regmsg;} ?>

</div>


<!-- footer part -->
<?php 
include('includes/footer.php');
?>