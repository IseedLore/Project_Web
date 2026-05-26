<?php
require_once '../bootstrap.php';

if (isUserLoggedIn()) {
    $templateParams["page"] = "home_loggato.php";
} else {   
    $templateParams["page"] = "home_pubblica.php";
    $templateParams["gruppiStudio"] = $dbh->getGruppiPerTipo('studio',8);
    $templateParams["gruppiProgetto"] = $dbh->getGruppiPerTipo('progetto',8);
    $templateParams["gruppiCasuali"] = $dbh->getGruppiCasuali(8);
}

require "templates/base.php"
?>