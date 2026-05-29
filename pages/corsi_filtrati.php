<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Corsi";
$templateParams["page"] = "templates/specific/template-corsi.php";
$templateParams["corsi"] = $dbh->getCorsiPerNome();

require "templates/general/base.php";
?>