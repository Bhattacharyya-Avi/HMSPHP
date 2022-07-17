<?php 


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
					echo "medicine added sucessfully";	
				}else{
					echo "medicine added failed";	
				}

	}
}


//table start
				?>


				
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
								<div class="col-md-12">
									
									<p style="color:red;">
									
									</p>	


									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">ID</th>
												<th class="hidden-xs">medic  Name</th>
												<th>stock</th>
												<th>price</th>
												<th>Company </th>
												<th>Ex_date  </th>
											</tr>
										</thead>
										<tbody>
									<?php
										$sql=mysqli_query($con,"SELECT * FROM `medic_list`");
										while($row=mysqli_fetch_array($sql))
										{
									?>

											<tr>
												<td class="center"><?php echo $row['id'];?>.</td>
												<td class="hidden-xs"><?php echo $row['medic_name'];?></td>
												<td><?php echo $row['medic_stock'];?></td>
												<td><?php echo $row['medic_price'];?></td>
												<td><?php echo $row['company_name'];?></td>
												<td><?php echo  $row['expire_date'];?></td>
												
												
											</tr>
											
									<?php 
									 	}
									 ?>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>


			

		