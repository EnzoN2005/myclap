<?php
	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/maLibForms.php";
	include_once "libs/modele.php"; 
	
	//verification que le user est connecté, sinon redirection vers login avec message
	if (!valider("connecte", "SESSION")){
		header("Location: index.php?view=login&msg=". urlencode("Veuillez vous connecter"));
		die("");
	}
	
	$idUser_s= $_SESSION["idUser"];
	if (!isAdmin($idUser_s)){
		header("Location: index.php?view=accueil&msg=".urlencode("Accès refusé"));
		die("");
	}		
?>	
<h3> Gestion des utilisateurs </h3>

<?php
	mkForm("controleur.php");
	echo "pseudo: ";
	mkInput("text", "pseudo");
	echo"<br /> passe: ";
	mkInput("password", "passe");
	echo"<br /> couleur: ";
	mkInput("txt", "couleur");
	echo"<br/><br/>";
	mkInput("submit","action", "Créer utilisateur");
	mkInput("submit","action", "Supprimer utilisateur");
	mkInput("submit","action", "Changer couleur");
	mkInput("submit","action", "Nouvel admin");
	mkInput("submit","action", "Retrograder");
	endForm();
?>

