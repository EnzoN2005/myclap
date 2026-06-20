<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body>

<h1>Entête Location : redirection</h1>

<form action="redirection_recup.php" method="GET" >
<label for="pseudo">Pseudo : </label>
<input type="text" id="pseudo" name="login" />
<br />
<label for="mdp">Mdp :</label>
<input type="password" id="mdp" name="passe" /> 
<br />
<input type="submit" value="Envoyer" />
</form>

<hr />

<a href="redirection_recup.php"> Accès direct sans soumettre de données</a>  

<?php
	include("../libs/maLibUtils.php");
	if ($msg = valider("msg")) {
		echo "<h3>$msg</h3>";
		echo "Pour tester la page cible du formulaire par telnet, utiliser : <br />";
		echo "<pre>";
		$urlBase = dirname($_SERVER["PHP_SELF"]);	
		echo "GET " . $urlBase . "/redirection_recup.php HTTP/1.0\n";
		echo "</pre>";
	}
?>


</body>
<!-- **** F I N **** B O D Y **** -->

</html>
