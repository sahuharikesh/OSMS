<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <!-- custom CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title><?php echo TITLE ?></title>
</head>
<body>
<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="dashboard.php"><h3><b>OSMS</b></h3></a><span class="navbar-text">Customer's Happiness is our Aim</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  </button>
  </nav>
<!-- side bar -->
 
 <div class="container-fluid" >
 <div class="row">
    <nav class="col-sm-2 bg-light sidebar py-5  d-print-none">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item mt-2">
            <a href="dashboard.php" class="nav-link <?php if(PAGE == 'dashboard'){echo 'active';} ?>"><i class="fas fa-tachometer-alt mr-2 "></i>Dashboard</a>
            </li>
            <li class="nav-item mt-2">
            <a href="workOrder.php" class="nav-link <?php if(PAGE == 'workOrder'){echo 'active';} ?> "><i class="fab fa-accessible-icon mr-2"></i> Work Order</a>
            </li>
            <li class="nav-item mt-2">
            <a href="request.php" class="nav-link <?php if(PAGE == 'request'){echo 'active';} ?> "><i class="fa fa-align-center mr-2"></i> Request</a>
            </li>
            <li class="nav-item mt-2">
            <a href="assest.php" class="nav-link <?php if(PAGE == 'assest'){echo 'active';} ?> "><i class="fa fa-user mr-2"></i>Assests</a>
            </li>
            <li class="nav-item mt-2">
            <a href="technician.php" class="nav-link <?php if(PAGE == 'technician'){echo 'active';} ?>"><i class="fa fa-cogs mr-2"></i> Technician</a>
            </li>
            <li class="nav-item mt-2">
            <a href="requester.php" class="nav-link <?php if(PAGE == 'requester'){echo 'active';} ?>"><i class="fa fa-user mr-2"></i> Requester</a>
            </li>
            <li class="nav-item mt-2">
            <a href="sellReport.php" class="nav-link <?php if(PAGE == 'sellReport'){echo 'active';} ?>"><i class="fa fa-table mr-2"></i>Sell Report</a>
            </li>
            <li class="nav-item mt-2">
            <a href="workReport.php" class="nav-link <?php if(PAGE == 'workReport'){echo 'active';} ?>"><i class="fa fa-table mr-2"></i>Work Report</a>
            </li>
            <li class="nav-item mt-2">
            <a href="changePass.php" class="nav-link <?php if(PAGE == 'changePass'){echo 'active';} ?>"><i class="fa fa-key mr-2"></i>Change Passward</a>
            </li>
            <li class="nav-item mt-2">
            <a href="../logout.php" class="nav-link "><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </li>
            </ul>
        </div>
    </nav>
    <!-- end header -->