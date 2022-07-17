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



//table start
				?>



<!DOCTYPE html>
<html>
<head>
	<title>Med list</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body style="padding: 200px;">
<div class="container" >
  <div class="row">
    <div class="col-sm-4">
     
		<a href="add_medicine.php" class="btn btn-primary">Add Medicine</a>
      
    </div>

    <div class="col-sm-4">
     
		<form action="medicine_list.php"  class="form-inline"  method="POST">
		    <div class="form-group">
		      <input type="text" class="form-control" id="user_phn" name="user_phn" placeholder="Customer PHone" >

		      <input class="btn btn-primary" type="submit" name="user_phn_submit" value="Entry Customer">

		    </div>
	  </form>
      
    </div>

    <div class="col-sm-4 pull-right" >
      	<form action="medicine_list.php"  class="form-inline"  method="POST">
		    <div class="form-group">
		      <input type="text" class="form-control" id="s_medic" name="search_name" placeholder="Search Medicine" >

		      <input class="btn btn-primary" type="submit" name="search_submit" value="Search Medicine">

		    </div>
	  </form>
    </div>
  </div>
</div>




<table style="margin: 10px;">
  <tr>
    <th >ID</th>
	<th >medic  Name</th>
	<th>stock</th>
	<th>price</th>
	<th>Company </th>
	<th>Ex_date  </th>
	<th>Edit medicine </th>
  </tr>


  <tbody>
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

		
		while($row=mysqli_fetch_array($sql))
		{
	?>

			<tr>
				<td class="center"><?php echo $row['id'];?>.</td>
				<td class="hidden-xs">
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
				<td><?php echo $row['medic_stock'];?></td>
				<td><?php echo $row['medic_price'];?></td>
				<td><?php echo $row['company_name'];?></td>
				<td><?php echo  $row['expire_date'];?></td>
				<td class="hidden-xs">
					
					<a href="update_medicine.php?id=<?php echo $row['id'];?>">
						Edit
					</a>
					<a href="delete_medicine.php?id=<?php echo $row['id'];?>">
						Delete
					</a>	

				</td>
				
				
			</tr>
			
	<?php 
	 	}
	 ?>
			
			
		</tbody>
  
</table>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>