<!DOCTYPE html>
<html>
<head>
  <title>Add Medicine</title>
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
  <h2>Add Medicine</h2>
  <form action="medicine_list.php" method="POST">
    <div class="form-group">
      <label for="medi_name">Medicine name:</label>
      <input id="medi_name" type="text" class="form-control" name="medi_name" placeholder="Enter name">
      
    </div>
    <div class="form-group">
      <label for="price">Medicine Price:</label>
      <input id="price" type="text" class="form-control" name="price" placeholder="Enter price">
    </div>
    <div class="form-group">
      <label for="company">Medicine Compani Name:</label>
      <input id="company" type="text" class="form-control" name="company" placeholder="Enter Company name">
    </div>

	<div class="form-group">
      <label for="stock">Medicine Stoke :</label>
      <input id="stock" type="text" class="form-control" name="stock" placeholder="Enter stock">
    </div>

<div class="form-group">
      <label for="ex_date">Medicine Expire date :</label>
      <input id="ex_date" type="text" class="form-control" name="ex_date" placeholder="Enter ex_date">
    </div>

    
	<input class="btn btn-primary" type="submit" name="submit" value="Add Medicine">

  </form>
</div>


<script>
    $(document).ready(function(){
      var date_input=$('input[name="ex_date"]'); 
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








<!-- <form action="medic_list.php" method="post">


Medicine name: <input type="text" name="medi_name"><br>
Price : <input type="text" name="price"><br>
Company name : <input type="text" name="company"><br>
Stoke  : <input type="text" name="stock"><br>
Expire date  : <input type="text" name="ex_date"><br>

<input type="submit" name="submit">

</form> -->


</body>
</html>