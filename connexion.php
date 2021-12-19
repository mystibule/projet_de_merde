<!Doctype html>
<html>

	<head>
		<meta charset='utf-8'>
		<title> connexion </title>
	</head>

	<body>

		<?php
			function connexion() {
				$host = "localhost";
				$login = "root";
				$password = "root";
				$base = "julia_lavergne";

				$cnx = @mysqli_connect($host,$login,$password);
				
				if ($cnx) {
					if (@mysqli_select_db($cnx,$base)) return $cnx;
					else {
						@mysqli_close($cnx);
						die("Sélection de la base impossible !");
					}
				}
				else die("Connexion au serveur impossible !");
			}
		?>

	</body>
</html>