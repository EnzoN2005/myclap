<?php

if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
    header("Location:../index.php?view=images");
    die("");
}

include_once("libs/maLibImages.php"); 
?>

<div id="corps">
    <h1>Galerie d'images</h1>
    
    <?php
        mkImages("ressources/images/");
    ?>
</div>