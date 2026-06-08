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
        $id = $dbh->insertGruppoStudio($nome, $descrizione, $numMembri, $matricola, $corso);
    }

    if($_POST["create-group"]=="Crea gruppo progetto"){
        $data = $_POST["data"];
        $id = $dbh->insertGruppoProgetto($nome, $descrizione, $numMembri, $matricola, $corso, $data);
    }

    if($id!=false){
        $result2 = $dbh->insertNuovaIscrizioneGruppo($id, $matricola);
    }
    
    if($result2!=false){
        $msg = "Creazione gruppo avvenuta con successo!";
    } else{
        $msg = "Errore nella creazione del gruppo!";
    }
}

$templateParams["imgprofilo"] =  "default_profile_icon.png";

require "templates/general/base.php";
?>