<?php
require_once 'connexiondb.php';
$sql = "DELETE FROM user WHERE cin_u='" . $_GET["cin_u"] . "'";
if (mysqli_query($conn, $sql)) {
    //echo "Record deleted successfully";
    echo'<body onLoad=alert{\' record deleted successfully\'}">';
	header('location:user.php');}

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>