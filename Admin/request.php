<?php
define('TITLE','Request');
define('PAGE','request');
 include('../connection.php');
 include('includes/header.php');
 session_start();
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";  
}
 ?>
 <!-- Request page -->
 <div class="col-sm-4">
    <?php
        $sql = "SELECT * FROM `request`";
        $result= $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '<div class="card mt-5 mx-5">';
                echo '<div class="card-header">';
                echo 'Request ID :'.$row['rid'];
                echo '</div>';
                echo '<div class="card-body ">';
                echo '<h5 class="card-title ">Request Info :'.$row['request'];
                echo '</h5>';
                echo '<p class="card-text">'.$row['description'];
                echo '</p>';
                echo '<p class="card-text">Requested Date :'.$row['date'];
                echo '</p>';
                echo '<div class="float-right mr-2">';
                echo '<form action="" method="POST">';
                echo '<input type="hidden" name="id" value='.$row["rid"].'>';
                echo '<input type="submit" value="View" class="btn btn-primary mr-3" name="view">';
                echo '<input type="submit" value="Close" class="btn btn-secondary" name="close">';
                echo '</form>';

                echo  '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    ?>
 </div>
 <!-- assign form -->

 <?php include('assignForm.php');?>

<!-- footer -->
<?php include('includes/footer.php');?>