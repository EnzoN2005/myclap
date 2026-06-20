<?php
include("libs/maLibUtils.php");

if ( !valider("TestCookie","COOKIE"))
	setcookie("TestCookie", "ValeurDuCookie", time()+60*60*24*30);
 
$msg = ""; 
if ( ($nom = valider("nom")) && ($val = valider("val")) )  {
	setcookie($nom, $val, time()+60*60*24*30);
	$msg = "Nouveau cookie envoy&eacute; au navigateur : ($nom,$val)";
}
?>


<h1>D&eacute;finition de cookies</h1>

<h3>Cette page envoie des cookies au navigateur, valables 30 jours</h3>
<?php echo $msg; ?>

<hr />

<h3>Cookies transmis par le navigateur avec la requ&ecirc;te: </h3>

<?php 
tprint($_COOKIE);
?>

<hr />
<h2>Ajouter un autre cookie : </h2>

<form>
<label for="nom">Nom :</label>
<input type="text" id="nom" name="nom" />
<br />
<label for="val">Valeur :</label>
<input type="text" id="val" name="val" /> 
<br />
<input type="submit" value="Ajouter" />
</form>


