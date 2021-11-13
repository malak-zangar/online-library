<?php 
session_start();
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$conn=mysqli_connect("localhost","root","","bib");
mysqli_set_charset($conn,'utf8');
if(!$conn){
    die("connection failed :".mysqli_connect_error());
}
else
{
    $req1="select * from user where mail_u='$user' and password_u='$pwd' ";
    $req2="select * from adminn where mail_a='$user' and password_a='$pwd' ";
    $res1=mysqli_query($conn,$req1);
    $res2=mysqli_query($conn,$req2);
    if($row=$res1->fetch_assoc()){
        $_SESSION['user'] = $row;
        header('location:https://127.0.0.1/projet_web/user/user.php') ;    
    }
    elseif($row2=$res2->fetch_assoc()){
        $_SESSION['adminn'] = $row2;
        header('location:https://127.0.0.1/projet_web/admin/admin.php');}
    else {
        
        header('location:https://127.0.0.1/projet_web/log/error.html');

    }
$conn->close();
}
?>