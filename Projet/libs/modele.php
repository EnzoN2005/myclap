<?php
    include_once("libs/maLibSQL.pdo.php");

    function rechercherMateriel($recherche) {
        $recherche = addslashes($recherche);
        
        $SQL = "SELECT p.id, p.nom, p.description, p.caution, ph.url AS photo_url
                FROM produit AS p
                LEFT JOIN photos_produit AS ph ON p.id = ph.produitId AND ph.ordre = 0 
                WHERE p.nom LIKE '%$recherche%' OR p.description LIKE '%$recherche%'"; 
                
        return parcoursRs(SQLSelect($SQL)); 
    }

    function listerPanier($idUser) {

        $sql = "SELECT nom, itemQte, dateDebutEmprunt, dateFinEmprunt
        FROM panier 
        INNER JOIN panier_item 
        ON panier.id=panier_item.panierId
        INNER JOIN produit
        ON produit.id = panier_item.productId
        WHERE customerId='$idUser'";

        return parcoursRs(SQLSelect($sql));
    }

    function listerEmprunts($idUser) {
        $sql = "SELECT nom, start_date, end_date, emprunt.status 
        FROM emprunt
        INNER JOIN emprunt_item
        ON emprunt.id = emprunt_item.emprunt_id
        INNER JOIN produit
        ON emprunt_item.product_id = produit.id
        WHERE user_id='$idUser'";

        return parcoursRs(SQLSelect($sql));
    }

    function listerUtilisateurs($tri = "tout") {
    $SQL = "SELECT nom, contact, role, id, numAppart, points FROM user ORDER BY id DESC";

    
    return parcoursRS(SQLSelect($SQL));
}


function isAdmin($idUser)
{
	$SQL = "SELECT role FROM user WHERE id='$idUser' and role=1"; 
	return SQLGetChamp($SQL);
	// vérifie si l'utilisateur est un administrateur
}


function ajouterUtilisateur($nom, $contact, $passe ){
    $SQL= "INSERT INTO user(nom, contact, mdp,) VALUES ('$nom','$contact','$passe') ";
    return SQLInsert($SQL);
}


function verifUserBdd($nom,$passe){
    $SQL="SELECT id from user WHERE nom='$nom' AND mdp='$passe'";
    return SQLGetChamp($SQL); 


}

function rendreAdmin($idUser){
    $SQL="UPDATE user SET role=1 WHERE id='$idUser'";
    SQLUpdate($SQL);
}

function retirerAdmin($idUser){
    $SQL="UPDATE user SET role=0 WHERE id='$idUser'";
    SQLUpdate($SQL);


}

function gestionEmprunts($userId) {
   
    $sql = "SELECT 
                COALESCE(SUM(CASE WHEN status = 'fini' THEN 1 ELSE 0 END), 0) AS emprunts_termines,
                COALESCE(SUM(CASE WHEN status = 'en cours' THEN 1 ELSE 0 END), 0) AS emprunts_en_cours
            FROM emprunt
            WHERE user_id = $userId";
   
    if (SQLSelect($sql) !== false) {
       
        $tableauResultats = parcoursRs(SQLSelect($sql));
        
       
        if (!empty($tableauResultats)) {
            return $tableauResultats[0];
        }
    }
 return [
        'emprunts_termines' => 0, 
        'emprunts_en_cours' => 0
    ];
}

function listerUtilisateursEtEmprunts() {
    
    $utilisateurs = listerUtilisateurs();
    
    if (empty($utilisateurs)) {
        return [];
    }

    foreach ($utilisateurs as &$user) {
        
        $stats = gestionEmprunts($user['id']);
        
        $user['emprunts_termines'] = $stats['emprunts_termines'];
        $user['emprunts_en_cours'] = $stats['emprunts_en_cours'];
    }
    
    return $utilisateurs;
}

function filtrerEmprunts($filtre) {

}


?>