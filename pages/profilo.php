<?php
require_once '../bootstrap.php';

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit();
}

$templateParams["title"] = "StudyConnect - Profilo";
$templateParams["page"] = "templates/specific/template-profilo.php";

$templateParams["nome"] = $_SESSION["nome"];
$templateParams["cognome"] = $_SESSION["cognome"];
$templateParams["email"] = $_SESSION["email"];

$templateParams["preferenzeStudente"] = $dbh->getPreferencePerMatricolaLimit($_SESSION["matricola"], 5);
$templateParams["tuttePreferenze"] = $dbh->getCorsi();

$templateParams["gruppiDelloStudente"] = $dbh->getGruppiPerStudenteLoggato($_SESSION["matricola"]);
$templateParams["gruppiDiAppartenenza"] = $dbh->getGruppiIscrittoNonCreatore($_SESSION["matricola"]);

$templateParams["imgprofilo"] =  $dbh->getStudente($_SESSION["matricola"])[0]["Immagine"];
require "templates/general/base.php";
?>