<?php

if (isUserLoggedIn()) {
    $TemplateParams["page"] = "pages/home_loggato.php";
} else {   
    $templateParams["page"] = "pages/home_pubblica.php";
    $templateParams["gruppiStudio"] = $dbh->getGruppiPerTipo('studio',8);
    $templateParams["gruppiProgetto"] = $dbh->getGruppiPerTipo('progetto',8);
    $templateParams["gruppiCasuali"] = $dbh->getGruppiCasuali(8);
}

require "pages/templates/base.php"
?>