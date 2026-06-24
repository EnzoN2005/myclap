 <script src="jqueryUI/jquery-4.0.0.min.js"></script>
 <script src="jqueryUI/jquery-ui.min.js"></script>
 <script src="js/scriptInv.js"></script>



<script>

$(document).on("click", "#afficher_emprunts", function{




});


</script>



<?php
include_once("libs/modele.php"); // listes
include_once("libs/maLibUtils.php");// tprint
include_once("libs/maLibForms.php");// mkTable, mkLiens, mkSelect ...
?>
<form action="controleur.php" method="get">

<label> Choisissez un filtre :</label>

<select id='filtre' name="filtre">
  <option value=''>--Veuillez choisir un filtre--</option>
  <option value='statut'>statut</option>
  <option value='utilisateurs'>utilisateur</option>
  <option value='date_emprunt'>date d'emprunt</option>
  <option value='date_retour'>date de retour</option>
  
</select>

<input type="submit" name = "action" value ="afficher les emprunts" id="afficher_emprunts"/>
</form>









