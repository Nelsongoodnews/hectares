<?php 
         if($_SESSION['accessytpe'] == "Student"){
            echo "<script>window.location='dashboard'</script>";
        }
          include("config/dblink.php");
          $connect = new Hectares();
          $tblquery = "SELECT * FROM hec_events";
          $tblvalue = array();
          $select =$connect->tbl_select($tblquery, $tblvalue);

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">Upcoming Events</h1>                   
<a href="addevent"><button style="background-color:#e4b461 !important; color:#fff !important; font-size:1rem" class="d-sm-inline-block btn btn-sm shadow-sm mx-4 px-1 py-2" id="printNone"><i style="color:#fff !important;"
                                class="fas fa-pen fa-sm text-white-50"></i>  Add an Event</button></a>
                    </div>

                    <div class="container">

               <?php 
                         foreach($select as $data){
                              extract($data);
                      
               ?>
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg mb-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-imagee" style="background:url('uploads/<?php echo $eve_banner;?>'); background-position: center; background-size: cover;"></div>
                    <div class="col-lg-6">
                        <div class="px-2 py-4">
                         <h1 class="h3 text-gray-800 text-center"><?php echo $eve_title;?></h1>    
                         <hr>               
                         <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h6 text-gray-800 text-center">Event Starts On: <?php echo $eve_startDate;?></h1> 
     <h1 class="h6 text-gray-800 text-center">Event Ends On: <?php echo $eve_endDate;?></h1>                     
                    </div>
                    <hr>
                    <h1 class="h4 text-gray-800 text-center">Venue: <?php echo $eve_venue;?></h1>
                    <hr>
                    <h1 class="h5 text-gray-800 text-justify"><?php echo $eve_desc;?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?php    }?>

</div>