<?php

	
	function getCon(){
		$host = "localhost";
		$username = "root";
		$password = "";
		$db="hms";
		
		$conn = new mysqli($host, $username, $password,$db);
		return $conn;
	}
