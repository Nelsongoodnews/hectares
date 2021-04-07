<?php
             if($_SESSION['accessytpe'] == "Student"){
                echo "<script>window.location='dashboard'</script>";
            }
          include("config/dblink.php");
          $connect = new Hectares();
     $tblquery2 = "SELECT * FROM hec_feestatus WHERE fee_studentID = :stID";
    $tblvalue2 = array(
        ':stID' => htmlspecialchars($_POST['Student'] ?? "")
    );
    $select1 =$connect->tbl_select($tblquery2, $tblvalue2);
    if($select1 && $_POST){
         extract($_POST);
         $tblquery3 = "UPDATE hec_feestatus SET fee_amountpaid =:newAmountpaid, fee_amountpending = :newAmountpending, fee_remark = :remark, updated_at = :newUpdated WHERE fee_studentID = :studentID";
         $tblvalue3 = array(
              ':newAmountpaid' => htmlspecialchars($amtpaid),
              ':newAmountpending' => htmlspecialchars($amtpending),
              ':remark' => htmlspecialchars($remark),
              ':newUpdated' => date("Y-m-d H:i:s"),
              ':studentID' => htmlspecialchars($Student)
         );
         $updated =$connect->tbl_update($tblquery3, $tblvalue3);
    }
          elseif($_POST){
               extract($_POST);
               $tblquery1 = "INSERT INTO hec_feestatus VALUES(:fee_ID, :fee_studentID, :fee_amountpaid, :fee_amountpending, :fee_remark, :updated_at)";
               $tblvalue1 = array(
                    ':fee_ID' => NULL,
                    ':fee_studentID' => htmlspecialchars($Student),
                    ':fee_amountpaid' => htmlspecialchars($amtpaid),
                    ':fee_amountpending' => htmlspecialchars($amtpending),
                    ':fee_remark' => htmlspecialchars($remark),
                    ':updated_at' => date("Y-m-d H:i:s")
               );
               $insert =$connect->tbl_insert($tblquery1, $tblvalue1);

          }
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">Update Student's Fee Status</h1>
</div>
               <?php if($insert || $updated){

               
               ?>    
               
          <div class="row mb-5">
          <div class="col-md"></div>
          <div class="col-md-8">
          <div class="card border-left-success shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                        THE STUDENT'S FEE STATUS HAS SUCESSFULLY BEEN UPDATED                                       <i class="fas fa-smile-wink fa-2x ml-4" style="color:#e4b461 !important"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
          </div>
          <div class="col-md"></div>
     </div>
               <?php } 
               ?>
<div class="container">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image2"></div>
                    <div class="col-lg-7">
                        <div class="p-3">
                            <form method="POST" action="feestatus" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="Student" class="custom-select" id="exampleInputEmail" required>
                                    <option value="" disabled selected>Select Student</option>
                                    <?php
                                        $tblquery = "SELECT * FROM hec_applicants";
                                        $tblvalue = array();
                                        $select =$connect->tbl_select($tblquery, $tblvalue);
                                        foreach($select as $data){
                                             extract($data);
                                             echo "
                                                  <option value='$app_studentID'>$app_surname  $app_firstName $app_middleName</option>
                                             ";
                                        }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="amtpaid"  placeholder="Amount (Paid)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                       name="amtpending" placeholder="Amount (Pending)">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="remark"  placeholder="Fee Remark e.g Paid partly">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-user btn-block" style="font-size:1.2rem; background-color:#e4b461; color:#ffffff">
                                    Update Now <i class="fas fa-thermometer-three-quarters"></i>
                                        </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
