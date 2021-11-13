<?php
require_once 'connexiondb.php';
$sql = "DELETE FROM empreinte WHERE num_emp='" . $_GET["num_emp"] . "'";
if (mysqli_query($conn, $sql)) {
    //echo "Record deleted successfully";
    echo'<body onLoad=alert{\' record deleted successfully\'}">';
	header('location:emp.php');
    
} 

else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>