<!Doctype html>
<html>

	<head>
		<meta charset='utf-8'>
		<title> liste </title>
	</head>

	<body>

		<?php
// connexion 

			$m = $_GET["mode"];
			include("connexion.php");
			$cnx=connexion();

//personne
			if ($m == "personne"){
				$requete = "select * from personne";
				$result = mysqli_query($cnx,$requete);
				if (!$result) die("requête échouée");
				while ($enr=mysqli_fetch_object($result)){
					echo "<p> <ul>
					<li> $enr->nom, $enr->prenom </li>
					</ul> </p>
					<form action='renseignements.php' method='get'><button type='submit' name='id' value='$enr->id'>Renseignements</button></form><br>
					<form action='del_personne.php' method='get'><button type='submit' name='id' value='$enr->id'>Supprimer</button></form><br>";
				}
			}


//véhicule
			if ($m == "vehicule"){
				$requete = "SELECT * FROM vehicule";
				$result = mysqli_query($cnx,$requete);
				if (!$result) die("requête échouée");
				echo"<h1> liste des véhicules : </h1> ";
				while ($enr=mysqli_fetch_object($result)){
					echo "<p> <ul>
					<li> $enr->marque $enr->modele $enr->immatriculation </li>
					</ul> </p>
					<form action='del_vehicule.php' method='get'><button type='submit' name='id' value='$enr->id'>Supprimer</button></form><br>";
				}
			}

						
//achats
			if ($m == "achat"){
				$requete = "SELECT personne.nom, personne.prenom, vehicule.immatriculation, vehicule.marque, vehicule.modele, vehicule.puissance, achat.date, achat.prix
				FROM personne,vehicule,achat 
				WHERE achat.id_personne=personne.id AND achat.id_vehicule=vehicule.id";
				$result = mysqli_query($cnx,$requete);
				if (!$result) die("requête échouée");
				echo"<h1> liste d'achats : </h1> ";
				while ($enr=mysqli_fetch_object($result)){
					echo "<p> <ul>
					<li> Achat d'une $enr->marque $enr->modele par $enr->nom $enr->prenom Le $enr->date <br> prix : $enr->prix € </li>
					</ul> </p>";
					}
			}						
		?>
	</body>
</html>