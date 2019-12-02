<?php 
define('TITLE','Requester Profile');
define('PAGE','profile');
include('includes/header.php');
include('../connection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}
$sql = "SELECT email, name  FROM user WHERE email ='".$rEmail."' limit 1";
$result = $conn->query($sql);
if($result->num_rows ==1){
    $row = $result->fetch_assoc();
    $rName = $row['name'];
}
//update details
if(isset($_REQUEST['update'])){
    if($_REQUEST['rName'] == ""){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Please Complete all the field..</div>';
    }else{
        $rName = $_REQUEST['rName'];

        $sql = "UPDATE user SET name = '$rName' WHERE email='$rEmail'";
        if($conn->query($sql) == TRUE){
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Updated Successfully..</div>';
        }else{
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Unable to Update..</div>';
        }
    }
}
?>
    <!-- profile area -->
    <div class="col-sm-6">
        <form action="" method="post" class="pt-5 mx-5">
            <div class="form-group">
                <label for="email">Email</label><input type="email" name="rEmail" id="rEmail" class="form-control"
                 readonly value="<?php echo $rEmail ?>">
            </div>
            <div class="form-group">
                <label for="name">Name</label><input type="text" name="rName" id="rName" class="form-control"
                value="<?php echo $rName ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <?php if(isset($regmsg)) { echo $regmsg;} ?>
        </form>
    </div>
 
 <!-- footer part -->
<?php 
include('includes/footer.php');
?>