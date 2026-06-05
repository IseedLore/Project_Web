<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Visualizzazione gruppo";
$templateParams["page"] = "templates/specific/singolo-gruppo.php";

if(isset($_GET["single-group"])){
    $templateParams["gruppo-singolo"] =  $dbh->getGruppoPerCodice(intval($_GET["single-group"]))[0];
}

/*
if(isset($_POST["new-enrollment-group-id"]) && isset($_POST["new-enrollment-student-id"])){
    $dbh->insertNuovaIscrizioneGruppo(intval($_POST["new-enrollment-group-id"]), $_POST["new-enrollment-student-id"]);
    $dbh->updateNumeroMembriGruppo(intval($_POST["new-enrollment-group-id"]));
}*/

$templateParams["imgprofilo"] =  "default_profile_icon.png";

require "templates/general/base.php";
?>