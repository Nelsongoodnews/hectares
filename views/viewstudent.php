		<?php
			 if($_SESSION['accessytpe'] == "Student"){
                echo "<script>window.location='dashboard'</script>";
            }
		?>

<!-- Page Heading -->

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">Students List</h1>                   
                        <button style="background-color:#e4b461 !important; color:#fff !important;" class="d-none d-sm-inline-block btn btn-sm shadow-sm mx-4" onclick="window.print()" id="printNone"><i style="color:#fff !important;"
                                class="fas fa-print fa-sm text-white-50"></i>  Print Slip</button>
                    </div>
               <div class="row">
               	<div class="col"></div>
               	<div class="col-md-10">
<div style="overflow-x:auto">
<table class="table table-hover table-bordered">
	<thead>
	<tr>
		<th>S/N</th>
		<th>Student's ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Program</th>
		<th>Status</th>
        <th>Action</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			include("config/dblink.php");
			$connect = new Hectares();
			$tblquery = "SELECT * FROM hec_applicants ORDER BY submitted_at";
			$tblvalue = array();
			$select =$connect->tbl_select($tblquery, $tblvalue);
			
			$si = 1;
			foreach($select as $data){
			extract($data)
		?>
        <?php if($app_status == "Verified"){
            $color = "#27ae60";
        }
            elseif($app_status == "Not Verified"){
                $color = "#c0392b";
            }
        ?>
	<td><?php echo $si++;?></td>
	<td><?php echo $app_studentID;?></td>
	<td><?php echo $app_firstName;?></td>
	<td><?php echo $app_surname;?></td>
	<td><?php echo $app_programOfApplication;?></td>
	<td><button style="padding:0.2rem 0.4rem; color:#fff; background-color:<?php echo $color;?>; outline:none;border:none;"><?php echo $app_status;?></button></td>
	<td><a href="userdetails?stID=<?php echo $app_studentID;?>">View More</a></td>
	</tr>


	<?php  }?>
	</tbody>
	
</table>
</div>	
   	</div>
   	<div class="col"></div>
    </div>


