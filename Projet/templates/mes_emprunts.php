<?php
    include_once("libs/maLibUtils.php");
    include_once("libs/modele.php");
    include_once("libs/maLibForms.php");
    
    redirigerParIndexVers("mes_emprunts");
?>

<h1> Mes emprunts</h1>

<?php
    //$idUser = $_SESSION["idUser"];
    $idUser = 1;

    $emprunts = listerEmprunts($idUser);

    mkTable($emprunts);
?>

</br>