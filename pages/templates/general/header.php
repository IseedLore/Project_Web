<?php
if(isUserLoggedIn()){
    $img = $dbh->getStudente($_SESSION["matricola"])[0]["Immagine"];
    if($img == "" || $img == null) {
        $img = "default_profile_icon.png";
    }
} else {
    $img = "default_profile_icon.png";
}
$templateParams["imgprofilo"] = $img;
?>
<header>
    <div class="logo">
       <h1>StudyConnect</h1>
    </div>
    <nav class="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="corsi.php">Corsi</a></li>
            <li><a href="gruppi.php">Gruppi</a></li>
            <li><a href="creazione-gruppo.php">Crea</a></li>
            <?php if (isUserLoggedIn()): ?>
                <li class="dropdown top-right">
                    <button type="button" class="btn-box-header-img">
                        <img src="<?php echo UPLOAD_DIR.$templateParams["imgprofilo"]; ?>" alt="Immagine Profilo" class="nav-profile-img ">
                    </button>
                    <div class="dropdown-content">
                        <a href="profilo.php">Profilo</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </li>
            <?php else: ?>
                <li class="top-right"><a href="login.php" class="btn-login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>