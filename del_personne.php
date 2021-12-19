<?php
	$cnx=mysqli_connect("localhost","root","root");
	$id=$_GET['id'];
	if (!empty($_GET['confirmation'])) {
		if ($cnx) {

			if(mysqli_select_db($cnx,"julia_lavergne")) {
				$requete="DELETE FROM achat WHERE id_personne=$id";
				$result=mysqli_query($cnx,$requete);		

				if (!$result) {
					echo "$requete";
					die("Requête échouée");
				}

				else { 
					if ($result =1) {
						echo "Supression des achats réussie <br>";
					}
				}

				$requete="DELETE FROM personne WHERE id=$id";
				$result=mysqli_query($cnx,$requete);	

				if (!$result) {
					echo "$requete";
					die("Requête échouée");
				}

				else { 
					if ($result =1) {
						echo "Supression du client réussie <br>";
					}
				}
			}			
		}
	}
	else { 
		if($cnx){
			if(mysqli_select_db($cnx,"julia_lavergne")) {
				$requete="SELECT*FROM personne WHERE id=$id";
				$result=mysqli_query($cnx,$requete);
				$enr=mysqli_fetch_object($result);

		echo "Voulez vous supprimer le compte client de $enr->nom $enr->prenom. <br>
			<form action='del_personne.php' method='get'>
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
