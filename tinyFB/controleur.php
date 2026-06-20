<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

	$qs = "";

	if ($action = valider("action"))
	{
		ob_start ();

		echo "Action = '$action' <br />";

		// ATTENTION : le codage des caractères peut poser PB 
		// si on utilise des actions comportant des accents... 
		// A EVITER si on ne maitrise pas ce type de problématiques

		/* TODO: exercice 4
		// Dans tous les cas, il faut etre logue... 
		// Sauf si on veut se connecter (action == Connexion)

		if ($action != "Connexion") 
			securiser("login");
		*/

		// Un paramètre action a été soumis, on fait le boulot...
		switch($action)
		{
			
			// Connexion //////////////////////////////////////////////////

			case 'deconnexion' :
			case 'Logout' :
			case 'logout' :
				// 1) détruire la session 
				session_destroy(); 
				
				// 2) afficher la prochaine vue + rajouter un message 
				$qs = "?view=login&msg=" . urlencode("Au revoir & à bientôt !");
			break; 

			case 'Connexion' :
				// On verifie la presence des champs login et passe
				if ($login = valider("login"))
				if ($passe = valider("passe"))
				{
					// On verifie l'utilisateur, et on crée des variables de session si tout est OK
					// Cf. maLibSecurisation
					verifUser($login,$passe); 
				}

				// On redirigera vers la page index automatiquement
				$qs="?view=login";
			break;
			
			case "Créer utilisateur":
				if ($pseudo=valider("pseudo"))
				if ($passe=valider("passe")){
					if (!pseudoExistant($pseudo)){
						ajouterUtilisateur($pseudo,$passe);
						$qs="?view=users&msg=".urlencode("Utilisateur créé avec succès");
					}else $qs="?view=users&msg=".urlencode("pseudo déjà utilisé");
				}
			break;
			case "Supprimer utilisateur":
				if ($pseudo=valider("pseudo")){
					supprimerUtilisateur($pseudo);
					$qs="?view=users&msg=".urlencode("Utilisateur supprimé avec succès");
				}
			break;
			case "Changer couleur":
				if ($couleur=valider("couleur"))
				if ($pseudo=valider("pseudo")){
					changerCouleur($pseudo,$couleur);
					$qs="?view=users&msg=".urlencode("couleur modifiée avec succès");
				}
			break;
			case "Nouvel admin":
				if ($pseudo=valider("pseudo")){
					updateAdmin($pseudo,1);
					$qs="?view=users&msg=".urlencode("droit modifié avec succès");
				}
			break;
			case "Retrograder":
				if ($pseudo=valider("pseudo")){
					updateAdmin($pseudo,0);
					$qs="?view=users&msg=".urlencode("droit modifié avec succès");
				}
			break;
			
			
		}

	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	header("Location:" . $urlBase . $qs);
	//qs doit contenir le symbole '?'

	// On écrit seulement après cette entête
	ob_end_flush();
	
?>










