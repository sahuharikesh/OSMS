
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
        <div class="sidebar-sticky sidenav">
          <!-- 1 -->
            <ul class="nav flex-column">
            <li class="nav-item mt-2">
            <a href="profile.php" class="nav-link <?php if(PAGE == 'profile'){echo 'active';} ?>"><i class="fa fa-user mr-2"></i>Profile</a>
            </li>
            <!-- 2 -->
            <li class="nav-item mt-2">
            <a href="submitReq.php" class="nav-link <?php if(PAGE == 'submitReq'){echo 'active';} ?>"><i  class="fa mr-2">&#xf1d9;</i>Submit Request</a>
            </li>
            <!-- 3 -->
            <li class="nav-item mt-2">
            <a href="status.php" class="nav-link <?php if(PAGE == 'status'){echo 'active';} ?>"><i class="fa fa-align-center mr-2"></i>Service Status</a>
            </li>
            <!-- 4 -->
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