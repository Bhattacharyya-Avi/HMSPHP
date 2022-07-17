<?php
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
<html>
<head>
  <title>Update Medicine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

</head>
<body>


<div class="container">
  <h2>Update Medicine</h2>
  <form action="medicine_list.php" method="POST">
    <div class="form-group">
      <label for="medi_name">Medicine name:</label>
      <input id="medi_name" type="text" class="form-control" name="medi_name" placeholder="Enter name" value="<?=$row['medic_name']?>">
      
    </div>
    <div class="form-group">
      <label for="price">Medicine Price:</label>
      <input id="price" type="text" class="form-control" name="price" placeholder="Enter price"  value="<?=$row['medic_price']?>">
    </div>
    <div class="form-group">
      <label for="company">Medicine Compani Name:</label>
      <input id="company" type="text" class="form-control" name="company" placeholder="Enter Company name"  value="<?=$row['company_name']?>">
    </div>

	<div class="form-group">
      <label for="stock">Medicine Stoke :</label>
      <input id="stock" type="text" class="form-control" name="stock" placeholder="Enter stock"  value="<?=$row['medic_stock']?>">
    </div>

<div class="form-group">
      <label for="ex_date">Medicine Expire date :</label>
      <input id="ex_date" type="text" class="form-control" name="ex_date" placeholder="Enter expiry date. i.e: 27/11/19 " value="<?=$row['expire_date']?>">
    </div>
 
 <input id="med_id" type="text" name="med_id"  value="<?=$row['id']?>" hidden>
    
	<input class="btn btn-primary" type="submit" name="update_submit" value="update Medicine">

  </form>
</div>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="ex_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>




</body>
</html>