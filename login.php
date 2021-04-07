<?php   
        $msg = "";
        include("config/dblink.php");
        $connect = new Hectares();
        session_start();
        if($_POST){
            extract($_POST);
            $_SESSION['email'] = htmlspecialchars($email);
            $tblquery = "SELECT * FROM hec_applicants WHERE app_email = :email && app_phone = :telephone && app_status = :status";
            $tblvalue = array(
                ':email' => htmlspecialchars($email),
                ':telephone' => htmlspecialchars($password),
                ':status' => "Verified"
            );
            $authenticate =$connect->tbl_select($tblquery, $tblvalue);
            if($authenticate){
                echo "<script>window.location='dashboard'</script>";
                $_SESSION['accessytpe'] = "Student";
            }else{
                $msg = "Login Failed check Credentials";
            }
            foreach($authenticate as $data){
                extract($data);
            }
            $_SESSION['studentID'] = $app_studentID ?? "";
            $_SESSION['fname'] = $app_firstName ?? "";
            $_SESSION['lname'] = $app_surname ?? "";
            $_SESSION['email'] = $app_email ?? "";
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

    <title>Hectares of Diamond | Login</title>

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

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <img src="assets/logo1.png" alt="hectares of diamond's logo" class="img-fluid d-block" style=" margin:1.85rem auto 0.85rem;">
                <?php if($_POST){ if($authenticate){} else{?>
                    <div class="row mb-5">
          <div class="col-md"></div>
          <div class="col-md-8">
          <div class="card border-left-danger shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                        LOGIN FAILED CHECK CREDENTIALS                                   <i class="fas fa-smile-wink fa-2x ml-4" style="color:#c0392b !important"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
          </div>
          <div class="col-md"></div>
     </div>
                <?php }}?>
                <div class="card o-hidden border-0 shadow-lg mb-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="login">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block" style="font-size:1.2rem; background-color:#e4b461; color:#ffffff">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="application">Not Yet a Student? Apply Here!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

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