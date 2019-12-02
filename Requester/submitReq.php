<!-- header part -->
<?php 
define('TITLE','Submit Request');
define('PAGE','submitReq');
include('includes/header.php');
include('../connection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['submit'])){
    // checking input
    if(($_REQUEST['request'] == "")||($_REQUEST['description'] == "")||($_REQUEST['name'] == "")||($_REQUEST['address1'] == "")||
    ($_REQUEST['address2'] == "")||($_REQUEST['city'] == "")||($_REQUEST['state'] == "")||($_REQUEST['zip'] == "")||
    ($_REQUEST['email'] == "")||($_REQUEST['mobile'] == "")||($_REQUEST['date'] == ""))
    {
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">All Fields are Required</div>';
    }else{
        $request = $_REQUEST['request'];
        $description = $_REQUEST['description'];
        $name = $_REQUEST['name'];
        $address1 =$_REQUEST['address1'];
        $address2 =$_REQUEST['address2'];
        $city =$_REQUEST['city'];
        $state =$_REQUEST['state'];
        $zip =$_REQUEST['zip'];
        $email =$_REQUEST['email'];
        $mobile =$_REQUEST['mobile'];
        $date =$_REQUEST['date'];

        $sql = "INSERT INTO `request`( `request`, `description`, `name`, `address1`, `address2`, `city`, `state`, `zip`,
         `email`, `mobile`, `date`) VALUES ('$request','$description','$name','$address1','$address2','$city','$state',
         '$zip','$email','$mobile','$date')";

        if($conn->query($sql) == TRUE){
            $genid = mysqli_insert_id($conn);
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Request Submitted Successfully..</div>';
            $_SESSION['myid'] = $genid;
            echo "<script> location.href='reqSuccess.php'</script>";
        }else{
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Faild to Send Request..</div>';
        }
    

    }
}
?>
<div class="col-sm-9 col-md-10 mt-5 ">
<form action="" method="post" class="mx-5">
    <div class="form-group">
        <label for="request">Request Info</label>
        <input type="text" name="request" id="request" class="form-control" placeholder="Request Info" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label for="Description">Description</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Write Description" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name"autocomplete="off" required>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
        <label for="Address1">Address Line 1</label>
        <input type="text" name="address1" id="address1" class="form-control" placeholder="Address Line 1"autocomplete="off" required>
        </div>    
        <div class="col-md-6 form-group">
        <label for="Address1">Address Line 2</label>
        <input type="text" name="address2" id="address2" class="form-control" placeholder="Address Line 2"autocomplete="off" required>
        </div>
    </div> 
    <div class="form-row">
        <div class="col-md-6 form-group">
        <label for="City">City</label>
        <input type="text" name="city" id="city" class="form-control" placeholder="City" autocomplete="off" required>
        </div>    
        <div class="col-md-4 form-group">
        <label for="State">State</label>
        <input type="text" name="state" id="state" class="form-control" placeholder="State"autocomplete="off" required>
        </div>
        <div class="col-md-2 form-group">
        <label for="Zip">Zip</label>
        <input type="number" name="zip" id="zip" class="form-control" placeholder="Zip" autocomplete="off" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
        <label for="Email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" required>
        </div>    
        <div class="col-md-2 form-group">
        <label for="Mobile">Mobile</label>
        <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile"autocomplete="off" required >
        </div>
        <div class="col-md-2 form-group">
        <label for="Date">Date</label>
        <input type="date" name="date" id="date" class="form-control" placeholder="Date">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <button type="reset" class="btn btn-secondary" name="reset">Reset</button>
    <?php if(isset($regmsg)) { echo $regmsg;} ?>
    </div>
</form>

</div>


<!-- footer part -->
<?php 
include('includes/footer.php');
?>