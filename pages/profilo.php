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

$templateParams["preferenzeStudente"] = $dbh->getPreferencePerMatricola($_SESSION["matricola"],3);
$templateParams["tuttePreferenze"] = $dbh->getCorsi();
$templateParams["tuttePreferenzeStudente"] = $dbh->getPreferencePerMatricola($_SESSION["matricola"]);

$templateParams["gruppiDelloStudente"] = $dbh->getGruppiPerStudenteLoggato($_SESSION["matricola"]);
$templateParams["gruppiDiAppartenenza"] = $dbh->getGruppiIscrittoNonCreatore($_SESSION["matricola"]);

require "templates/general/base.php";
?>