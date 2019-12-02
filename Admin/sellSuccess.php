<!-- header part -->
<?php 
session_start();
define('TITLE','Sell Success');
define('PAGE','sellProd');
include('includes/header.php');
include('../connection.php');
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";  
}
$sql = "SELECT * FROM `sell` WHERE sid = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    echo "<div class='mx-5'>
        <h4 class='text-center mt-5 mb-4'> Product Bill</h4>
        <table class='table'>
        <tbody>
        <tr>
        <th>Customer ID</th>
        <td>".$row['sid']."</td>
        </tr>
        <tr>
        <th>Customer Name</th>
        <td>".$row['cname']."</td>
        </tr>
        <tr>
        <th>Address</th>
        <td>".$row['address']."</td>
        </tr>
        <tr>
        <th>Product Name</th>
        <td>".$row['name']."</td>
        </tr>
        <tr>
        <th>Purchase Quantity</th>
        <td>".$row['quantity']."</td>
        </tr>
        <tr>
        <th>Price Per Unit</th>
        <td>".$row['scost']."</td>
        </tr>
        <tr>
        <th>Total Cost</th>
        <td>".$row['stotal']."</td>
        </tr>
        <tr>
        <th>Selling Date</th>
        <td>".$row['sdate']."</td>
        </tr>
        </tbody>
        </table>
        <div class='text-center'>
        <form action='' method='post' class='mb-3 mr-3 d-print-none d-inline'>
            <input type='submit' value='Print' class='btn btn-primary' onClick='window.print()'>
            <a href ='assest.php'  class='btn btn-secondary'd-print-none> Close</a>  
        </form>
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