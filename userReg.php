<?php 
include('connection.php');
if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['rName'] == "")||($_REQUEST['rEmail'] == "")||($_REQUEST['rPass'] == "")){
        $regmsg1 = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required</div>';
    }else
    {  
//$sql1 = "SELECT  `email` FROM `user` WHERE email = {$_REQUEST['rEmail']}";
$sql = "SELECT email  FROM user WHERE email ='".$_REQUEST['rEmail']."'  limit 1";
$result= $conn->query($sql);
if($result->num_rows == 1){
    $regmsg1 = '<div class="alert alert-primary mt-2" role="alert">User is Already Registered</div>';
}else{
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rPass=$_REQUEST['rPass'];
$pass=md5($rPass);

$sql= "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$rName','$rEmail','$pass')";
if($conn->query($sql) == TRUE){
    $regmsg1 = '<div class="alert alert-primary mt-2" role="alert">Account Created Successfully..</div>';
}else{
    $regmsg1 = '<div class="alert alert-primary mt-2" role="alert">Faild to Create Account..</div>';
}
}
}
}
?>
<!-- registration -->
<div class="container pt-5 " id="Register">
  <b><h2 class="text-center">Create an Account</h2><hr class="w-25 mx-auto pt-3 text-dark"></b>
    <div class="row mt-4 mb-4 ">
      <div class="col-md-6 offset-md-3 ">
        <form action="" class="shadow-lg px-5 pb-5 pt-5 zoom  " method="POST" >
          <div class="form-group">
            <i class="fa fa-user"></i><label for="name" class="font-weight-bold pl-2" >Name</label>
            <input type="text" class="form-control" placeholder="Name" name="rName" autocomplete="off" required>
          </div>
          <div class="form-group">
            <i class="fa fa-envelope"></i><label for="email" class="font-weight-bold pl-2">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="rEmail" autocomplete="off" required>
            <small class="form-text"> We'll never share your email with anyone eles.</small>
          </div>
          <div class="form-group">
            <i class="fa fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="rPass">
          </div>
          <button type="submit" class="btn text-white about mt-5 btn-block shadow-sm font-weight-bold " name="rSignup">Sign Up</button>
          <em style="font-size:10px">Note- By checking Sign Up ,You agree to our Term, data and Cookie Policy</em>
            <?php if(isset($regmsg1)) { echo $regmsg1;} ?>
        </form>
      </div>
    </div>
</div><br>