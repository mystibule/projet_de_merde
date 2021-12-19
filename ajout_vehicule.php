<?php
$mo = $_POST["modele"];
$ma = $_POST["marque"];
$i = $_POST["immatriculation"];
$p = $_POST["prix"];
$cnx=mysqli_connect("localhost","root","root");
if($cnx){
			if(mysqli_select_db($cnx,"julia_lavergne")) {
$requete = "INSERT INTO vehicule VALUES (NULL, '$mo', '$ma', '$i', '$p' )";
$result = mysqli_query($cnx,$requete);

if (!$result) {
	mysqli_close($cnx);
	die("Requête échouée");
}
mysqli_close($cnx);
header("location: liste.php?mode=vehicule");
}}
?>