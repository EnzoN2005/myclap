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

echo "<p>Donn&eacute;es envoy&eacute;es par GET: </p>";
show($_GET);
 

echo "<p>Donn&eacute;es envoy&eacute;es par POST: </p>";
show($_POST);

?>
