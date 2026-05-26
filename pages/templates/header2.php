<header class="p-3">
    <nav class="navbar navbar-expand-lg">
        <h1 class="navbar-nav me-auto fs-1">Corsi</h1>
        <ul class="navbar-nav ms-auto fs-5">
            <li class="nav-item border-end border-black"><a class="nav-link active" href="">Home</a></li>
            <li class="nav-item border-end border-black" ><a class="nav-link active" href="">Gruppi</a></li>
            <li class="nav-item border-end border-black"><a class="nav-link active" href="">Corsi</a></li>  
            <?php if (isUserLoggedIn()): ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Icona utente</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profilo</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link active" href="#" >Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>