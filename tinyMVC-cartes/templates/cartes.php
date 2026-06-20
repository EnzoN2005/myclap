<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
    header("Location:../index.php?view=cartes");
    die("");
}

include_once("libs/modele.php");
include_once("libs/maLibForms.php");
include_once("libs/maLibImages.php");

?>

<h3> Cartes existantes </h3>
<?php
    $cartes= listerCartes();
    mkTable($cartes);
?>

<h3> Nouvelle carte </h3>
<?php 
    mkForm("controleur.php");
        echo "Nom de la carte ";
        mkInput("text", "nomCarte"); 
        echo "<br />";

        echo "Illustration : ";
        $listeImages = listerImages("ressources/images/");
        
        mkSelect("illustration", $listeImages, "nomFichier", "nomAffiche");
        echo "<br />";

        mkInput("submit", "action", "Créer carte");

        endForm();

?>




