<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['change_status']))
		  {
			$current_status_var = '';
			$appointment_id = $_GET['change_status'];
			$current_status_var = $_GET['current_status'];

			$newStatus = $current_status_var == 0 ? 1 : 0; 

			$update_status_query = "UPDATE `appointment` SET
						 `payment_status` = '$newStatus' 
						 WHERE `appointment`.`id` = $appointment_id ";
			$appointment = $con->query($update_status_query);
			if($appointment && $newStatus == 1){
				$_SESSION['msg']="Payment Approved !!";
				$_SESSION['color']="bg-success";
				header("Location: http://localhost/hms/hms/admin/payment_user.php");
					exit();
			}
			else if($appointment && $newStatus == 0){
				$_SESSION['msg']="Payment Not Approved !!";
				$_SESSION['color']="bg-danger";
				header("Location: http://localhost/hms/hms/admin/payment_user.php");
					exit();
			}
		  }
if(isset($_GET['delete'])){
	$delete_appointment_id = $_GET['delete'];
	$delete_query = "DELETE FROM `appointment` 
					WHERE `appointment`.`id` = '$delete_appointment_id' ";

			$delete_done = $con->query($delete_query);
			if($delete_done){
				$_SESSION['msg']="The Appointment Has been Deleted ";
				$_SESSION['color']="bg-success";
				header("Location: http://localhost/hms/hms/admin/payment_user.php");
				exit();
			}
			else{
				$_SESSION['msg']="Error !! The Appointment Has Not been Deleted";
				$_SESSION['color']="bg-danger";
				header("Location: http://localhost/hms/hms/admin/payment_user.php");
				exit();
			}

}
 if(isset($_POST['date_of_appointment'])){
	 if($_POST['date_of_appointment']=='all'){
			unset($_SESSION['appointment_date']);
	 }
	$appointment_date = ($_POST['date_of_appointment']=='all')? '' :$_POST['date_of_appointment'];
	$_SESSION['appointment_date']= $appointment_date;

 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Appointment History</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<title>Payment status</title>
</head>
<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				

					<?php include('include/header.php');?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin  | Payment Status</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Payment Status</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									
			<?php if(isset($_SESSION['msg'])){?>
				<h5 class="text-center text-bold <?php echo($_SESSION['color']);?>"
					style="padding-top: 5px; padding-bottom:5px;margin-bottom:10px">

					<?php echo htmlentities($_SESSION['msg']); unset($_SESSION['msg']);unset($_SESSION['color']);?>
				
				</h5>
						
			<?php }?>	
			<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
				<table class="table table-hover" id="sample-table-1">
					<thead>
						<tr>
							<th class="center text-center">#</th>
							<th class="hidden-xs text-center">Doctor's  Name</th>
							<th class="text-center">patient's Name</th>
							<th class="text-center">patient's Email</th>
			<th class="text-center"> 
				<form action="" method="POST">
					<input class="btn btn-sm" type="submit" value="Appointment Date" style="margin-right: 5px;">
					
					<select name="date_of_appointment">
					
					<?php 
						$sql ="SELECT DISTINCT appointmentDate FROM appointment";
						$appointment = $con->query($sql);
						if ($appointment->num_rows > 0) {?>
						
						<option value="all">All Appointments</option>

						
						<?php
							while($row = $appointment->fetch_assoc()) { ?>

							<option value="<?php echo $row['appointmentDate']; ?>" <?php echo(($row['appointmentDate'] == $_SESSION['appointment_date']) ? 'selected':'') ;?> >
								<?php echo $row['appointmentDate']; ?>
							</option>

						<?php } } else { ?>
							<option value="null">
								There are No Appointments
							</option>
					<?php }?>

					</select>

							</form>
							</th>
							<th class="text-center">Total Fee</th>
							<th class="text-center" colspan="2">Action</th>
												
											</tr>
										</thead>
										<tbody>
										
							<?php
							if(isset($_SESSION['appointment_date'])){
								$appointment_date = $_SESSION['appointment_date'];
							}
									if(!empty($appointment_date)){
										$sql_for_appointment = "SELECT users.fullName, users.email,
										doctors.doctorName, 
										appointment.appointmentDate,appointment.consultancyFees,appointment.payment_status,appointment.id
										 FROM appointment JOIN users on appointment.userId = users.id
										  JOIN doctors on appointment.doctorId = doctors.id
										WHERE appointmentDate='$appointment_date'
									";
									}
										else{
											$sql_for_appointment = "SELECT users.fullName, users.email,
											 doctors.doctorName, 
											 appointment.appointmentDate,appointment.consultancyFees,appointment.payment_status,appointment.id
											  FROM appointment JOIN users on appointment.userId = users.id
											   JOIN doctors on appointment.doctorId = doctors.id
											";
									}


								$appointment = $con->query($sql_for_appointment);


								if ($appointment->num_rows > 0) {
									$count = 1;
								while($row = $appointment->fetch_assoc()) {?>
									<tr>
										<td class="text-center"><?php echo $count ; $count++ ;?></td>
										<td class="text-center"><?php echo $row['doctorName'];?></td>
										<td class="text-center"><?php echo $row['fullName'];?></td>
										<td class="text-center"><?php echo $row['email'];?></td>
										<td class="text-center"><?php echo $row['appointmentDate'];?></td>
										<td class="text-center"> <?php echo $row['consultancyFees'];?></td>
										
										<td class="text-center">
											<a class="btn btn-sm <?php echo($row['payment_status'] == 0 ? "bg-danger":"bg-success")?> ml-5" 
										
											href="/hms/hms/admin/payment_user.php?change_status=<?php echo($row['id']);?>&current_status=<?php echo($row['payment_status']);?>" >

												<i class="fa fa-<?php echo($row['payment_status'] == 0 ? "exclamation":"check")?>" style="margin-right: 5px;"></i>
												<?php echo($row['payment_status'] == 0 ? "Unpaid":"Paid")?>
											</a>
										</td>

										<td class="text-center">
											<a class="btn btn-sm bg-danger ml-5" 
											href="/hms/hms/admin/payment_user.php?delete=<?php echo($row['id']); ?>" 
											
											onclick="confirm('Think Before you delete the Appointment ?')">
												<i class="fa fa-trash" style="margin-right: 5px;"></i> 
												Delete
											</a>
										</td>

									</tr>
									<?php
										}
								} else {?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>No Appointments Found </td>
									<td></td>
									<td></td>
									<td></td>
								</tr>

								<?php } ?>
										
										</tbody>
									</table>
								</div>
							</div>
								</div>
						
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>