<?php
     if($_SESSION['accessytpe'] == "Student"){
        echo "<script>window.location='dashboard'</script>";
    }
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">Create New Notice</h1>
     <a href="noticeboard"><button style="background-color:#e4b461 !important; color:#fff !important; font-size:1rem" class="d-sm-inline-block btn btn-sm shadow-sm mx-4 px-1 py-2" id="printNone"><i style="color:#fff !important;"
                                class="fas fa-mail-bulk fa-sm text-white-50"></i> View Notice</button></a>
     </div>
     <?php 
        include("config/dblink.php");
        $connect = new Hectares();
        if($_POST){
            extract($_POST);
            $tblquery = "INSERT INTO hec_noticeboard VALUES(:not_ID, :not_title, :not_desc, :created_at)";
            $tblvalue = array(
                ':not_ID' => NULL,
                ':not_title' => htmlspecialchars($title),
                ':not_desc' => htmlspecialchars($description),
                ':created_at' => date("Y-m-d H:i:s")
            );
            $mail =$connect->tbl_insert($tblquery, $tblvalue);
            if($mail){

        
     ?>
            <div class="row mb-5">
          <div class="col-md"></div>
          <div class="col-md-8">
          <div class="card border-left-success shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                          YOUR NOTICE HAS SUCCESSFULLY BEEN CREATED.                                      <i class="fas fa-smile-wink fa-2x ml-4" style="color:#e4b461 !important"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
          </div>
          <div class="col-md"></div>
     </div>
     <?php
            }
        }
     ?>
    <div class="container-fluid">
     <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-imaged"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <form method="POST" action="composenotice" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                           name="title"  placeholder="Notice Title" required>
                                    </div>
                                </div>
                                <textarea name="description" rows="12" class="form-control mb-3" required>Description Here!</textarea>
                                <button type="submit" class="btn btn-user btn-block" style="font-size:1.2rem; background-color:#e4b461; color:#ffffff">
                                    Submit <i class="fas fa-paper-plane"></i>
                                        </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>