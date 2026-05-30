<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Corsi";
$templateParams["page"] = "templates/specific/template-corsi.php";

if(isset($_GET["search-course"])){
    $templateParams["corsi"] = $dbh->getCorsiPerNome($_GET["search-course"]);
} else{
    $templateParams["corsi"] = $dbh->getCorsi();
}

$templateParams["imgprofilo"] =  "default_profile_icon.png";

require "templates/general/base.php";
?>