<?php
require_once '../bootstrap.php';

if (!isUserLoggedIn()) {
    header("Location: login.php");  
    exit();
}

$preferenze = $dbh->getCorsi();
$preferenze_inserite = array();
foreach($preferenze as $pref){
    if(isset($_POST["pref_".$pref["Codice"]])){
        array_push($preferenze_inserite, $pref["Codice"]);
    }
}

$dbh->deletePreferenze($_SESSION["matricola"]);

foreach($preferenze_inserite as $pref){
    $dbh->insertPreferenze($_SESSION["matricola"], $pref);
}

header("Location: profilo.php");
exit();
?>