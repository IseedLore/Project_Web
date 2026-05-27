<header>
    <div class="logo">
       <h1>StudyConnect</h1>
    </div>
    <nav class="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="corsi.php">Corsi</a></li>
            <li><a href="#">Gruppi</a></li>
            <?php if (!isUserLoggedIn()): ?>
                <li><a href="#">Crea Gruppo</a></li>
                <li class="dropdown nav-button-img">
                    <img src="#" alt="Profile image" class="profile-img">
                    <div class="dropdown-content">
                        <a href="#">Profilo</a>
                        <a href="#">Logout</a>
                    </div>
                </li>
            <?php else: ?>
                <li><a href="#" class="btn-login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>