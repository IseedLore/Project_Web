<?php 
require_once '../bootstrap.php';

$templateParams["title"] = "StudyConnect - Admin";
$templateParams["page"] = "templates/specific/template-admin.php";

if(isset($_POST["admin-user"]) && isset($_POST["admin-pwd"])){
    $result = $dbh->checkAdmin($_POST["admin-user"], $_POST["admin-pwd"]);
    if(count($result)==0){
        $errore = "Errore! Username e password errati.";
    } else{
        $_SESSION["admin"] = $_POST["admin-user"];
    }
}

if(isAdminLoggedIn()){
    $msg = "Bentornato " . $_SESSION["admin"];

    /* Gestione richiesta modifica di un corso */
    if(isset($_GET["action"])){
        if(isset($_GET["course-id"])){
            $codice = $_GET["course-id"];
            // Eliminazione
            if($_GET["action"]=="Elimina"){
                $result1 = $dbh->deleteIscrizioniGruppoCorso($codice);
                $result2 = $dbh->deleteGruppiCorso($codice);
                $result3 = $dbh->deleteCorso($codice);
                if(!$result1 || !$result2 || !$result3){
                    $templateParams["msg-errore"] = "Si è verificato un errore nella cancellazione.";
                } else{
                    $templateParams["section-content"] = "template-corsi.php";
                }
            } 
        } 
        // Inserimento + Modifica
        if($_GET["action"]!="Elimina"){
            $templateParams["modifica"] = true;
            $templateParams["section-content"] = "gestione-corso.php";
            $action = $_GET["action"];
            if(isset($_GET["course-id"])){ // Solo modifica
                $corso = $dbh->getCorsoPerCodice($codice)[0];
                if(count($corso)==0){
                    $templateParams["msg-errore"] = "Il corso selezionato non esiste.";
                }
            }
        }
    } else{
        $templateParams["section-content"] = "template-corsi.php";
    }


    /* Gestione modifica effettiva di un corso */
    if(isset($_POST["action"])){
        $codice = $_POST["codice"];
        $nome = $_POST["nome"];
        $cfu = $_POST["cfu"];
        $descrizione = $_POST["desc"];
        if($_POST["prog"]=="Sì"){
            $progetto = 1;
        } else{
            $progetto = 0;
        }

        if($_POST["action"]=="Inserisci"){
            $corsiDisponibili = $dbh->getCorsi();
            $codiciCorsi = array();
            foreach($corsiDisponibili as $disponibile){
                array_push($codiciCorsi, $disponibile["Codice"]);
            }
            if(in_array($codice, $codiciCorsi)){
                $templateParams["msg-errore"] = "Codice corso già esistente!";
            } else{
                $result = $dbh->insertCorso($codice, $nome, $cfu, $descrizione, $progetto);

                /* Inserimento nuovi insegnamenti */
                $docenti = $dbh->getDocenti();
                foreach($docenti as $docente){
                    if(isset($_POST["docente_".$docente["Codice"]]) || 
                    (isset($_POST["docente_".$docente["Codice"]."_A"]) && isset($_POST["docente_".$docente["Codice"]."_B"]))){
                        $dbh->insertInsegnamento($docente["Codice"], '', $codice);
                    } else{
                        if(isset($_POST["docente_".$docente["Codice"]."_A"])){
                            $dbh->insertInsegnamento($docente["Codice"], 'A', $codice);
                        } 
                        if(isset($_POST["docente_".$docente["Codice"]."_B"])){
                            $dbh->insertInsegnamento($docente["Codice"], 'B', $codice);
                        }
                    }
                }
            }
        }

        if($_POST["action"]=="Modifica"){
            $vecchioCodice = $_POST["oldcodice"];

            /* Eliminazione vecchi insegnamenti */
            $vecchiInsegnamenti = $dbh->getInsegnamentiCorso($vecchioCodice);
            foreach($vecchiInsegnamenti as $daEliminare){
                $dbh->deleteInsegnamentiCorso($daEliminare["CodiceCorso"], $daEliminare["CodiceDocente"]);
            }
                
            if($vecchioCodice!=$codice){
                $result1 = $dbh-> updateCodiceCorso($codice, $vecchioCodice);
                $result2 = $dbh->updateGruppiCorso($codice, $vecchioCodice);
                
                if(!$result1 || !$result2){
                    $templateParams["msg-errore"] = "Si è verificato un errore nella modifica.";
                }
            } 
            $result = $dbh->updateCorso($codice, $nome, $cfu, $descrizione, $progetto);
            /* Inserimento nuovi insegnamenti */
            $docenti = $dbh->getDocenti();
            foreach($docenti as $docente){
                if(isset($_POST["docente_".$docente["Codice"]]) || 
                (isset($_POST["docente_".$docente["Codice"]."_A"]) && isset($_POST["docente_".$docente["Codice"]."_B"]))){
                    $dbh->insertInsegnamento($docente["Codice"], '', $codice);
                } else{
                    if(isset($_POST["docente_".$docente["Codice"]."_A"])){
                        $dbh->insertInsegnamento($docente["Codice"], 'A', $codice);
                    } 
                    if(isset($_POST["docente_".$docente["Codice"]."_B"])){
                        $dbh->insertInsegnamento($docente["Codice"], 'B', $codice);
                    }
                }
            }

            if(!$result){
                $templateParams["msg-errore"] = "Si è verificato un errore nella modifica.";
            }
        }
    }
}

$templateParams["corsi"] = $dbh->getCorsi();

if(isset($_GET["logout"]) && $_GET["logout"]=="true"){
    $_SESSION["admin"] = array();
    session_destroy();
    header("Location: index.php");
    exit();
}

require "templates/general/base.php";
?>