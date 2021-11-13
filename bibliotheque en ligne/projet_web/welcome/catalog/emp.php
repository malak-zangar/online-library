<?php 
session_start();
$cin="<script>var v=(window.location.href).substr(window.location.href.lastIndexOf() - 7, 8); document.write(v);</script>";
$isbn="<script>var v=(window.location.href).substr(window.location.href.lastIndexOf() - 16, 4); document.write(v);</script>";
$conn=mysqli_connect("localhost","root","","bib");
mysqli_set_charset($conn,'utf8');
if(!$conn){
    die("connection failed :".mysqli_connect_error());
}
else{
    $v=date("Y-m-d");
    $w=date('Y-m-d',strtotime('+15 days'));
    $req1="select * from empreinte where cin_us='$cin' and isbn_l='$isbn' and date_r > '$v'";
    $req2="insert into empreinte (num_emp, cin_us, isbn_l, date_e, date_r) values (NULL , '$cin', '$isbn', '$v', '$w')";
    $req3="update livre set nb_exemplaire=nb_exemplaire-1 where isbn='$isbn'";
    $res=mysqli_query($conn,$req1);
    if($res->fetch_assoc()){
        echo"<script>window.alert('You have already borrowed this book..!');</script>";
    }
    else{
        if(mysqli_query($conn,$req2)){
            if(mysqli_query($conn,$req3)){
                echo"<script>window.alert('DONE');</script>";}}
        else{
            echo"<script>window.alert('ERROR..!');</script>";}

    }

      
$conn->close();
}
?>