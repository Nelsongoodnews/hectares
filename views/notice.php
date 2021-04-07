<?php
     if($_SESSION['accessytpe'] == "Student"){
        echo "<script>window.location='dashboard'</script>";
    }
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">Notice Details</h1>
     <a href="noticeboard"><button style="background-color:#e4b461 !important; color:#fff !important; font-size:1rem" class="d-sm-inline-block btn btn-sm shadow-sm mx-4 px-1 py-2" id="printNone"><i style="color:#fff !important;"
                                class="fas fa-mail-bulk fa-sm text-white-50"></i> View Notice</button></a>
     </div>

     <div class="container">
     <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                                                <?php 
                                                    include("config/dblink.php");
                                                    $connect = new Hectares();
                                                    if($_GET['id']){
                                                    $tblquery = "SELECT * FROM hec_noticeboard WHERE not_ID = :id";
                                                    $tblvalue = array(
                                                        ':id' => $_GET['id']
                                                    );
                                                    $select =$connect->tbl_select($tblquery, $tblvalue);
                                                    foreach($select as $data){
                                                            extract($data);
                                                    }
                                                }
                                                  
                                                ?>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 style="color:#000 !important;" class="h5 ml-2 mb-4 text-dark-800">Notice Title: <?php echo $not_title?></h1>
     <h1 class="h5 ml-2 mb-4 text-gray-600">Date: <?php echo $created_at?></h1>
     </div>
     <h1 style="text-align:justify;" class="h5 ml-2 mb-4 text-gray-600"><?php echo $not_desc?></h1>
         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

