<?php

if (isUserLoggedIn()) {
    $templateParams["page"] = "pages/home_loggato.php";
} else {   
    $templateParams["page"] = "pages/home_pubblica.php";
    $templateParams["gruppiStudio"] = $dbh->getGruppiPerTipo('studio',8);
    $templateParams["gruppiProgetto"] = $dbh->getGruppiPerTipo('progetto',8);
    $templateParams["gruppiCasuali"] = $dbh->getGruppiCasuali(8);
}

require "templates/base.php"
?>