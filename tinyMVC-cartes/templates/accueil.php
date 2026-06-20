<?php
// Sécurité : redirection si appel direct
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
    header("Location:../index.php?view=accueil");
    die("");
}
?>

<div id="corps">
    <h1>Bienvenue sur l'Accueil</h1>
    
    <div style="text-align: center; margin-top: 30px;">
        <img src="ressources/images/jongleur.png" alt="Le Jongleur" style="max-width: 400px;" />
    </div>
</div>