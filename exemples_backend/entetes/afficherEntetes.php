<h1>Page afficherEntetes.php</h1>

<p><strong>De quelle page vient-on ?</strong>
<?php
echo $_SERVER["HTTP_REFERER"] . "</p>";

echo "<table border=\"1\"><tr><td>Indice</td><td>Valeur</td></tr>";

foreach ($_SERVER as $cle => $val)
{
	echo "<tr><td>$cle</td><td>$val</td></tr>";
}

echo "</table>";

?>

