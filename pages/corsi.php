<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Corsi";
$templateParams["page"] = "templates/template-corsi.php";
$templateParams["corsi"] = $dbh->getCorsi();

require "templates/base2.php";
?>