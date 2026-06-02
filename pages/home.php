<?php

if (!isUserLoggedIn()) {
    $templateParams["page"] = "templates/specific/home_loggato.php";
    $templateParams["imgprofilo"] =  "default_profile_icon.png";
    $templateParams["prossimiIncontri"] = $dbh->getIncontriStudente("0001081674");
    $templateParams["gruppiSuggeriti"] = $dbh->getGruppiSuggeriti("0001081674", 10);
    $templateParams["corsi"] = $dbh->getCorsi();
} else {   
    $templateParams["page"] = "templates/specific/home_pubblica.php";
    $templateParams["gruppiStudio"] = $dbh->getGruppiPerTipo('studio',8);
    $templateParams["gruppiProgetto"] = $dbh->getGruppiPerTipo('progetto',8);
    $templateParams["gruppiCasuali"] = $dbh->getGruppiCasuali(8);
    $templateParams["imgprofilo"] =  "default_profile_icon.png";
}

require "templates/general/base.php"
?>