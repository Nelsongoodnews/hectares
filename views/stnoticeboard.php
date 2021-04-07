<?php
                 if($_SESSION['accessytpe'] == "Admin"){
                        echo "<script>window.location='amdashboard'</script>";
                    }
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">Notice Board</h1>
     </div>


     <div class="container-fluid">
     <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                        <table class="table table-hover table-bordered">
                                <thead>
                                        <tr>
                                                <th>Notice</th>
                                                <th class="d-none d-sm-block">Date</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <?php 
                                                    include("config/dblink.php");
                                                    $connect = new Hectares();
                                                    $tblquery = "SELECT * FROM hec_noticeboard";
                                                    $tblvalue = array();
                                                    $select =$connect->tbl_select($tblquery, $tblvalue);
                                                    foreach($select as $data){
                                                            extract($data);
                                                  
                                                ?>
                                                <td><a href="stnotice?id=<?php echo $not_ID;?>"><?php echo mb_strimwidth($not_title, 0, 60, "...");?></a></td>
                                                <td class="d-none d-sm-block"><?php echo $created_at?></td>
                                               
                                        </tr>
                                        <?php   } ?>
                                </tbody>
                        </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
