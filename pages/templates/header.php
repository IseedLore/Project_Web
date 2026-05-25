<header>
    <div class="logo">
        <a href="index.php"><h1>StudyConnect</h1></a>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Corsi</a></li>
            <li><a href="#">Gruppi</a></li>
            <li><a href="#">Crea Gruppo</a></li>
            <?php if (isUserLoggedIn()): ?>
                <li class="dropdown">
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