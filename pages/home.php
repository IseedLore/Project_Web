
<?php
$templateParams["title"] = "StudyConnect - Home";

if (isUserLoggedIn()) {
    $templateParams["page"] = "templates/specific/home-loggato.php";
    $templateParams["prossimiIncontri"] = $dbh->getIncontriStudente($_SESSION["matricola"]);    
    $templateParams["gruppiSuggeriti"] = $dbh->getGruppiSuggeriti($_SESSION["matricola"], 10);
    $templateParams["corsi"] = $dbh->getCorsi();
} else {   
    $templateParams["page"] = "templates/specific/home-pubblica.php";
    $templateParams["gruppiStudio"] = $dbh->getGruppiPerTipoLimit('studio',8);
    $templateParams["gruppiProgetto"] = $dbh->getGruppiPerTipoLimit('progetto',8);
    $templateParams["gruppiCasuali"] = $dbh->getGruppiCasuali(8);
}
    

$templateParams["imgprofilo"] =  "default_profile_icon.png";

require "templates/general/base.php"
?>