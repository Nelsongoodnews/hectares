<?php   
        if($_SESSION['accessytpe'] == "Admin"){
            echo "<script>window.location='amdashboard'</script>";
        }
        include("config/dblink.php");
        $connect = new Hectares();
        $tblquery = "SELECT * FROM hec_applicants WHERE app_studentID = :stID";
        $tblvalue = array(
            ':stID' => $_SESSION['studentID']
        );
        $select = $connect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);
        }
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">My Profile</h1>

     </div>

     <div class="container">
            <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="card o-hidden border-0 shadow-lg mb-3">
                            <div class="card-body py-3">
                                <img src="uploads/<?php echo $app_passport;?>" width="50%" alt="passport" class="d-block" style="margin:0.75rem auto 0.45rem; border-radius:50%;">
                                <hr>
                                <h1 class="h4 mb-1 text-gray-900" style="text-transform:capitalize;">Name: <?php echo $app_surname . " " .$app_firstName; ?></h1>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                    <div class="card o-hidden border-0 shadow-lg mb-3">
                            <div class="card-body p-3">
                            <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Student ID: <?php echo $app_studentID;?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Email: <?php echo $app_email; ?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Telephone: <?php echo $app_phone; ?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Place of Birth: <?php echo $app_placeOfBirth; ?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Date of Birth: <?php echo $app_dateOfBirth; ?></h1>
                                <hr>
                                <h1 class="h6 ml-2 mb-1 text-gray-900" style="text-transform:capitalize;">Religion: <?php echo $app_religion; ?></h1>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                    <div class="card o-hidden border-0 shadow-lg mb-3">
                            <div class="card-body p-3">
                            <h1 class="h6 ml-2 mb-1 text-gray-900" style="text-transform:capitalize;">Gender: <?php echo $app_gender;?></h1>
                                <hr>
                                <h1 class="h6 ml-2 mb-1 text-gray-900" style="text-transform:capitalize;">Home Address: <?php echo $app_homeAddress; ?></h1>
                                <hr>
                                <h1 class="h6 ml-2 mb-1 text-gray-900" style="text-transform:capitalize;">City: <?php echo $app_city; ?></h1>
                                <hr>
                                <h1 class="h6 ml-2 mb-1 text-gray-900" style="text-transform:capitalize;">State: <?php echo $app_state; ?></h1>
                                <hr>
                                <h1 class="h6 ml-2 mb-1 text-gray-900" style="text-transform:capitalize;">nationality: <?php echo $app_nationality; ?></h1>
                                <hr>
                                <h1 class="h6 ml-2 mb-1 text-gray-900" style="text-transform:capitalize;">Fluent Languages: <?php echo $app_fluentLang; ?></h1>
                                <hr>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="card o-hidden border-0 shadow-lg mb-3">
                            <div class="card-body p-3">
                            <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Non-fluent Languages:: <?php echo $app_nFluentLang;?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Previous School Record (1): <?php echo $app_previousSchoolRecord1; ?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Previous School Record (2): <?php echo $app_previousSchoolRecord2; ?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Previous School Record (3): <?php echo $app_previousSchoolRecord3; ?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Programme: <?php echo $app_programOfApplication; ?></h1>
                                <hr>
                                <h1 class="h6 ml-2 mb-1 text-gray-900" style="text-transform:capitalize;">Parent's Full Name: <?php echo $app_pFullname; ?></h1>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                    <div class="card o-hidden border-0 shadow-lg mb-3">
                            <div class="card-body p-3">
                            <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Parent's Title: <?php echo $app_pTitle;?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Parent's Telephone: <?php echo $app_pPhone; ?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Parent's Email: <?php echo $app_pEmail; ?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Parent's Address: <?php echo $app_pAddress; ?></h1>
                                <hr>
                                <h1 class="h6 mb-1 text-gray-900" style="text-transform:capitalize;">Parent's Occupation: <?php echo $app_pOccupation; ?></h1>
                                <hr>
                                <h1 class="h6 ml-2 mb-1 text-gray-900" style="text-transform:capitalize;">Parent's Employer: <?php echo $app_pEmployer; ?></h1>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4"></div>
            </div>
     </div>

