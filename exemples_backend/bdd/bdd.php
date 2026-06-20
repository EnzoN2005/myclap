<?php

include("../libs/maLibSQL.pdo.php");

echo "<pre>";
echo '$SQL = "INSERT INTO users(pseudo,passe) VALUES (\'tom\',\'ig2i\')";' . "\n";
echo 'echo SQLInsert($SQL);' . "\n";
echo "</pre>";

$SQL = "INSERT INTO users(pseudo,passe) VALUES ('tom','ig2i')";
echo SQLInsert($SQL);


echo "<hr /><pre>";
echo '$SQL = "SELECT * FROM users";' . "\n";
echo '$rs = SQLSelect($SQL);' . "\n";
echo '$tab = parcoursRs($rs);' . "\n";
echo 'echo "&lt;pre>";' . "\n";
echo 'print_r($tab);' . "\n";
echo 'echo "&lt;/pre>";' . "\n";
echo "</pre>";

$SQL = "SELECT * FROM users";
$rs = SQLSelect($SQL);
$tab = parcoursRs($rs);
echo "<pre>";
print_r($tab);
echo "</pre>";


echo "<hr /><pre>";
echo '$SQL = "SELECT pseudo FROM users WHERE id=1";' . "\n";
echo 'echo SQLGetChamp($SQL);' . "\n";
echo "</pre>";

$SQL = "SELECT pseudo FROM users WHERE id=1";
echo SQLGetChamp($SQL);


echo "<hr /><pre>";
echo '$SQL = "DELETE FROM users WHERE pseudo =\'tom\'";' . "\n";
echo 'echo SQLDelete($SQL);' . "\n";
echo "</pre>";

$SQL = "DELETE FROM users WHERE pseudo ='tom'";
echo SQLDelete($SQL);

?>
