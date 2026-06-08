<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Corsi";
$templateParams["page"] = "templates/specific/template-corsi.php";

if(isset($_GET["search-course"])){
    $templateParams["corsi"] = $dbh->getCorsiPerNome($_GET["search-course"]);
} elseif(isset($_GET["visualizza"]) && isset($_GET["corsi"])) {
    if($_GET["corsi"] == "tutti") {
        $templateParams["corsi"] = $dbh->getCorsi();
    } else {
        $templateParams["corsi"] = $dbh->getCorsiPerNome($_GET["corsi"]);
    }
} else{
    $templateParams["corsi"] = $dbh->getCorsi();
}

require "templates/general/base.php";
?>