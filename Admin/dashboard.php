<?php
define('TITLE','Dashboard');
define('PAGE','dashboard');
 include('../connection.php');
 include('includes/header.php');
 session_start();
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";
   
}
//for Request 
$sql1 = "SELECT count(*) FROM `request`";
$result1= $conn->query($sql1);
$row1 = mysqli_fetch_row($result1);

//for Assign
$sql2 = "SELECT count(*) FROM `assign`";
$result2= $conn->query($sql2);
$row2 = mysqli_fetch_row($result2);
//for Technician
$sql3 = "SELECT count(*) FROM `technician`";
$result3= $conn->query($sql3);
$row3 = mysqli_fetch_row($result3);

//for Technician
$sql4 = "SELECT count(*) FROM `assest`";
$result4= $conn->query($sql4);
$row4 = mysqli_fetch_row($result4);

 ?>
    <!-- dashboard -->
    <div class="col-sm-9 col-md-10">
        <div class="row text-center mx-5">
            <div class="col-sm-3 mt-5">
                <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
                    <div class="pt-3">Requests Received</div>
                    <div class="card-body">
                    <h4 class="card-title"><?php echo $row1[0];?></h4>
                    <a href="request.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width:18rem;">
                    <div class="pt-3">Assigned Work</div>
                    <div class="card-body">
                    <h4 class="card-title"><?php echo $row2[0];?></h4>
                    <a href="workOrder.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mt-5">
            <div class="card text-white bg-warning mb-3" style="max-width:18rem;">
                    <div class="pt-3">No. of Product</div>
                    <div class="card-body">
                    <h4 class="card-title"><?php echo $row4[0];?></h4>
                    <a href="assest.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width:18rem;">
                    <div class="pt-3">No. of Technician</div>
                    <div class="card-body">
                    <h4 class="card-title"><?php echo $row3[0];?></h4>
                    <a href="technician.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- requester table -->
        <div class="text-center mx-5 mt-5">
            <p class="bg-dark text-white p-2">List of Requesters</p>
               <?php   $sql = "SELECT * FROM `user`";
                    $result= $conn->query($sql);
                    if($result->num_rows > 0){
                        echo'<table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Requester ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                                </thead>
                                <tbody>';
                                    while($row = $result->fetch_assoc()){
                             echo ' <tr>';
                             echo '<td>'.$row['uid'].'</td>';
                             echo '<td>'.$row['name'].'</td>';
                             echo '<td>'.$row['email'].'</td>';
                             echo     '</tr>';
                                    }
                          echo  '</tbody>
                             </table>';
                    }
                    else{
                        echo '0 Result';
                    }
               ?>
        </div>
    </div>

    <?php include('includes/footer.php');?>