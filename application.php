<?php
    $msg = ""; 
    include("config/dblink.php");
    $connect = new Hectares();
    $tblquery1 = "SELECT * FROM hec_applicants WHERE app_email = :email";
    $tblvalue1 = array(
        ':email' => htmlspecialchars($_POST['email'] ?? "")
    );
    $select =$connect->tbl_select($tblquery1, $tblvalue1);

    if($_POST){
        $status = "Not Verified";
        $studentID = "He" . time() . "Dm";
        $filename = time() . htmlspecialchars( basename( $_FILES["passport"]["name"]));
	    $target_dir = "uploads/";
	    $target_file = $target_dir . time() . basename($_FILES["passport"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        extract($_POST);
        $tblquery = "INSERT INTO hec_applicants VALUES(:app_ID, :app_studentID, :app_firstName, :app_middleName, :app_surname, :app_email, :app_phone, :app_passport, :app_placeOfBirth, :app_dateOfBirth, :app_gender, :app_homeAddress, :app_city, :app_state, :app_nationality, :app_religion, :app_fluentLang, :app_nFluentLang, :app_previousSchoolRecord1, :app_previousSchoolRecord2, :app_previousSchoolRecord3, :app_programOfApplication, :app_pFullname, :app_pTitle, :app_pPhone, :app_pEmail, :app_pAddress, :app_pOccupation, :app_pEmployer, :app_knowledge, :app_status, :app_feeStatus, :submitted_at)";
        $tblvalue = array(
            ':app_ID' => NULL,
            ':app_studentID' => $studentID,
           ':app_firstName' => htmlspecialchars($firstName),
           ':app_middleName' => htmlspecialchars($middlename),
           ':app_surname' => htmlspecialchars($surname),
           ':app_email' => htmlspecialchars($email),
           ':app_phone' => htmlspecialchars($telephone),
           ':app_passport' => $filename,
           ':app_placeOfBirth' => htmlspecialchars($placeOfBirth),
           'app_dateOfBirth' => htmlspecialchars($DOB),
           ':app_gender' => htmlspecialchars($gender),
           ':app_homeAddress' => htmlspecialchars($homeAddress),
           ':app_city' => htmlspecialchars($city),
           ':app_state' =>  htmlspecialchars($state),
           ':app_nationality' => htmlspecialchars($nationality),
           ':app_religion' => htmlspecialchars($religion),
           ':app_fluentLang' => htmlspecialchars($fluentLang),
           ':app_nFluentLang' => htmlspecialchars($nonFluentLang),
           ':app_previousSchoolRecord1' => htmlspecialchars($schoolAttended),
           ':app_previousSchoolRecord2' =>  htmlspecialchars($schoolAttended2),
           ':app_previousSchoolRecord3' =>  htmlspecialchars($schoolAttended3),
           ':app_programOfApplication' => htmlspecialchars($POA),
           ':app_pFullname' => htmlspecialchars($parentFname),
           ':app_pTitle' => htmlspecialchars($title),
           ':app_pPhone' => htmlspecialchars($parentTel),
           ':app_pEmail' => htmlspecialchars($parentEmail),
           ':app_pAddress' => htmlspecialchars($parentHomeAddress),
           ':app_pOccupation' => htmlspecialchars($parentOccupation),
           ':app_pEmployer' => htmlspecialchars($parentemployer),
           ':app_knowledge' => htmlspecialchars($about),
           ':app_status' => $status,
           ':app_feeStatus' => "Not Paid",
           ':submitted_at' => date("Y-m-d H:i:s")
        );
        if($select){
                $msg = "Email Address already Used!";
        }else{
        $insert =$connect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file);
            echo "<script>window.location='login'</script>";
        }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hectares of Diamond |  Application</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/logo.png">
</head>

<body class="bg-light">

    <div class="container-fluid">
    <form method="POST" action="application" class="user" enctype="multipart/form-data">
    <img src="assets/logo1.png" alt="Hectares of diamond logo" class="img-fluid d-block" style=" margin:1rem auto 0.85rem;">
    <?php
    if($select){
     
     ?>
     <div class="row mb-4">
          <div class="col-md"></div>
          <div class="col-md-8">
          <div class="card border-left-danger shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                          EMAIL ADDRESS ALREADY BEEN USED!                                      <i class="fas fa-sad fa-2x ml-4" style="color:#e4b461 !important"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
          </div>
          <div class="col-md"></div>
     </div>
    <?php    } ?>
        <div class="card o-hidden border-0 shadow-lg mb-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image1"></div>
                    <div class="col-lg-7">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h3 text-gray-900 mb-4">Apply to join us today!</h1>
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Step 1: Student Personal Details</h1>
                            </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                           name="firstName"  placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="surname"  placeholder="Surname" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                           name="middlename"  placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                       name="email" placeholder="Email Address" required>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <input type="tel" pattern="[0-9]{11}" class="form-control form-control-user" id="exampleLastName"
                                          name="telephone"  placeholder="Phone Number" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" accept="image/*" class="form-control form-control-user" id="exampleLastName"
                                          name="passport"  placeholder="Passport" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="placeOfBirth"  placeholder="Place of Birth" required>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="DOB" placeholder="Date of Birth e.g MM/DD/YYYY" onfocus="(this.type='date')" required>
                                    </div>
                                    <div class="col-sm-4">
                                    <select name="gender" class="custom-select" id="exampleInputEmail" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="homeAddress"  placeholder="Home Address" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="city" placeholder="City" required>
                                    </div>
                            </div>
                                <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="state" placeholder="State" required>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="nationality" placeholder="Nationality" required>
                                    </div>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="religion" placeholder="Religion" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Step 1B: Student Language Ability</h1>
                               </div>

                               <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="fluentLang"  placeholder="Fluent Language Atleast 3" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="nonFluentLang" placeholder="Non Fluent Language Atleast 3" required>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card o-hidden border-0 shadow-lg mb-5">
        <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-7">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Step 2: Student's Previous School Attended</h1>
                            </div>
                            <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="schoolAttended" placeholder="Name of School Attended/Start Year/End Year/Certificate"><br>
                                            
                                            <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="schoolAttended2" placeholder="Name of School Attended/Start Year/End Year/Certificate"><br>

                                            <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="schoolAttended3" placeholder="Name of School Attended/Start Year/End Year/Certificate">
                                            <div class="text-center"><br>
                                <h1 class="h4 text-gray-900 mb-4">Step 2B: Student's Program of Application</h1>
                            </div>
                            <select name="POA" class="custom-select" id="exampleInputEmail" required>
                                <optgroup label="Technical">
                                    <option value="" disabled selected>Select Program of Application</option>
                                    <option value="O Level (Upgrade Class)">O Level (Upgrade Class)</option>
                                    <option value="A Level (Upgrade Class)">A Level (Upgrade Class)</option>
                                </optgroup>
                                <optgroup label="Security Management">
                                    <option value="Diploma">Diploma</option>
                                    <option value="Certificate">Certificate</option>
                                </optgroup>
                                <optgroup label="Theology">
                                    <option value="Diploma">Diploma</option>
                                    <option value="B.Th">B.Th</option>
                                    <option value="M.Th">M.Th</option>
                                    <option value="PHD">PHD</option>
                                </optgroup>
                                    </select>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block bg-register-image2"></div>
                </div>
            </div>
        </div>
        
<div class="card o-hidden border-0 shadow-lg mb-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image3"></div>
                    <div class="col-lg-7">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Step 3: Details of Parent /Guardian /Reference</h1>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                       name="parentFname" placeholder="Full Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="title"  placeholder="Title/Initials">
                                    </div>
                                </div>
                              <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                       name="parentTel" placeholder="Telephone">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="parentEmail"  placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                       name="parentHomeAddress" placeholder="Home Address">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="parentOccupation"  placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                       name="parentemployer" placeholder="Employer">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="about"  placeholder="How did you hear about us e.g Friends/online or others">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-user btn-block" style="font-size:1.2rem; background-color:#e4b461; color:#ffffff">
                                    Submit <i class="fa fa-arrow-right"></i></button>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>