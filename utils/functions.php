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

    function getAction($action){
    $result = "";
    switch($action){
        case 1:
            $result = "Inserisci";
            break;
        case 2:
            $result = "Modifica";
            break;
        case 3:
            $result = "Elimina";
            break;
    }

    return $result;
}
?>