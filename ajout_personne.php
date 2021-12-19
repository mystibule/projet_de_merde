<?php
$n = $_POST["nom"];
$p = $_POST["prenom"];
$cnx=mysqli_connect("localhost","root","root");
if($cnx){
			if(mysqli_select_db($cnx,"julia_lavergne")) {
$requete = "INSERT INTO personne VALUES (NULL, '$n', '$p' )";
$result = mysqli_query($cnx,$requete);

if (!$result) {
	mysqli_close($cnx);
	die("Requête échouée");
}
mysqli_close($cnx);
header("location: liste.php?mode=personne");
}}
?>