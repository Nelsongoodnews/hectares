<?php 
        if($_SESSION['accessytpe'] == "Student"){
            echo "<script>window.location='dashboard'</script>";
        }
        include("config/dblink.php");
        $connect = new Hectares();
        if($_POST){
        $filename = time() . htmlspecialchars( basename( $_FILES["banner"]["name"]));
	    $target_dir = "uploads/";
	    $target_file = $target_dir . time() . basename($_FILES["banner"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
        extract($_POST);

            $tblquery = "INSERT INTO hec_events VALUES(:eve_ID, :eve_title, :eve_startDate, :eve_endDate, :eve_venue, :eve_desc, :eve_banner, :eve_posted_at)";
            $tblvalue = array(
                ':eve_ID' => NULL,
                ':eve_title' => htmlspecialchars($title),
                ':eve_startDate' => htmlspecialchars($startDate),
                ':eve_endDate' => htmlspecialchars($endDate),
                ':eve_venue' => htmlspecialchars($venue),
                ':eve_desc' => htmlspecialchars($desc),
                ':eve_banner' => $filename,
                ':eve_posted_at' => date("Y-m-d H:i:s")
            );
            $insert =$connect->tbl_insert($tblquery, $tblvalue);
            if($insert){
                move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file);
            }
        }
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">Add an Event</h1>
     <a href="upcomingevents"><button style="background-color:#e4b461 !important; color:#fff !important; font-size:1rem" class="d-sm-inline-block btn btn-sm shadow-sm mx-4 px-1 py-2" id="printNone"><i style="color:#fff !important;"
                                class="fas fa-chess-board fa-sm text-white-50"></i> View events</button></a>
     </div>
        <?php 
            if($insert){
        ?>
         <div class="row mb-5">
          <div class="col-md"></div>
          <div class="col-md-8">
          <div class="card border-left-success shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                        SUCCESSFULLY ADDED A NEW EVENT                                     <i class="fas fa-smile-wink fa-2x ml-4" style="color:#e4b461 !important"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
          </div>
          <div class="col-md"></div>
     </div>
        <?php }?>
     <div class="container">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image2"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <form method="POST" action="addevent" class="user" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="title"  placeholder="Event Title">
                                    </div>
                                    </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="startDate" placeholder="Event Start Date e.g MM/DD/YYYY" onfocus="(this.type='date')" required>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" name="endDate" placeholder="Event End Date e.g MM/DD/YYYY" onfocus="(this.type='date')" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                          name="venue"  placeholder="Event Venue">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="file" class="form-control form-control-user" id="exampleLastName"
                                          name="banner"  placeholder="Event banner">
                                    </div>
                                    </div>
                                    <textarea name="desc" rows="5" class="form-control mb-3" required>Description Here!</textarea>
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
