<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Corsi";
$templateParams["page"] = "templates/specific/template-corsi.php";
$templateParams["corsi"] = $dbh->getCorsi();
$templateParams["imgprofilo"] =  "default_profile_icon.png";
require "templates/general/base.php";
?>