<?php
// definir le cookie d'identifiaction de session
session_start();

include("../libs/maLibUtils.php");

if (valider("pseudo","SESSION")) {
	echo "<h3>Bienvenue $_SESSION[pseudo]</h3>";
	echo '<a href="logout.php">Se d&eacute;connecter</a>';
}
else {
	echo "<h3>Utilisateur inconnu ! </h3>";
	echo '<a href="session.php">D&eacute;finir l\'utilisateur</a>';
}

?>


