<!-- header part -->
<?php 
session_start();
define('TITLE','Request Success');
define('PAGE','submitReq');
include('includes/header.php');
include('../connection.php');
if($_SESSION['is_login']){
    $rEmail= $_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
   
}
$sql = "SELECT * FROM `request` WHERE rid = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    echo "<div class='mt-5 ml-5'>
        <h4 class='text-center mt-5 mb-4'> Request Receipt</h4>
        <table class='table'>
        <tbody>
        <tr>
        <th>Request ID</th>
        <td>".$row['rid']."</td>
        </tr>
        <tr>
        <th>Name</th>
        <td>".$row['name']."</td>
        </tr>
        <tr>
        <th>Email ID</th>
        <td>".$row['email']."</td>
        </tr>
        <tr>
        <th>Request Info</th>
        <td>".$row['request']."</td>
        </tr>
        <tr>
        <th>Request Description</th>
        <td>".$row['description']."</td>
        </tr>
        </tbody>
        </table>
        <form class='d-print-none mt-3'><input class='btn btn-primary' type='submit' value='Print' onClick='window.print()'></form>
        </div>  ";
}
else{
    echo" faild";
}
?>

<!-- footer part -->
<?php 
include('includes/footer.php');
?>