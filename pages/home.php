<?php

if (isUserLoggedIn()) {
    $templateParams["page"] = "templates/specific/home_loggato.php";
} else {   
    $templateParams["page"] = "templates/specific/home_pubblica.php";
    $templateParams["gruppiStudio"] = $dbh->getGruppiPerTipo('studio',8);
    $templateParams["gruppiProgetto"] = $dbh->getGruppiPerTipo('progetto',8);
    $templateParams["gruppiCasuali"] = $dbh->getGruppiCasuali(8);
}

require "templates/general/base.php"
?>