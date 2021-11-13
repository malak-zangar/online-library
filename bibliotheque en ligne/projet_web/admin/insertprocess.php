<?php
require_once 'connexiondb.php';
if(isset($_POST['save']))
{
	
	 $isbn = $_POST['isbn'];
	 $titre = $_POST['titre'];
	 $auteur = $_POST['auteur'];
	 $nb_exemplaire = $_POST['nb_exem'];
     $langue = $_POST['langue'];
	 $sql = "INSERT INTO livre (isbn,titre,auteur,nb_exemplaire,langue)
     values ('$isbn','$titre','$auteur','$nb_exemplaire','$langue')";
	 if (mysqli_query($conn, $sql)) {
		
		header('location:insert.php');
		
		
	 } else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>