<?php
			 if($_SESSION['accessytpe'] == "Admin"){
                echo "<script>window.location='amdashboard'</script>";
            }
		?>

<!-- Page Heading -->

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 ml-4 mb-4 text-gray-800">Fee Status</h1>                   
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
		<th>Amount Paid</th>
		<th>Amount Pending</th>
		<th>Fee Remark</th>
		<th>Date Last Updated</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			include("config/dblink.php");
			$connect = new Hectares();
			$tblquery = "SELECT * FROM hec_feestatus WHERE fee_studentID = :stID";
			$tblvalue = array(
                ':stID' => $_SESSION['studentID']
            );
			$select =$connect->tbl_select($tblquery, $tblvalue);
			
			foreach($select as $data){
			extract($data)
		?>
	<td><?php echo $fee_amountpaid;?></td>
	<td><?php echo $fee_amountpending;?></td>
	<td><button style="padding:0.2rem 0.4rem; color:#fff; background-color:#27ae60; outline:none;border:none;"><?php echo $fee_remark;?></button></td>
    <td><?php echo $updated_at;?></td>
	</tr>


	<?php  }?>
	</tbody>
	
</table>
</div>	
   	</div>
   	<div class="col"></div>
    </div>


