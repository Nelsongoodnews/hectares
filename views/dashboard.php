<?php
    session_start();
    if($_SESSION['email']){
        //Continue Browsing 
    }else{
        echo "<script>window.location='login'</script>";
    }
    include("config/dblink.php");
    $connect = new Hectares();
    $tblquery = "SELECT * FROM hec_applicants WHERE app_studentID = :stID";
    $tblvalue = array(
        ':stID' => $_SESSION['studentID']
    );
    $select =$connect->tbl_select($tblquery, $tblvalue);
    foreach($select as $data){
        extract($data);
    }

    // Message Count
    $tblquery1 = "SELECT * FROM hec_mailbox WHERE mail_receiver = :mail ORDER BY sent_at";
    $tblvalue1 = array(
        ':mail' => $_SESSION['email']
    );
    $select1 =$connect->tbl_select($tblquery1, $tblvalue1);
    $count = count($select1);

    //Notice Count

    $tblquery2 = "SELECT * FROM hec_noticeboard";
    $tblvalue2 = array();
    $select2 =$connect->tbl_select($tblquery2, $tblvalue2);
    $count1 = count($select2);

    //UPcoming Event Count

    $tblquery3 = "SELECT * FROM hec_events";
    $tblvalue3 = array();
    $select3 =$connect->tbl_select($tblquery3, $tblvalue3);
    $count2 = count($select3);

?>


<?php if($url[0] == ""){
	include("includes/header.php");
}?>
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 ml-4 mb-0 text-gray-800">Dashboard</h1>
                        <a class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color:#e4b461; color:#ffffff;"> Welcome <?php  echo $_SESSION['lname'] . " " . $_SESSION['fname']; ?> </a>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 style="text-transform:uppercase;" class="h4 ml-4 mb-0 text-gray-800"><?php echo $app_surname . " " . $app_firstName . " " . $app_middleName?></h1>
                        <h1 style="text-transform:uppercase;" class="h4 ml-4 mb-0 text-gray-800">ID: <?php echo $app_studentID;?></h1>
                    </div>
                    <hr>
                </div>
                <div class="container">
                    <!-- Content Row -->
                    <div class="row">

       
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Message Received</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-inbox fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Notice Available </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count1;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Status </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $app_status;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-thermometer-three-quarters fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
      
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Upcoming Event</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count2;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>


<?php if($url[0] == ""){
	include("includes/footer.php");
}?>