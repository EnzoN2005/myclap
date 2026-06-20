<?php

include_once("libs/maLibSQL.pdo.php");


function verifUserBdd($login,$passe)
{
	$SQL = "SELECT id FROM users"; 
	$SQL .= " WHERE pseudo='$login' AND passe='$passe'";
	
	return SQLGetChamp($SQL); 
}

function isAdmin($idUser)
{
	// vérifie si l'utilisateur est un administrateur
	$SQL = "SELECT admin FROM users WHERE id='$idUser'";
	return SQLGetChamp($SQL);
}
function pseudoExistant($pseudo){
	$occurences= SQLSelect("SELECT count(*) as nb FROM users WHERE pseudo='$pseudo'");
	return $occurrences[0]['nb']>0;
}
function ajouterUtilisateur($pseudo, $passe){
	$SQL ="INSERT INTO users(pseudo,passe) VALUES ('$pseudo','$passe') ";
	return SQLInsert($SQL);
}

function supprimerUtilisateur($pseudo){
	$SQL ="DELETE FROM users WHERE pseudo='$pseudo'";
	SQLDelete($SQL); 
}

function changerCouleur($pseudo, $couleur){
	$SQL ="UPDATE users SET couleur='$couleur' WHERE pseudo='$pseudo'";
	SQLUpdate($SQL); 
}

function updateAdmin($pseudo, $val){
	$SQL ="UPDATE users SET admin=0 WHERE pseudo='$pseudo'";
	SQLUpdate($SQL); 
}
?>
