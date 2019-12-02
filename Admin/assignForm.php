<?php 
 
 if($_SESSION['is_adminlogin']){
     $aEmail=$_SESSION['aEmail'];
 }else{
    echo "<script> location.href='login.php'</script>";  
 }
 if(isset($_REQUEST['view'])){
 $sql = "SELECT * FROM `request` WHERE rid = {$_REQUEST['id']}";
 $result= $conn->query($sql);
 $row = $result->fetch_assoc();
 }
// for delete request
if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM `request` WHERE rid = {$_REQUEST['id']}";
    $result= $conn->query($sql);
    if($result == TRUE){
        echo '<meta http-equiv="refresh" content= "0;URL=?closed"/>';
    }else{
        echo 'Unable to Remove';
    }
}
//assgin 
if(isset($_REQUEST['submit'])){
    // checking input
    if(($_REQUEST['rid'] == "")||($_REQUEST['request'] == "")||($_REQUEST['description'] == "")||($_REQUEST['name'] == "")||($_REQUEST['address1'] == "")||
    ($_REQUEST['address2'] == "")||($_REQUEST['city'] == "")||($_REQUEST['state'] == "")||($_REQUEST['zip'] == "")||
    ($_REQUEST['email'] == "")||($_REQUEST['mobile'] == "")|| ($_REQUEST['assign'] == "")||($_REQUEST['date'] == ""))
    {
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required</div>';
    }else{
        $rid = $_REQUEST['rid'];
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
        $assign =$_REQUEST['assign'];
        $date =$_REQUEST['date'];

        $sql = "INSERT INTO `assign`( `rid`,`request`, `description`, `name`, `address1`, `address2`, `city`, `state`, `zip`,
         `email`, `mobile`,`assign`, `date`) VALUES ('$rid','$request','$description','$name','$address1','$address2','$city','$state',
         '$zip','$email','$mobile','$assign','$date')";

        if($conn->query($sql) == TRUE){
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Work Assigned Successfully..</div>';
           // echo "<script> location.href='reqSuccess.php'</script>";
        }
        else{
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Faild to Assigne Work..</div>';
       }
    

    }
}
 ?>

 
 <!-- form -->
 <div class="jumbotron mt-5 col-sm-5">
 <form action="" method="post" class="mx-3">
    <div class="form-group">
    <h5 class="text-center mb-3">Assign Work Order Request</h5>
        <label for="request">Request ID</label>
        <input type="text" name="rid" id="rid" class="form-control" 
        value="<?php if(isset($row["rid"])) echo $row["rid"];?>" readonly>
    </div>
    <div class="form-group">
        <label for="request">Request Info</label>
        <input type="text" name="request" id="request" class="form-control" placeholder="Request Info" 
        value="<?php if(isset($row["request"])) echo $row["request"];?>">
    </div>
    <div class="form-group">
        <label for="Description">Description</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Write Description"
         value="<?php if(isset($row["description"])) echo $row["description"];?>">
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name"
         value="<?php if(isset($row["name"])) echo $row["name"];?>">
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
        <label for="Address1">Address Line 1</label>
        <input type="text" name="address1" id="address1" class="form-control" placeholder="Address Line 1"
         value="<?php if(isset($row["address1"])) echo $row["address1"];?>">
        </div>    
        <div class="col-md-6 form-group">
        <label for="Address1">Address Line 2</label>
        <input type="text" name="address2" id="address2" class="form-control" placeholder="Address Line 2" 
        value="<?php if(isset($row["address2"])) echo $row["address2"];?>">
        </div>
    </div> 
    <div class="form-row">
        <div class="col-md-4 form-group">
        <label for="City">City</label>
        <input type="text" name="city" id="city" class="form-control" placeholder="City" 
        value="<?php if(isset($row["city"])) echo $row["city"];?>">
        </div>    
        <div class="col-md-4 form-group">
        <label for="State">State</label>
        <input type="text" name="state" id="state" class="form-control" placeholder="State" 
        value="<?php if(isset($row["state"])) echo $row["state"];?>">
        </div>
        <div class="col-md-4 form-group">
        <label for="Zip">Zip</label>
        <input type="number" name="zip" id="zip" class="form-control" placeholder="Zip" 
        value="<?php if(isset($row["zip"])) echo $row["zip"];?>">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-7 form-group">
        <label for="Email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" 
        value="<?php if(isset($row["email"])) echo $row["email"];?>">
        </div>    
        <div class="col-md-5 form-group">
        <label for="Mobile">Mobile</label>
        <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile" 
        value="<?php if(isset($row["mobile"])) echo $row["mobile"];?>" >
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
        <label for="assign">Assign to Technician</label>
        <input type="text" name="assign" id="assign" class="form-control" placeholder="Assgin ">
        </div>
        <div class="col-md-6 form-group">
        <label for="Date">Date</label>
        <input type="date" name="date" id="date" class="form-control" placeholder="Date">
        </div>
        
    </div>    
    <div class="float-right mt-3">
    <button type="submit" class="btn btn-primary" name="submit">Assign</button>
    <button type="reset" class="btn btn-secondary" name="reset">Reset</button>
    </div>
    <?php if(isset($regmsg)) { echo $regmsg;} ?>
    </form>
 </div >
 