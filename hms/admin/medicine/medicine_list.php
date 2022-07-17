<?php 

session_start();//start sesson 1


include_once('DB.php'); 
	$con=getCon();

if(isset($_POST['submit'])){

	$medi_name=$_POST["medi_name"];
	$price=$_POST["price"];
	$company=$_POST["company"];
	$stock=$_POST["stock"];
	$ex_date=$_POST["ex_date"];

	if ($con->connect_error) {
			    echo $con->connect_error;
			}else{
				// echo "sucess"; start form here

				$sql_add=" INSERT INTO `medic_list`(`medic_name`, `medic_stock`, `medic_price`, `company_name`, `expire_date`)
				 VALUES ('$medi_name','$stock','$price','$company','$ex_date') ";

				if($con->query($sql_add)){
					//echo 'medicine added succesfuly';	
				}else{
					//echo "medicine added failed";	
				}

	}
}

//sell_submit
if(isset($_POST['done_logout'])){

	$current_user=$_SESSION['user_phn'];

	$dele_sql = "DELETE FROM cart where customer_phn='$current_user' "; 
	if(mysqli_query($con, $dele_sql)){ 

		echo "here is am ";
		unset($_SESSION["user_phn"]);
	    header("Location: medicine_list.php "); 
	} 

}

//update medicine
if(isset($_POST['update_submit'])){


	$med_id=$_POST["med_id"];
	$medi_name=$_POST["medi_name"];
	$price=$_POST["price"];
	$company=$_POST["company"];
	$stock=$_POST["stock"];
	$ex_date=$_POST["ex_date"];



	$sql_up=" UPDATE `medic_list` SET `medic_name`='$medi_name',`medic_stock`='$stock',`medic_price`='$price',`company_name`='$company',`expire_date`='$ex_date'  WHERE `id`='$med_id'    ";

	if($con->query($sql_up)){
		//echo 'medicine added succesfuly';	
	}else{
		//echo "medicine added failed";	
	}

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User | Appointment History</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://localhost/hms/hms/admin/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://localhost/hms/hms/admin/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://localhost/hms/hms/admin/vendor/themify-icons/themify-icons.min.css">
		<link href="http://localhost/hms/hms/admin/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="http://localhost/hms/hms/admin/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="http://localhost/hms/hms/admin/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="http://localhost/hms/hms/admin/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="http://localhost/hms/hms/admin/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="http://localhost/hms/hms/admin/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="http://localhost/hms/hms/admin/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="http://localhost/hms/hms/admin/assets/css/styles.css">
		<link rel="stylesheet" href="http://localhost/hms/hms/admin/assets/css/plugins.css">
		<link rel="stylesheet" href="http://localhost/hms/hms/admin/assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/HMS/hms/admin/include/sidebar.php');?>
        <div class="app-content">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/HMS/hms/admin/include/header.php');?>
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin  | Medicine</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin </span>
									</li>
									<li class="active">
										<span>Medicine</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="add_medicine.php" class="btn btn-primary">Add Medicine</a>
								<a href="cart.php" class="btn btn-primary">Goto Cart</a>
                            </div><!--
							<div class="col-md-1">
                                <a href="cart.php" class="btn btn-primary">Goto Cart</a>
                            </div>-->

                            <div class="col-md-4">
                                    <form action="medicine_list.php" class="form-inline" method="POST">
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" id="user_phn" name="user_phn" placeholder="Customer PHone">

                                                    <input class="btn btn-primary" type="submit" name="user_phn_submit" value="Entry Customer">

                                                    </div>
													
                                    </form>
                                </div>
								<!--
							<div class="col-md-1">
                                <a href="logout.php" class="btn btn-primary">logout</a>
                            </div>-->

                            <div class="col-md-4">
                            <form action="medicine_list.php" class="form-inline" method="POST">
                                <div class="form-group">
                                <input type="text" class="form-control" id="s_medic" name="search_name" placeholder="Search Medicine">

                                <input class="btn btn-primary" type="submit" name="search_submit" value="Search Medicine">

                                </div>
                            </form>
                            </div>
                                    
                        </div>
						

									<div class="row">
								<div class="col-md-12">
									
									<p style="color:red;">
                                    
       <?php

					//submit user phone
					if(isset($_POST['user_phn_submit'])){
							$user_phn=$_POST["user_phn"];
							$_SESSION['user_phn']=$user_phn;
							echo "Customer entry succesful";
					}

					

					// search function

					$sql=mysqli_query($con,"SELECT * FROM `medic_list`");

					if(isset($_POST['search_submit'])){
							$s_name=$_POST["search_name"];

						$sql=mysqli_query($con,"SELECT * FROM `medic_list` WHERE `medic_name` like '%$s_name%' ");

					}
				?>
                                    
                                    								</p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center text-center">ID</th>
												<th class="hidden-xs text-center">Medic Name	</th>
												<th class="text-center">Stock</th>
												<th class="text-center">Price</th>
												<th class="text-center">Company </th>
												<th class="text-center">Expiry date	 </th>
												<th class="text-center">Edit medicine</th>
												
											</tr>
										</thead>
										<tbody>
                                        <?php 
                                        while($row=mysqli_fetch_array($sql))
                                        {
                                        ?>
										<tr>
                                            <td class="center text-center"><?php echo $row['id'];?>.</td>
                                            <td class="hidden-xs text-center">
                                                <?php 

                                                if(!isset($_SESSION['user_phn'])){
                                                    echo $row['medic_name'];
                                                }else{
                                                
                                                ?>
                                                <a href="single_medic.php?id=<?php echo $row['id'];?>">
                                                    <?php echo $row['medic_name'];?>
                                                </a>

                                                <?php }?>	

                                            </td>
                                            <td class="text-center"><?php echo $row['medic_stock'];?></td>
                                            <td class="text-center"><?php echo $row['medic_price'];?></td>
                                            <td class="text-center"><?php echo $row['company_name'];?></td>
                                            <td class="text-center"><?php echo  $row['expire_date'];?></td>
                                            <td class="hidden-xs text-center">
                                                
                                                <a href="update_medicine.php?id=<?php echo $row['id'];?>">
                                                    Edit
                                                </a>
                                                <a href="delete_medicine.php?id=<?php echo $row['id'];?>">
                                                    Delete
                                                </a>	

                                            </td>
							
							
						</tr>
                                        <?php }?>
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
	<footer>
				<div class="footer-inner">
					<div class="pull-left">
						<span class="text-bold text-uppercase">HMSOP</span>. <span>HMSOP</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
				
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="http://localhost/hms/hms/admin/vendor/jquery/jquery.min.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/modernizr/modernizr.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="http://localhost/hms/hms/admin/vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/autosize/autosize.min.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/selectFx/classie.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/selectFx/selectFx.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/select2/select2.min.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="http://localhost/hms/hms/admin/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="http://localhost/hms/hms/admin/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="http://localhost/hms/hms/admin/assets/js/form-elements.js"></script>
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

