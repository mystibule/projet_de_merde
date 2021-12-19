<?php
	$cnx=mysqli_connect("localhost","root","root");
	$id=$_GET['id'];
	if (!empty($_GET['confirmation'])) {
		if ($cnx) {

			if(mysqli_select_db($cnx,"julia_lavergne")) {

				$requete="DELETE FROM vehicule WHERE id=$id";
				$result=mysqli_query($cnx,$requete);	

				if (!$result) {
					echo "$requete";
					die("Requête échouée");
				}

				else { 
					if ($result =1) {
						echo "Supression du véhicule réussie <br>";
					}
				}
			}			
		}
	}
	else { 
		if($cnx){
			if(mysqli_select_db($cnx,"julia_lavergne")) {
				$requete="SELECT*FROM vehicule WHERE id=$id";
				$result=mysqli_query($cnx,$requete);
				$enr=mysqli_fetch_object($result);

		echo "Voulez vous supprimer le véhicule $enr->marque $enr->modele. <br>
			<form action='del_vehicule.php' method='get'?>
				<button type='submit' name='confirmation' value='1'>Confirmer</button>
				<input name='id' type='hidden' value='$id'>
				</form><br>";
			}	
		}
	}
echo "<form action='accueil.html' method='get'>
	<button type='submit'>Accueil</button>
	</form><br>"

?>
