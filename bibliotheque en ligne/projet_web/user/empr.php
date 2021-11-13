<?php
session_start();
require_once 'connexiondb.php';
	 
	 
	 $cin_us = $_SESSION['user']['cin_u'];
	$isbn_l = $_GET["isbn"] ;
     

	 $date_e = date("Y-m-d");
     $date_r = date('Y-m-d',strtotime('+15 days'));
	 $sql = "INSERT INTO empreinte (cin_us,isbn_l,date_e,date_r)
     values ('$cin_us', '$isbn_l', '$date_e', '$date_r')";
	 if (mysqli_query($conn, $sql)) {
		//echo " New record created successfully ";
		//echo "<script>alert('New record created successfully');</script>";
		
		header('location:emp.php');
		
	 } else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);


?>