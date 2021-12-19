<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>formulaire d'achat</title>
</head>
<body>
<form method="post" action="ajout_achat.php">
	Client :
	<select name="client" id="client">
	<?php
	$cnx=mysqli_connect("localhost","root","root");
	if($cnx){
		if(mysqli_select_db($cnx,"julia_lavergne")) {
			$requete1 = "SELECT * FROM personne";
			$resultat = mysqli_query($cnx,$requete1);
			if(!$resultat) die("requete échouée");
			while ($enr=mysqli_fetch_object($resultat)){
				echo "<option value='$enr->id'> $enr->nom $enr->prenom</option>";
			}
			
		}
	}
	?>
</select>


<br>véhicule :
<select name="vehicule" id="vehicule">
<?php
$cnx=mysqli_connect("localhost","root","root");
	if($cnx){
		if(mysqli_select_db($cnx,"julia_lavergne")) {
			$requete2 = "SELECT * FROM vehicule";
			$resultat = mysqli_query($cnx,$requete2);
			if(!$resultat) die("requete échouée");
			while ($enr=mysqli_fetch_object($resultat)){
				echo "<option value='$enr->id'> $enr->marque $enr->modele </option>";
			}}}
?>
</select>
	<br> date : <input type="date" id="date" name="date"
	       value="2021-12-07">

	<br> prix : <input name="prix" type="number" />
<br><button type="submit" value="envoyer">Envoyer</button>
</form>
</body>
</html>