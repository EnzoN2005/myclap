<?php
session_start();
	include_once "libs/maLibUtils.php";
	include("templates/header.php");
	$view = valider("view"); 

	// S'il est $view est vide,
    // on charge la vue accueil par défaut
	if (!$view) $view = "inventaire"; 

	switch($view)
	{		

		case "inventaire" : 
			include("templates/inventaire.php");
		break;

		case "login" : 
			include("templates/login.php");
		break; 

		case "mes_emprunts" : 
			include("templates/mes_emprunts.php");
		break;

		case "panier" : 
			include("templates/panier.php");
		break;
		
		case "admin_gestion" : 
			include("templates/admin_gestion.php");
		break;

		case "admin_emprunts" : 
			include("templates/admin_emprunts.php");
		break;
		default :
			if (file_exists("templates/$view.php"))
				include("templates/$view.php");

	}


	include("templates/footer.php");


	
?>
