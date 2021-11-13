<?php
require_once 'connexiondb.php';
if(isset($_POST['submit']))
{	 
	 $num_emp = $_POST['num_emp'];
	 $cin_us = $_POST['cin_us'];
	 $isbn_l = $_POST['isbn_l'];
	 $date_e = $_POST['date_e'];
     $date_r = $_POST['date_r'];
	 $sql = "INSERT INTO empreinte (num_emp,cin_us,isbn_l,date_e,date_r)
     values ('$num_emp','$cin_us','$isbn_l','$date_e','$date_r')";
	 if (mysqli_query($conn, $sql)) {
		//echo " New record created successfully ";
		//echo "<script>alert('New record created successfully');</script>";
		echo'<body onLoad=alert{\'New record created successfully\'}">';
		header('location:emp.php');
		
	 } else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>