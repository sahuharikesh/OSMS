<?php
define('TITLE','Sells Report');
define('PAGE','sellReport');
 include('../connection.php');
 include('includes/header.php');
 session_start();
 if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";  
}
?>
<!-- sells report -->
<div class="col-sm-9 col-md-10 mt-5  ">
<h5 class="my-3 mx-5 d-print-none">Enter the Start and End Date </h5>
    <form action="" method="post" class="d-print-none mx-5 text-center">
    <div class="form-row">
        <div class="form-group col-md-3">
            <input type="date" name="sdate" id="sdate" class="form-control">
        </div>&nbsp;<span>to</span>&nbsp;
        <div class="form-group col-md-3">
            <input type="date" name="edate" id="edate" class="form-control">
        </div>
      <div class="form-group col-md-2">
            <input type="submit" name="search"  class="btn btn-primary" value="Search">
        </div>
        </div>
    </form>
    <?php 
        if(isset($_REQUEST['search'])){
            $sdate = $_REQUEST['sdate'];
            $edate = $_REQUEST['edate'];

            $sql = "SELECT * FROM `sell` WHERE sdate BETWEEN '$sdate' AND '$edate'";
            $result= $conn->query($sql);
                    if($result->num_rows > 0){
                        echo'<p class="bg-dark text-center p-2 mt-4 text-white">Product Sold Details</p>';
                        echo'<table class="table text-center">
                                <thead>
                                <tr>
                                    <th scope="col">Customer ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price Each</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>';
                                    while($row = $result->fetch_assoc()){
                             echo ' <tr>';
                             echo '<td>'.$row['sid'].'</td>';
                             echo '<td>'.$row['cname'].'</td>';
                             echo '<td>'.$row['address'].'</td>';
                             echo '<td>'.$row['name'].'</td>';
                             echo '<td>'.$row['quantity'].'</td>';
                             echo '<td>'.$row['scost'].'</td>';
                             echo '<td>'.$row['stotal'].'</td>';
                             echo '<td>'.$row['sdate'].'</td>';
                             echo     '</tr>';
                                    }
                          echo  '</tbody>
                             </table>';
                             echo ' <form action="" method="post" class="mb-3 mr-3 mt-3 d-print-none d-inline float-right">
                             <input type="submit" name="" id="" value="Print" class="btn btn-primary mx-4" onClick="window.print()">
                             </form>';   
                    }
                    else{
                        echo '<div class="alert alert-pimary mt-2 mr-5" role="alert">No Data Found...</div>';
                    }
        }
    ?>
</div>
<!-- footer -->
<?php include('includes/footer.php');?>