<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>question e</title>
</head>
<body>
	<?php
	$id=$_GET['id'];
	$cnx=mysqli_connect("localhost","root","root");
		if($cnx){
			if(mysqli_select_db($cnx,"julia_lavergne")) {
				$requete="SELECT*FROM personne WHERE id=$id";
				$result=mysqli_query($cnx,$requete);
				$enr=mysqli_fetch_object($result);
					if($enr){
					echo "<h1> $enr->nom, $enr->prenom</h1>";
						$requete ="SELECT vehicule.modele, vehicule.marque, vehicule.immatriculation, personne.nom, personne.prenom , achat.date, achat.prix
							FROM personne, vehicule, achat 
							WHERE (achat.id_personne=personne.id AND achat.id_vehicule=vehicule.id and personne.id=$id)";
						$result=mysqli_query($cnx,$requete);
						if (mysqli_num_rows ($result) !=0) {
						while($enr=mysqli_fetch_object($result)){
							echo "<p>$enr->modele,$enr->marque,$enr->immatriculation,$enr->prix,$enr->date</p>";
						}
						}
						else {
							echo"le client n'a pas acheté de véhicule.";
						}

				}
	else{
		echo "<h1>identifiant incorrect</h1>";
	}
	mysqli_close($cnx);
			}
		}


	?>

</body>
</html>