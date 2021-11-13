<?php
require_once 'connexiondb.php';
$sql = "DELETE FROM livre WHERE isbn='" . $_GET["isbn"] . "'";
if (mysqli_query($conn, $sql)) {
    //echo "Record deleted successfully";
    echo'<body onLoad=alert{\' record deleted successfully\'}">';
	header('location:admin.php');
    
} 

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>