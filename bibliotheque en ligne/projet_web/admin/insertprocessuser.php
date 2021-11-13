<?php
require_once 'connexiondb.php';
if(isset($_POST['save']))
{	 
	 $cin = $_POST['cin_u'];
	 $name = $_POST['name_u'];
	 $password = $_POST['psw_u'];
     $status = $_POST['status'];
     $mail = $_POST['mail_u'];
     $phone = $_POST['phone_u'];
	 $sql = "INSERT INTO user (cin_u,name_u,password_u,status,mail_u,phone_u)
     values ('$cin','$name','$password','$status','$mail','$phone')";
	 if (mysqli_query($conn, $sql)) {
		//echo " New record created successfully ";
		//echo "<script>alert('New record created successfully');</script>";
		echo'<body onLoad=alert{\'New record created successfully\'}">';
		header('location:user.php');
		
	 } else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>