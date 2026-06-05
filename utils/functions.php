<?php
    function isUserLoggedIn() {
        return isset($_SESSION['matricola']);
    }

    function registerLoggedUser(array $user){
        $_SESSION["matricola"] = $user["Matricola"];
        $_SESSION["nome"] = $user["Nome"];
        $_SESSION["cognome"] = $user["Cognome"];
        $_SESSION["email"] = $user["Email"];
    }
?>