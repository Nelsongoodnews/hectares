<?php 
     if($_SESSION['accessytpe'] == "Student"){
        echo "<script>window.location='dashboard'</script>";
    }
    include("config/dblink.php");
    $connect = new Hectares();
    $tblquery = "SELECT * FROM hec_applicants";
    $tblvalue = array();
    $select=$connect->tbl_select($tblquery, $tblvalue);
        $count = count($select);
    $tblquery1 = "SELECT * FROM hec_applicants WHERE app_status = :status";
    $tblvalue1 = array(
        ':status' => "Verified"
    );
    $select1=$connect->tbl_select($tblquery1, $tblvalue1);
        $count1 = count($select1);
        $tblquery2 = "SELECT * FROM hec_applicants WHERE app_status = :status";
        $tblvalue2 = array(
            ':status' => "Not Verified"
        );
        $select2=$connect->tbl_select($tblquery2, $tblvalue2);
            $count2 = count($select2);
        
            $tblquery3 = "SELECT * FROM hec_noticeboard";
            $tblvalue3 = array();
            $select3=$connect->tbl_select($tblquery3, $tblvalue3);
                $count3 = count($select3);
    
?>

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 ml-4 mb-0 text-gray-800">Dashboard</h1>
                        <a class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color:#e4b461; color:#ffffff;"> Welcome Admin </a>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <div class="container">
                    <!-- Content Row -->
                    <div class="row">

       
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Verified Student</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count1;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
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
                                                Students Not Verified </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count2;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
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
                                                Total Students </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
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
                                                Total Notification Sent</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count3;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>