<html>
<body>

<h1>Elements de php</h1>

<h3>
Le php est int&eacute;gr&eacute; directement dans la page html, au sein des balises &lt;php? et ?&gt; 
</h3>

<hr />

<pre>
&lt;?php
$uneVariable="sa valeur"; 	// non typ&eacute;e
echo "Valeur de cette variable : " . $uneVariable; 
?&gt;
</pre>

<?php
$uneVariable="sa valeur"; 	// non typée
echo "Valeur de cette variable : " . $uneVariable; 
?>

<hr />

<h3>
En php, les tableaux peuvent &ecirc;tre indic&eacute;s par des entiers mais aussi par des cha&icirc;nes, on les appelle des tableaux <i>associatifs</i>. 
</h3>

<pre>
&lt;?php

$unTableau = array(1,2,"trois");	 	
$unTableau[] = 4; 						
$tabAssociatif = array("cle"=>"valeur", "cle2"=>2);
$tabAssociatif["cle3"] = "encore";

?&gt;
</pre>

<?php
$unTableau = array(1,2,"trois");	 	// hétérogène
$unTableau[] = 4; 						// insertion sans indice !
$tabAssociatif = array("cle"=>"valeur", "cle2"=>2);
$tabAssociatif["cle3"] = "encore";
?>

<hr />

<h3>
Affichage d'un tableau indic&eacute; par des entiers &agrave; l'aide d'une boucle for :
</h3>
<pre>
&lt;?php
for($i=0;$i&lt;count($unTableau);$i++) 
	echo $unTableau[$i] . "&lt;br />";
?&gt;
</pre>

<?php
for($i=0;$i<count($unTableau);$i++) 
	echo $unTableau[$i] . "<br />";
?>

<hr />
<h3>
Affichage d'un tableau indic&eacute; par des entiers &agrave; l'aide d'une boucle foreach :
</h3>

<pre>
&lt;?php
foreach ($unTableau as $nextVal) 
	echo $nextVal . "&lt;br />";
?&gt;
</pre>

<?php
foreach ($unTableau as $nextVal) 
	echo $nextVal . "<br />";
?>

<hr />
<h3>
Affichage d'un tableau associatif &agrave; l'aide d'une boucle foreach :
</h3>
<pre>
&lt;?php
foreach ($tabAssociatif as $nextCle => $nextVal) 
	echo "nextCle =  $nextCle // nextVal = $nextVal &lt;br />";
?&gt;
</pre>

<?php
foreach ($tabAssociatif as $nextCle => $nextVal) 
	echo "nextCle =  $nextCle // nextVal = $nextVal <br />";
?>


<hr />
<h3>
Fonction d'affichage d'un tableau : tprint
</h3>
<pre>
&lt;?php

function tprint($tab, $nom="")
{
	echo "&lt;pre>$nom \n";
	print_r($tab);
	echo "&lt;/pre>\n";	
}

tprint($unTableau, "unTableau : ");
tprint($tabAssociatif, "tabAssociatif : ");

?&gt;
</pre>

<?php

function tprint($tab, $nom="")
{
	echo "<pre>$nom \n";
	print_r($tab);
	echo "</pre>\n";	
}

tprint($unTableau, "unTableau : ");
tprint($tabAssociatif, "tabAssociatif : ");

echo "<hr /> Sans les balises de préformatage :<br />";
print_r($unTableau);
?>

</body>
</html>
