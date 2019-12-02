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
<!-- work order -->
<div class="col-sm-9 col-md-10 mt-5">
<p class="bg-dark text-white text-center p-2">Work Assigned To Technician</p>
  <?php  
   $sql = "SELECT * FROM `assign`";
   $result= $conn->query($sql);
   if($result->num_rows > 0){
    echo  '<table class="table"> 
        <thead>
            <tr>
            <th scope=" col"> Req ID</th>
            <th scope=" col"> Req Info</th>
            <th scope=" col"> Name</th>
            <th scope=" col"> Address</th>
            <th scope=" col"> City</th>
            <th scope=" col">Mobile </th>
            <th scope=" col"> Technician</th>
            <th scope=" col"> Assigned Date</th>
            <th scope=" col"> Action</th>
            </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
                echo ' <tr>';
                echo '<td>'.$row['rid'].'</td>';
                echo '<td>'.$row['request'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['address1'].'</td>';
                echo '<td>'.$row['city'].'</td>';
                echo '<td>'.$row['mobile'].'</td>';
                echo '<td>'.$row['assign'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>';
                echo '<form action="viewAssign.php" method="post"class=" d-inline mr-2">';
                echo '<input type="hidden" name="id" value='.$row["rid"].'><button class="btn btn-warning" name ="view" value ="View" type="submit"><i class="fa fa-eye"></i></button>';
                echo '</form>';
                echo '<form action="" method="post" class="d-inline mr-2">';
                echo '<input type="hidden" name="id" value='.$row["rid"].'><button class="btn btn-secondary" name ="delete" value ="delete" type="submit"><i class="fa fa-trash"></i></button>';
                echo '</form>';
                echo '</td>';
                echo     '</tr>';
             }
             echo  '</tbody>
       </table>';
   }else{
       echo '0 Result';
   }
   if(isset($_REQUEST['delete'])){
   $sql = "DELETE FROM `assign` WHERE rid = {$_REQUEST['id']}";
   if($conn->query($sql) == TRUE){
       echo '<meta http-equvi="refresh" content= "0;URL=?deleted"/>';
   }else{
       echo 'Unable to delete';
   }
   }
  ?>
</div>


<!-- footer -->
<?php include('includes/footer.php');?>