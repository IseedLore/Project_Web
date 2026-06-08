<header>
    <div class="logo">
       <h1>StudyConnect</h1>
    </div>
    <nav class="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="corsi.php">Corsi</a></li>
            <li><a href="gruppi.php">Gruppi</a></li>
            <li><a href="#">Crea</a></li>
            <?php if (isUserLoggedIn()): ?>
                <li class="dropdown top-right">
                    <img src="<?php echo UPLOAD_DIR.$templateParams["imgprofilo"]; ?>" alt="Profile image" class="nav-profile-img ">
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