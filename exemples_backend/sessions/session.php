<?php
// definir le cookie d'identification de session
session_start();

if (isset($_GET["pseudo"]))
{
	$_SESSION["pseudo"] = $_GET["pseudo"];
	header("Location:lireSession.php");
}
else {
	echo "<form>"; 
	echo "Entrez votre pseudo : ";
	echo '<input type="text" name="pseudo" />';
	echo '<input type="submit" name="OK" />';
	echo "</form>";
}
?>

