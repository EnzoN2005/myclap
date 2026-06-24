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
<form action="index.php" method="get">
<input type="hidden" name="view" value="admin_emprunts" />
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

<?php
$filtre = $_GET['filtre'] ?? '';
if ($filtre == "statut"){
   $statutsPossibles = ['PENDING','CART',  'VALIDATED', 'RETRIEVED', 'RETURNED'];
     $statutsPossiblesTexte = ['en attente de validation','dans un panier ', 'validés', 'en cours', 'retournés'];
   $tabStatuts = [];

for ($i = 0; $i <= 4; $i++) {
    $tabStatuts[] = [
        'code_statut' => $statutsPossibles[$i],      
        'texte_statut' => $statutsPossiblesTexte[$i] 
    ];}

   for ($i=0;$i<=4;$i++){
       echo"<h2>Emprunts " .$statutsPossiblesTexte[$i]. "</h2>";
  $affichage = listerEmpruntsStatut($statutsPossibles[$i]);
  if (!empty($affichage)) {
        mkTable($affichage, array("nom_utilisateur","start_date","end_date","return_date","status","id"));
     
     echo "<div>";

  mkForm("controleur.php");
    echo "Selectionner l'emprunt à modifier :  ";

  mkSelect("idEmprunt",$affichage,"id","id");
   echo "</br>";
  echo "Selectionner le nouveau statut :  ";
  mkSelect("statutSelectionne", $tabStatuts, "code_statut", "texte_statut");
  echo "</br>";
  mkInput("Submit", "action", "Modifier le statut");
  endForm();
      echo "</div>";}

      else {
        echo "<p>Aucun emprunt trouvé avec ce statut.</p>";
    }

  }

  
    
}









