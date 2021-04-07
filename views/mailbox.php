<?php
                 if($_SESSION['accessytpe'] == "Student"){
                        echo "<script>window.location='dashboard'</script>";
                    }
?>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">MailBox</h1>                   
<a href="compose"><button style="background-color:#e4b461 !important; color:#fff !important; font-size:1rem" class="d-sm-inline-block btn btn-sm shadow-sm mx-4 px-1 py-2" id="printNone"><i style="color:#fff !important;"
                                class="fas fa-paper-plane fa-sm text-white-50"></i>  Compose a Mail</button></a>
                    </div>


                    <div class="container-fluid">
     <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-2">
                        <div style="overflow-x:auto;">
                        <table class="table table-hover table-bordered">
                                <thead>
                                        <tr>
                                                <th>Message</th>
                                                <th class="d-none d-sm-block">Date</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <?php 
                                                    include("config/dblink.php");
                                                    $connect = new Hectares();
                                                    $tblquery = "SELECT * FROM hec_mailbox ORDER BY sent_at";
                                                    $tblvalue = array();
                                                    $select =$connect->tbl_select($tblquery, $tblvalue);
                                                    foreach($select as $data){
                                                            extract($data);
                                                  
                                                ?>
                                                <td><a href="fullmail?id=<?php echo $mail_ID;?>"><?php echo mb_strimwidth($mail_message, 0, 60, "...");?></a></td>
                                                <td class="d-none d-sm-block"><?php echo $sent_at?></td>
                                               
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
