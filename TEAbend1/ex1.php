<style>
	table {border:1px solid black; border-collapse:collapse;}
	th,td {border:1px solid black; padding:5px;}
</style>

<?php
function show($tab)
{
	echo "<table><tr><th>Nom</th><th>Valeur</th></tr>";
	foreach( $tab as $cle => $val)
	{
		echo "<tr><th>$cle</th><td>";
		if (is_array($val))
			show($val);
		else 
			echo "$val"; 
		echo "</td></tr>";
	}
	echo "</table>";
}

// pour éviter les soucis avec des configurations de php utilisant les tags courts
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body>

<?php

echo "<h2>Cette page a été appelée par la méthode " . $_SERVER["REQUEST_METHOD"] ;
echo "</h2><p>Données reçues : </p>";

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{	
	if (count($_GET)>0) { 
		show($_GET);
	}
	else echo "Aucune";
}
else 
{
	if (count($_POST)>0) { 
		show($_POST);
	}
	else echo "Aucune";
}
?>

<p></p>

<form action="" method="">
<input type="text" name="champ_texte" value="saisir les données"/>
<input type="submit" />
</form>
  
</body>
<!-- **** F I N **** B O D Y **** -->

</html>
