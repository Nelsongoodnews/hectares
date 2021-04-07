<?php
    session_start();
    if($_SESSION['email']){
        //Continue Browsing 
    }else{
        echo "<script>window.location='login'</script>";
    }
    if($url[0] == "viewstudent"){
        $active1 ="active";
    }elseif($url[0] == "amdashboard"){
        $active2 ="active";
    }
    elseif($url[0] == "applicantstatus"){
        $active3 ="active";
    }
    elseif($url[0] == "fullmail"){
        $active4 ="active";
    }
    elseif($url[0] == "compose"){
        $active4 ="active";
    }
    elseif($url[0] == "mailbox"){
        $active4 ="active";
    }
    elseif($url[0] == "noticeboard"){
        $active5 ="active";
    }
    elseif($url[0] == "notice"){
        $active5 ="active";
    }
    elseif($url[0] == "composenotice"){
        $active5 ="active";
    }
    elseif($url[0] == "feestatus"){
        $active6 ="active";
    }
    elseif($url[0] == "upcomingevents"){
        $active7 ="active";
    }
    elseif($url[0] == "addevent"){
        $active7 ="active";
    }
    elseif($url[0] == "stnoticeboard"){
        $active8 ="active";
    }
    elseif($url[0] == "stnotice"){
        $active8 ="active";
    }
    elseif($url[0] == "stmessage"){
        $active9 ="active";
    }
    elseif($url[0] == "stfullmail"){
        $active9 ="active";
    }
    elseif($url[0] == "stupcomingevents"){
        $active10 ="active";
    }
    elseif($url[0] == "stfeestatus"){
        $active11 ="active";
    }
    elseif($url[0] == "dashboard"){
        $active12 ="active";
    }
    elseif($url[0] == "myprofile"){
        $active13 ="active";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="School Management Application">
    <meta name="author" content="">

    <title>Hectares of Diamond</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/logo.png">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="assets/logo2.png" alt="app's icon">
                </div>
                <div class="sidebar-brand-text mx-3">Hectares of Diamond</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php if($_SESSION['accessytpe'] == "Student"){

           
            
            ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $active12;?>">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Message -->
            <li class="nav-item <?php echo $active9;?>">
                <a class="nav-link" href="stmessage">
                <i class="fas fa-inbox"></i>
                    <span>Message</span></a>
            </li>

            <!-- Nav Item - Notice -->
            <li class="nav-item <?php echo $active8;?>">
                <a class="nav-link" href="stnoticeboard">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Notice Board</span></a>
            </li>

            <li class="nav-item <?php echo $active10;?>">
                <a class="nav-link" href="stupcomingevents">
                <i class="fas fa-calendar-week"></i>
                    <span>Upcoming Events</span></a>
            </li>

            <!-- Nav Item - status -->
            <li class="nav-item <?php echo $active11;?>">
                <a class="nav-link" href="stfeestatus">
                <i class="fas fa-money-check"></i>
                    <span>Fee Status</span></a>
            </li>

            <li class="nav-item <?php echo $active13;?>">
                <a class="nav-link" href="myprofile">
                <i class="fas fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="logout">
                <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <?php  
            
        }    
            
            ?>
            <?php 
            if($_SESSION['accessytpe'] == "Admin"){
            ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $active2;?>">
                <a class="nav-link" href="amdashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
                
            <!-- Nav Item - Message -->
            <li class="nav-item <?php echo $active1;?>">
                <a class="nav-link" href="viewstudent">
                <i class="fas fa-user-graduate"></i>
                    <span>View all Students</span></a>
            </li>

            <!-- Nav Item - Message -->
            <li class="nav-item <?php echo $active3;?>">
                <a class="nav-link" href="applicantstatus">
                <i class="fas fa-thermometer-three-quarters"></i>
                    <span>Update Applicant Status</span></a>
            </li>

            <!-- Nav Item - Message -->
            <li class="nav-item <?php echo $active4;?>">
                <a class="nav-link" href="mailbox">
                <i class="fas fa-inbox"></i>
                    <span>MailBox</span></a>
            </li>

            <li class="nav-item <?php echo $active5;?>">
                <a class="nav-link" href="noticeboard">
                <i class="fas fa-chess-board"></i>
                    <span>Notice Board</span></a>
            </li>

            <li class="nav-item <?php echo $active7;?>">
                <a class="nav-link" href="upcomingevents">
                <i class="fas fa-calendar-week"></i>
                    <span>Upcoming Events</span></a>
            </li>

            <li class="nav-item <?php echo $active6;?>">
                <a class="nav-link" href="feestatus">
                <i class="fas fa-thermometer-three-quarters"></i>
                    <span>Update Fee Status</span></a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="logout">
                <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <?php }?>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['email']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

