<?php
session_start();//start sesson 2
	include_once('DB.php'); 
	$con=getCon();


	if(isset($_GET['id'])){

		$id=$_GET['id'];

		$sql=mysqli_query($con,"SELECT * FROM `medic_list`  WHERE `id`='$id' ");

		$row = mysqli_fetch_assoc($sql);
		//print_r($row);




	}else{
		echo "invalid id";
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Sell Medicine</title>
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
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
                        <!-- Everything Here -->
						

                        <div class="container" style="margin: 50px;">
			    <div class="row">
			        <div class="col-sm-12 col-md-10 col-md-offset-1">
			         </div>
			    </div>     
			</div>

			<div class="container" >
			    <div class="row">
			        <div class="col-sm-12 col-md-10 col-md-offset-1">
						<?php 
						// if(isset($_SESSION['medicine_stock_error'])){
						// }?>

						<!-- // <h5 class="text-center text-bold bg-danger" style="padding-top: 5px; padding-bottom:5px;margin-bottom:10px">
						// 	There are not that much Medicine in the Stock .				
						// </h5> -->
						
			            <table class="table table-hover">
			                <thead>
			                    <tr>
			                        <th>Product</th>
			                        <th>Quantity</th>
			                        <th class="text-center">Total Price</th>
			                    </tr>
			                </thead>
			                <tbody>
<form action=""  method="post">

			                    <tr>
			                        <td class="col-sm-8 col-md-6">
			                        <div class="media">
			                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
			                            <div class="media-body">
			                                <h4 class="media-heading"><a href="#">  <?=$row['medic_name']; ?></a></h4>
			                                <h5 class="media-heading"> by <a href="#"><?=$row['company_name']; ?></a></h5>

			                                <?php  

			                                	$stck_status="";
			                                	$stck_status_cls="";
			                                	if($row['medic_stock']>0){
														$stck_status="In Stock";$stck_status_cls="text-success";
													}else{
														$stck_status="Out Of Stock";$stck_status_cls="text-danger";
													}
			                                 ?>	
			                                <span>Status: </span><span class="<?=$stck_status_cls; ?>"><strong><?=$stck_status; ?></strong>(<?=$row['medic_stock']?>)</span>


			                            </div>
			                        </div></td>
			                        <td class="col-sm-1 col-md-1" style="text-align: center">
			                        
			                        <input type="text" class="form-control" id="m_quantity" name="m_quantity" onkeydown="search(this)" value="1">



			                        </td>
			                        <td class="col-sm-1 col-md-1 text-center" id="totalID"><strong><?=$row['medic_price']?> tk</strong></td>




			                        
			                    </tr>
			                    <tr>
			                        <td>   </td>
			                        <td>   </td>
			                       
			                        <td>

			                        <?php  
									$stoc_status = false;
			                               if($row['medic_stock']>0 ){
			                        ?>		
									
									<input type="submit" name="sell_submit" value="confirm Now" class="btn btn-success">
											

			                    	<?php 
			                    		//update database    if($row['medic_stock']>0 && $row['medic_stock']<= m_quantity ){

//add to cart
if(isset($_POST['sell_submit'])){


	$total_price = 1;
	$sold_medi_name=$row["medic_name"];
	$m_quantity=$_POST["m_quantity"];
	$medi_id=$row['id'];
	$per_price=$row['medic_price'];
	$total_price = $per_price * $m_quantity;
	$stock=(int)($row['medic_stock'])-(int)$m_quantity;
	$user_phn=$_SESSION['user_phn'];

if($m_quantity>$row['medic_stock']){
	$_SESSION['medicine_stock_error'] = "There are not that much Medicine in the Stock . "; 
}
else{
	$sql_cart=" INSERT INTO `cart`(`customer_phn`, `medi_name`, `medi_quantity`, `medi_price`) VALUES ('$user_phn','$sold_medi_name','$m_quantity','$total_price')  ";
	unset($_SESSION['medicine_stock_error']);
}


	
	
	$stock_update=" UPDATE `medic_list` SET medic_stock='$stock' WHERE `id`='$medi_id' ";


	if($con->query($sql_cart)){

		if($con->query($stock_update)){
			if(isset($_SESSION['medicine_stock_error'])){unset($_SESSION['medicine_stock_error']);}
			echo '<p>Added into cart succesfuly</p>';
			echo '<p><a href="cart.php" style="color:#fff!important;"  class="btn btn-success"  >View Cart List</a>';
			echo '<a href="medicine_list.php"  class="btn btn-success" style="color:#fff!important;">Buy More </a></p>';
		}

	}else{
		echo " cart failed";	
	}

}
	

									}else{ ?>

													<input type="submit"  value="Out Of Stock" class="btn btn-danger">
												
										<?php } ?>	


										</td>

									</tr>


</form> 

			                </tbody>
			            </table>
			        </div>
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
						<span class="text-bold text-uppercase">Hospital Management System</span>. <span>HMS</span>
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
