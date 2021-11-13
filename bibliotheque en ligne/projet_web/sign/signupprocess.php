<?php
session_start();

// initializing variables
$name_u = "";
$cin_u="";
$mail_u="";
$password_u="";
$selecteur="";
$phone_u="";
$errors = array(); 

// connect to the database
$conn = new mysqli('localhost','root', '', 'bib');

// REGISTER USER
if (isset($_POST['save'])) {
  // receive all input values from the form
  $name_u = mysqli_real_escape_string($conn, $_POST['name_u']);
  $cin_u = mysqli_real_escape_string($conn, $_POST['cin_u']);
  $mail_u = mysqli_real_escape_string($conn, $_POST['mail_u']);
  $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
  $selecteur= mysqli_real_escape_string($conn, $_POST['selecteur']);
  $phone_u = mysqli_real_escape_string($conn, $_POST['phone_u']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name_u)) { array_push($errors, "Username is required"); }
  if (empty($cin_u)) { array_push($errors, "cin is required"); }
  if (empty($mail_u)) { array_push($errors, "Email is required"); }
  if (empty($password1)) { array_push($errors, "Password is required"); }
  if ($password1 != $password2) {
	array_push($errors, "The two passwords do not match");
  }
  if (empty($selecteur)) { array_push($errors, "status is required"); }
  if (empty($phone_u)) { array_push($errors, "phone number is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE name_u='$name_u' OR mail_u='$mail_u' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name_u'] === $name_u) {
      array_push($errors, "Username already exists");
    }

    if ($user['mail_u'] === $mail_u) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password_u = $password1;

  	$query = "INSERT INTO user (name_u,cin_u,mail_u, password_u,status,phone_u) 
  			  VALUES('$name_u', '$cin_u','$mail_u', '$password_u','$selecteur', '$phone_u')";
  	if(mysqli_query($conn, $query)){
  	$_SESSION['name_u'] = $name_u;
  	$_SESSION['success'] = "You are now logged in";
  	header('location:https://127.0.0.1/projet_web/sign/loog.html');}
  }
}