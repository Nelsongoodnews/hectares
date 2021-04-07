<?php 
  if($_SESSION['accessytpe'] == "Student"){
    echo "<script>window.location='dashboard'</script>";
}        
?>

<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">Verify Applicant's Status</h1>
     </div>
     <?php 
      include("config/dblink.php");
      $connect =  new Hectares();
      if($_POST){
        extract($_POST);
        $tblquery = "UPDATE hec_applicants SET app_status = :newStatus WHERE app_studentID = :studentID";
        $tblvalue = array(
          ':newStatus' => "Verified",
          ':studentID' => htmlspecialchars($status)
        );
        $update =$connect->tbl_update($tblquery, $tblvalue);
     
        if($update){
     
     ?>
     <div class="row">
          <div class="col-md"></div>
          <div class="col-md-8">
          <div class="card border-left-success shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                          THE STUDENT'S STATUS HAS SUCESSFULLY BEEN UPDATED TO VERIFIED                                         <i class="fas fa-smile-wink fa-2x ml-4" style="color:#e4b461 !important"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
          </div>
          <div class="col-md"></div>
     </div>
    <?php    } else {?>
      <div class="row">
          <div class="col-md"></div>
          <div class="col-md-8">
          <div class="card border-left-danger shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                          THE ID(<?php echo htmlspecialchars($status);?>) DOES NOT EXIST       <i class="fas fa-sad-tear fa-2x ml-4" style="color:#c0392b !important"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
          </div>
          <div class="col-md"></div>
     </div>
    <?php }  }?>
        <form method="POST" action="applicantstatus" class="user">
	<div class="row p-4">
	<div class="col-sm-12 col-md-6">
  <div class="form-group">
                    <input type="text" class="form-control form-control-user mt-4" id="exampleFirstName"
                                           name="status"  placeholder="Applicant/Student ID Here!" required>
              </div>

	</div>
	<div class="col-sm-12 col-md-2">
		<button type="submit" name="submit" class="btn btn-user mt-sm-4" style="background-color:#e4b461;color:#fff !important; font-size:1rem;">Verify Now <i class="fas fa-thermometer-three-quarters"></i></i></button>
	</div>
</div>
</form>