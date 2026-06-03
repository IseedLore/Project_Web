<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Gruppi";
$templateParams["page"] = "templates/specific/template-gruppi.php";
$templateParams["corsi"] = $dbh->getCorsi();

if(isset($_GET["search-group"]) || (isset($_GET["filter-group-type"]) && isset($_GET["filter-course"]))){
    if(isset($_GET["search-group"])){
        $templateParams["gruppi"] = $dbh->getGruppiPerNome($_GET["search-group"]);
    } else{
        if($_GET["filter-group-type"]=="Tutti" || $_GET["filter-course"]=="Tutti"){
            if($_GET["filter-group-type"]=="Tutti" && $_GET["filter-course"]=="Tutti"){
                $templateParams["gruppi"] = $dbh->getGruppi();
            } else{
                if($_GET["filter-group-type"]=="Tutti"){
                    $templateParams["gruppi"] = $dbh->getGruppiPerCorso($_GET["filter-course"]);
                } else{
                    $templateParams["gruppi"] = $dbh->getGruppiPerTipo($_GET["filter-group-type"]);
                }
            }
        } else{
            $templateParams["gruppi"] = $dbh->getGruppiPerTipoPerCorso($_GET["filter-group-type"], $_GET["filter-course"]);
        }
    }
} else{
    $templateParams["gruppi"] = $dbh->getGruppi();
}

$templateParams["imgprofilo"] =  "default_profile_icon.png";

require "templates/general/base.php";
?>