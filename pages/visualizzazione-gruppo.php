<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "StudyConnect - Visualizzazione gruppo";
$templateParams["page"] = "templates/specific/singolo-gruppo.php";

if(isset($_GET["new-subscription"]) && isset($_GET["single-group"])){
    if(!isUserLoggedIn()){
        $templateParams["errore"] = "Per iscriversi, bisogna essere loggati!";
    } else{
        $array = $dbh->getStudentiIscrittiGruppo($_GET["single-group"]);
        $matricoleGruppo = array();
        /* Memorizzazione delle matricole degli studenti iscritti al gruppo in un array */
        foreach($array as $element):
            array_push($matricoleGruppo, $element["Matricola"]);
        endforeach;
        $_GET["new-subscription-student-id"] = str_replace('/', '', $_GET["new-subscription-student-id"]);
        if(in_array($_GET["new-subscription-student-id"], $matricoleGruppo)){
            $templateParams["errore"] = "Sei già iscritto a questo gruppo!";
        } else{
            $dbh->insertNuovaIscrizioneGruppo(intval($_GET["single-group"]), $_GET["new-subscription-student-id"]);
            $dbh->updateNumeroMembriGruppo(intval($_GET["single-group"]));
        }
    }
}

if(isset($_GET["single-group"])){
    $templateParams["gruppo-singolo"] =  $dbh->getGruppoPerCodice(intval($_GET["single-group"]))[0];
    $templateParams["creatore-gruppo"] = $dbh->getCreatoreGruppo(intval($_GET["single-group"]))[0];
}

if(isset($_GET["action"])){
    $templateParams["section-modify-meetings"] = 'templates/specific/gestione-incontro.php'; 
    $templateParams["azione"] = $_GET["action"];
    if($_GET["action"]!=1){
        $templateParams["incontro"] = $dbh->getIncontroGruppoPerId($_GET["single-group"], $_GET["date"], $_GET["time"])[0];
    }
} else{
    $templateParams["section-modify-meetings"] = 'templates/specific/modifica-incontri.php'; 
}


/* Gestione modifica di un incontro */
if(isset($_POST["action"])){
    $gruppoIncontro = $_POST["single-group"];
    $templateParams["gruppo-singolo"] =  $dbh->getGruppoPerCodice(intval($_POST["single-group"]))[0];
    $templateParams["creatore-gruppo"] = $dbh->getCreatoreGruppo(intval($_POST["single-group"]))[0];

    /* Inserimento */
    if($_POST["action"]==1){
        $data = $_POST["data"];
        $orario = $_POST["orario"];
        $mod = $_POST["mod"];
        $luogo = $_POST["luogo"];
        $note = $_POST["note"];
        $dbh->insertIncontro($gruppoIncontro, $data, $orario, $mod, $luogo, $note);
    }

    /* Modifica */
    if($_POST["action"]==2){
        $vecchiaData = $_POST["olddata"];
        $vecchioOrario = $_POST["oldtime"];
        $data = $_POST["data"];
        $orario = $_POST["orario"];
        $mod = $_POST["mod"];
        $luogo = $_POST["luogo"];
        $note = $_POST["note"];

        if($data==$vecchiaData && $orario==$vecchioOrario){
            $dbh->updateIncontro($gruppoIncontro, $data, $orario, $mod, $luogo, $note);
        } else{
            $dbh->deleteIncontro($gruppoIncontro, $vecchiaData, $vecchioOrario);
            $dbh->insertIncontro($gruppoIncontro, $data, $orario, $mod, $luogo, $note);
        }
    }

    /* Eliminazione */
    if($_POST["action"]==3){
        $vecchiaData = $_POST["olddata"];
        $vecchioOrario = $_POST["oldtime"];
        $dbh->deleteIncontro($gruppoIncontro, $vecchiaData, $vecchioOrario);
    }
}

if(isset($_GET["delete-group"]) && $_GET["delete-group"]=="true"){
    $result = $dbh->deleteGruppo($_GET["single-group"]);
    if(!$result){
        $templateParams["errore"] = "C'è stato un errore e non è stato cancellato il gruppo.";
    } else{
        header("Location: gruppi.php");
    }
}

if(isset($_GET["update-visible"]) && $_GET["update-visible"]=="true"){
    $templateParams["update-form-visible"] = "true";
}

if(isset($_GET["modifica-gruppo"])){
    $gruppo = $_GET["single-group"];
    $nome = $_GET["nome"];
    $descrizione = $_GET["descrizione"];

    $result = $dbh->updateGruppoNomeDescr($gruppo, $nome, $descrizione);
    if(!$result){
        $templateParams["errore"] = "C'è stato un errore nella modifica";
    } else{
        $templateParams["gruppo-singolo"] =  $dbh->getGruppoPerCodice(intval($_GET["single-group"]))[0];
        $templateParams["creatore-gruppo"] = $dbh->getCreatoreGruppo(intval($_GET["single-group"]))[0];
    }
}

require "templates/general/base.php";
?>