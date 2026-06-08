<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Crea gruppo";
$templateParams["page"] = "templates/specific/template-crea-gruppo.php";
$templateParams["corsi"] = $dbh->getCorsi();

if(isset($_GET["type"])){
    if($_GET["type"]=="studio"){
        $templateParams["file-tipo"] = 'templates/specific/gruppo-studio.php';
    } else{
        $templateParams["file-tipo"] = 'templates/specific/gruppo-progetto.php';
    }
}

if(isset($_POST["create-group"])){
    $nome = $_POST["nome"];
    $descrizione = $_POST["desc"];
    $numMembri = $_POST["num"];
    $matricola = $_SESSION["matricola"];
    $corso = $_POST["corso"];

    if($_POST["create-group"]=="Crea gruppo studio"){
        $result1 = $dbh->insertGruppoStudio($nome, $descrizione, $numMembri, $matricola, $corso);
    }

    if($_POST["create-group"]=="Crea gruppo progetto"){
        $data = $_POST["data"];
        $result1 = $dbh->insertGruppoProgetto($nome, $descrizione, $numMembri, $matricola, $corso, $data);
    }

    $result2 = $dbh->insertIscrizioneNuovoGruppo($matricola);

    if($result1!=FALSE && $result2!=FALSE){
        $msg = "Creazione gruppo avvenuta con successo!";
    } else{
        $msg = "Errore nella creazione del gruppo!";
    }
}

require "templates/general/base.php";
?>