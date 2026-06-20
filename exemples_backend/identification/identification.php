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

<h1>Formulaire d'identification</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") 
{	
	echo "Cette page a été appelée par la méthode GET <br />"; 
	$tab=$_GET;
}
else 
{
	echo "Cette page a été appelée par la méthode POST <br />";
	$tab=$_POST;
}

if (count($tab)>0)
{ 
	echo "Données reçues : <pre>";
	print_r($tab);
	echo "</pre><br />";
}
else
{
	echo "Aucune donnée reçue";
}

echo "<hr />";
?>

<h2>Peut provoquer des erreurs !</h2>
<pre>
&lt;?php

echo "&lt;h3> Bienvenue " . $_POST["login"] . "! &lt;/h3>"; 

?&gt;
</pre>

<?php
echo "<h3> Bienvenue " . $_POST["login"] . "! </h3>"; 
?>

<hr />
<h2>Mieux mais long à écrire !</h2>
<pre>
&lt;?php

if (isset($_POST["login"])) 
	echo "&lt;h3>Bienvenue  $_POST[login] ! &lt;/h3>";
else 
	echo "&lt;h3>Pas de login fourni &lt;/h3>";

?&gt;
</pre>

<?php
if (isset($_POST["login"])) 
	echo "<h3>Bienvenue  $_POST[login] ! </h3>";
else 
	echo "<h3>Pas de login fourni</h3>";
?>

<hr />
<h2>Librairie maLibUtils.php</h2>
<pre>
&lt;?php

include("libs/maLibUtils.php");
if ( ($login=valider("login")) && ($passe=valider("passe")) ) {
	echo "&lt;h3>Bienvenue  $login ! &lt;/h3>";
	echo "Vos identifiants : ($login,$passe)"; 
}
else
	echo "&lt;h3>Pas de login fourni &lt;/h3>";

?&gt;
</pre>

<?php
include("../libs/maLibUtils.php");
if ( ($login=valider("login")) && ($passe=valider("passe")) ) {
	echo "<h3>Bienvenue  $login ! </h3>";
	echo "Vos identifiants : ($login,$passe)"; 
}
else 
	echo "<h3>Pas de login fourni</h3>";


?>

<p>
<a href="identification.html">Revenir au formulaire</a>
</p>

</body>
<!-- **** F I N **** B O D Y **** -->

</html>
