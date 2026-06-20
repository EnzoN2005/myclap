<?php

// inclure ici la librairie faciliant les requêtes SQL (en veillant à interdire les inclusions multiples)
include_once("libs/maLibSQL.pdo.php");

function listerCartes(){
    $SQL = "SELECT * FROM cartes";
    return parcoursRS(SQLSelect($SQL));

}

//pour créer une nouvelle carte
function creerCarte($nomCarte, $image) {
    $SQL = "INSERT INTO cartes (nom, image) VALUES ('$nomCarte', '$image')";
    return SQLInsert($SQL); 
}
function listerPages() {
    $SQL = "SELECT pages.id, pages.nom, nbCartes 
            FROM pages 
            INNER JOIN cartes ON pages.id = cartes.id 
            GROUP BY pages.id, pages.nom";
            
    $res = SQLSelect($SQL);
    
    return parcoursRS($res);
}

?>
