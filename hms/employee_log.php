<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User-Login</title>
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
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.html"><h2>  Employee Login</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Are you an employee? Select a type
							</legend>
							
							<div class="form-group">
								<p>
								    Sellect Employee Type.<br />
                                    <div>
                                    <style>
                                        .dropbtn {
                                        background-color: #007AFF;
                                        color: white;
                                        padding: 5px;
                                        font-size: 16px;
                                        border: none;
                                        }

                                        .dropdown {
                                        position: relative;
                                        display: inline-block;
                                        }

                                        .dropdown-content {
                                        display: none;
                                        position: absolute;
                                        background-color: #f1f1f1;
                                        min-width: 100px;
                                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                        z-index: 1;
                                        }

                                        .dropdown-content a {
                                        color: black;
                                        padding: 5px 16px;
                                        text-decoration: none;
                                        display: block;
                                        }

                                        .dropdown-content a:hover {background-color: #ddd;}

                                        .dropdown:hover .dropdown-content {display: block;}

                                    
                                        .dropdown:hover .dropbtn {background-color: #4CAF50;}
                                    </style>
                                    <div class="dropdown">
                                    <button class="dropbtn">Select Type</button>
                                    <div class="dropdown-content">
                                        <a href="http://localhost/HMS//hms/admin/">Admin</a>
                                        <a href="http://localhost/HMS//hms/doctor/">Doctor</a>
                                        <a href="#"></a>
                                    </div>
                                    </div>
                                    </div>
							    </p>

							</div>
							<div class="form-group form-actions">
								
							</div>
							<div class="form-actions">
								
								
							</div>
							<div class="new-account">
								
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						
					</div>
			
				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
	<!-- end: BODY -->
</html>
<!--
<fieldset>
							<legend>
								Are you an employee? Select a type
							</legend>
							<p>
								Sellect Employee Type.<br />
								<div>
								<style>
									.dropbtn {
									  background-color: #4CAF50;
									  color: white;
									  padding: 10px;
									  font-size: 16px;
									  border: none;
									}

									.dropdown {
									  position: relative;
									  display: inline-block;
									}

									.dropdown-content {
									  display: none;
									  position: absolute;
									  background-color: #f1f1f1;
									  min-width: 100px;
									  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
									  z-index: 1;
									}

									.dropdown-content a {
									  color: black;
									  padding: 12px 16px;
									  text-decoration: none;
									  display: block;
									}

									.dropdown-content a:hover {background-color: #ddd;}

									.dropdown:hover .dropdown-content {display: block;}

									.dropdown:hover .dropbtn {background-color: #3e8e41;}
								</style>
								<div class="dropdown">
								  <button class="dropbtn">Dropdown</button>
								  <div class="dropdown-content">
								    <a href="#">Link 1</a>
								    <a href="#">Link 2</a>
								  </div>
								</div>
								</div>
							</p>
								

								



							
						</fieldset> -->