<?php
	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

?>

<h3>Pages existantes</h3>
<?php
    $pages = listerPages();
    mkTable($pages);
?>

<h3> Gestion pages</h3>
<?php
    mkForm("controleur.php");
        
        echo "Nom de la page : ";
        mkInput("text", "nomPage"); 
        echo "<br /><br />";
        
        mkInput("submit", "action", "Créer page");
        mkInput("submit", "action", "Supprimer page");
        endForm();
?>