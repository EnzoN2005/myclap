<?php

include("../libs/maLibUtils.php");

if ( (($login=valider("login")) === false)  || (($passe=valider("passe")) === false) ) {
	header("Location:redirection_form.php?msg=" . urlencode("Identifiants login & passe incorrects !"));
	die("stop");
}
else 
{
	header("Location:redirection_form.php?msg=" . urlencode("Vous avez saisi : ($login,$passe)"));	
}

?>

Page privée... ce texte ne devrait pas apparaître ! 


