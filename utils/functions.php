<?php
    function isUserLoggedIn() {
        return isset($_SESSION['matricola']);
    }
?>