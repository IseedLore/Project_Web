<?php
require_once '../bootstrap.php';

$templateParams["title"] = "StudyConnect - Login";
$templateParams["page"] = "templates/specific/template-login.php";
$templateParams["erroreLogin"] = "";
$templateParams["erroreRegistrazione"] = "";
$errore = true;

if(isset($_POST["email"]) && isset($_POST["password"])) {
    if(!isset($_POST["matricola"])) { //Controllo Login
        $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
        if(count($login_result) == 0) {
            $templateParams["erroreLogin"] = "Errore! Controllare email o password!";
        } else {
            registerLoggedUser($login_result[0]);
            $errore = false;
            require "home.php";
        }
    } else { //Controllo Registrazione
        if(isset($_POST["password"]) && isset($_POST["cognome"])) {
            // if(count($dbh->checkRegistrazion($_POST["matricola"], $_POST["email"])) == 0) {
            if(true) {
                $dbh->RegistrazioneUtente($_POST["matricola"], $_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["password"]);
                registerLoggedUser($dbh->checkLogin($_POST["email"], $_POST["password"])[0]); 
                $errore = false;
                require "home.php";
            } else {
                $templateParams["erroreRegistrazione"] = "Errore! Matricola inseriti non adatti!";
            }
        }
    }

} 

if($errore) {
    require "templates/general/base.php";
}

?>