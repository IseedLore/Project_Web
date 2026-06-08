<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "Gruppi Studenti - Gruppi";
$templateParams["page"] = "templates/specific/template-gruppi.php";
$templateParams["corsi"] = $dbh->getCorsi();

if (isset($_GET["visualizza"]) && isset($_GET["corsi"])) {
    if ($_GET["visualizza"] == "miei"){
        if(isset($_GET["tipo"])){
           $templateParams["gruppi"] = $dbh->getGruppiPerStudenteLoggatoPerTipo($_SESSION["matricola"], "Progetto");
        } else{
            $templateParams["gruppi"] = $dbh->getGruppiPerStudenteLoggato($_SESSION["matricola"]);
        }
    } else if ($_GET["visualizza"] == "tutti") {
        if(isset($_GET["tipo"])){
            $templateParams["gruppi"] = $dbh->getGruppiPerTipo("Progetto");
        } else{
            $templateParams["gruppi"] = $dbh->getGruppi();
        }
    }
} elseif(isset($_GET["search-group"]) || (isset($_GET["filter-group-type"]) || isset($_GET["filter-course"]))){
    if(isset($_GET["search-group"])){
        $templateParams["gruppi"] = $dbh->getGruppiPerNome($_GET["search-group"]);
    } else{
        /* Filtro solo sul corso (proveniente da altra pag) */
        if(isset($_GET["filter-course"])){
            $templateParams["gruppi"] = $dbh->getGruppiPerCorso($_GET["filter-course"]);
        }
        /* Filtro solo sul gruppo (proveneniente da altra pag) */
        if(isset($_GET["filter-group-type"])){
            $templateParams["gruppi"] = $dbh->getGruppiPerTipo($_GET["filter-group-type"]);
        } 

        /* Se lo studente è loggato e vuole vedere solo i suoi gruppi... */
        if(isset($_GET["filter-logged"]) && $_GET["filter-logged"]=="I miei gruppi"){
            if( $_GET["filter-group-type"]=="Tutti" && $_GET["filter-course"]=="Tutti"){
                $templateParams["gruppi"] = $dbh->getGruppiPerStudenteLoggato($_SESSION["matricola"]);
            } else{
                if($_GET["filter-group-type"]!="Tutti" && $_GET["filter-course"]!="Tutti"){
                    $templateParams["gruppi"] = $dbh->getGruppiPerStudenteLoggatoPerCorsoPerTipo($_SESSION["matricola"], $_GET["filter-course"], $_GET["filter-group-type"]);
                } else{
                    if($_GET["filter-group-type"]!="Tutti"){
                        $templateParams["gruppi"] = $dbh->getGruppiPerStudenteLoggatoPerTipo($_SESSION["matricola"], $_GET["filter-group-type"]);
                    } 
                    if($_GET["filter-course"]!="Tutti"){
                        $templateParams["gruppi"] = $dbh->getGruppiPerStudenteLoggatoPerCorso($_SESSION["matricola"], $_GET["filter-course"]);
                    }
                }
            }
        } else{
            /* Se lo studente non è loggato oppure se vuole vedere tutti i gruppi (non solo quelli a cui è iscritto)... */
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
    }
} else{
    $templateParams["gruppi"] = $dbh->getGruppi();
}

$templateParams["imgprofilo"] =  "default_profile_icon.png";

require "templates/general/base.php";
?>