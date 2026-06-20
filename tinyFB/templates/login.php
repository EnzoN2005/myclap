<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}

// cette vue est susceptible de recevoir msg
$messageHTML = ""; 
if ($msg = valider("msg")) {
	$messageHTML = "<div style=\"color:red;\">$msg</div>";
} 
?>

<div id="corps">

<h1>Connexion</h1>

<?=$messageHTML?>

<div id="formLogin">
<form action="controleur.php" method="GET">
Login : <input type="text" name="login" /><br />
Passe : <input type="password" name="passe" /><br />
<input type="submit" name="action" value="Connexion" />
</form>
</div>


</div>
