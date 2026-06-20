<?php

// charger maLibUtils.php
include_once("../libs/maLibUtils.php");

// récupérer la chaine lang si elle existe avec la fonction valider()
if ($lang = valider("lang"))
{
	// il s'agit d'une affectation ! ce que fait ce code c'est 	
	// 1) tester la présence d'une variable lang dans la QS
	// 2) affecter à la variable $lang la valeur de $_REQUEST["lang"]
	// OU false suivant le contexte
	// 3) tester la valeur de la variable $lang 
	// (en effet, la valeur d'une affectation dans un if, 
	// c'est la valeur affectée)

	// utiliser sa valeur pour définir 
	// la valeur du paramètre langue actuelle 
	$langueActuelle=$lang;
}
else $langueActuelle="fr";


function charger($fic, $l="fr")
{
	global $str;	// les variables disponibles dans le fichier inclus 
			// sont uniquement celles disponibles depuis la ligne où le fichier est inclus

	switch($l)
	{
		case "fr" : 
		case "FR": 
				$langue="_fr";
		break;

		default : 
				$langue =  "_" . $l;
		break;
	}

	include($fic . $langue . ".php"); 
	// ce fichier contient des affichages du tableau $str ! 
}

// Chargement du fichier de données
include_once("dictionnaire.php");

// création des variables par lecture du fichier de données 
$str = $data[$langueActuelle]; 

// production du visuel à l'aide du template dans la langue souhaitée
charger("presentation",$langueActuelle); 

?>

<hr />
<a href="?lang=fr">FR</a> &nbsp; <a href="?lang=en">EN</a>










