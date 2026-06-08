<?php 
require_once '../bootstrap.php';

if(!isUserLoggedIn()){
    header("Location: login.php");  
}

if (isset($_FILES["imgUtente"]) && strlen($_FILES["imgUtente"]["name"])>0){
    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgUtente"]);

    if($result != 0) {
        $img = $msg;

        $dbh->updateImg($_SESSION["matricola"], $img);

        header("location: profilo.php");
        exit();
    }
    $msg = "Errore nel caricamento";
    header("location: profilo.php?formmsg=".$msg);
    exit();
} else {
    $msg = "Nessun file selezionato o si è verificato un errore nell'invio.";
    header("location: profilo.php?formmsg=".$msg);
    exit();
}
        
?>