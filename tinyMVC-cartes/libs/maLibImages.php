<?php

function mkImages($cheminRepertoire) {
    $img = array(); 
    $rep = opendir($cheminRepertoire); 
    while ($fichier = readdir($rep)) {
        if (($fichier != ".") && ($fichier != "..")) {
            $img[] = $fichier;
        }
    }
    closedir($rep);
    
    //affichage pour chaque image
    foreach($img as $nomFichier) {
        
        $nomSansExtension = pathinfo($nomFichier, PATHINFO_FILENAME);
        $cheminComplet = $cheminRepertoire . $nomFichier;

        echo "<figure style=\"display: inline-block; margin: 15px; text-align: center;\">\n";
        echo "  <img src=\"$cheminComplet\" alt=\"$nomSansExtension\" style=\"max-width: 200px;\" />\n";
        echo "  <figcaption><b>$nomSansExtension</b></figcaption>\n";
        echo "</figure>\n";
    }
}

//fonction pour lister les images pour faciliter la création du menu déroulant
function listerImages($cheminRepertoire) {
    $imgArray = array(); 
    $rep = opendir($cheminRepertoire); 
    while ($fichier = readdir($rep)) {
        if (($fichier != ".") && ($fichier != "..")) {
            $nomSansExtension = pathinfo($fichier, PATHINFO_FILENAME);
            $imgArray[] = array(
                "nomFichier" => $fichier,     
                "nomAffiche" => $nomSansExtension
            );
        }
    }
    closedir($rep);
    return $imgArray;
}
?>