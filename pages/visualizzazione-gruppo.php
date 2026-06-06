<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Visualizzazione gruppo";
$templateParams["page"] = "templates/specific/singolo-gruppo.php";

if(isset($_POST["new-subscription"]) && isset($_POST["single-group"])){
    if(!isUserLoggedIn()){
        $templateParams["errore"] = "Per iscriversi, bisogna essere loggati!";
    } else{
        $array = $dbh->getStudentiIscrittiGruppo($_POST["single-group"]);
        $matricoleGruppo = array();
        /* Memorizzazione delle matricole degli studenti iscritti al gruppo in un array */
        foreach($array as $element):
            array_push($matricoleGruppo, $element["Matricola"]);
        endforeach;
        $_POST["new-subscription-student-id"] = str_replace('/', '', $_POST["new-subscription-student-id"]);
        if(in_array($_POST["new-subscription-student-id"], $matricoleGruppo)){
            $templateParams["errore"] = "Sei già iscritto a questo gruppo!";
        } else{
            $dbh->insertNuovaIscrizioneGruppo(intval($_POST["single-group"]), $_POST["new-subscription-student-id"]);
            $dbh->updateNumeroMembriGruppo(intval($_POST["single-group"]));
        }
    }
}

if(isset($_POST["single-group"])){
    $templateParams["gruppo-singolo"] =  $dbh->getGruppoPerCodice(intval($_POST["single-group"]))[0];
    $templateParams["creatore-gruppo"] = $dbh->getCreatoreGruppo(intval($_POST["single-group"]))[0];
}

$templateParams["imgprofilo"] =  "default_profile_icon.png";

require "templates/general/base.php";
?>