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

		// Un paramètre action a été soumis, on fait le boulot...
		switch($action)
		{
			case "Créer carte":
				if ($nom=valider("nomCarte"))
				if ($image=valider("illustration")){
                        creerCarte($nom, $image);    
                        $qs = "?view=cartes&msg=" . urlencode("Création de la carte avec succès !");
                } else {
                    $qs = "?view=cartes&msg=" . urlencode("Erreur : données manquantes.");
                }
			break;
			case "Créer page":
                if ($nom = valider("nomPage")) {
                    creerPage($nom);
                    $qs = "?view=pages&msg=" . urlencode("La page a été créée.");
				}
            break;

            case "Supprimer page":
                if ($idPage = valider("idPage")) {
                    supprimerPage($idPage);
                    $qs = "?view=pages&msg=" . urlencode("La page a été supprimée.");
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










