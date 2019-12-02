<!-- header part -->
<?php 
define('TITLE','Change Password');
define('PAGE','changePass');
include('includes/header.php');
include('../connection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail= $_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
   
}
$rEmail= $_SESSION['rEmail'];
if(isset($_REQUEST['update'])){
    if($_REQUEST['rPass'] == ""){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Please Complete all the field..</div>';
    }else{
        $rPass = $_REQUEST['rPass'];
        $sql = "UPDATE user SET password='$rPass'  WHERE email='$rEmail'";
        if($conn->query($sql) == TRUE){
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Updated Successfully..</div>';
        }else{
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Unable to Update..</div>';
        }
    }
}

?>
<div class="col-sm-8">
    <form action="" method="post" class="mt-5 mx-5">
    <div class="form-group">
                <i class="fa fa-envelope"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                <input type="email" name="rEmail" class="form-control" placeholder="Email" readonly value="<?php echo $rEmail ?>" >
            </div>
                  <div class="form-group">
                  <i class="fa fa-key"></i><label for="pass" class="font-weight-bold pl-2">New Password</label>
            <input type="password" class="form-control" placeholder="New Password" name="rPass">
            </div>
            <button type="submit" class="btn btn-primary mr-4 mt-4" name="update">Update</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            <?php if(isset($regmsg)) { echo $regmsg;} ?>
    </form>

</div>

<!-- footer part -->
<?php 
include('includes/footer.php');
?>