<?php
$c = $_POST["client"];
$v = $_POST["vehicule"];
$p = $_POST["prix"];
$d = $_POST["date"];
$cnx=mysqli_connect("localhost","root","root");
if($cnx){
			if(mysqli_select_db($cnx,"julia_lavergne")) {
$requete = "INSERT INTO achat VALUES ('$c', '$v', '$d', '$p' )";
$result = mysqli_query($cnx,$requete);

if (!$result) {
	mysqli_close($cnx);
	echo "$requete";
	die("Requête échouée");
}
mysqli_close($cnx);
header("location: liste.php?mode=achat");
}}
?>