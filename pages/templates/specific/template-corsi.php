    <main class="courses-main">
        <form action="#" method="POST" class="search-bar-form">
            <span class="material-symbols-outlined">search</span>
            <input type="text" placeholder="Cerca corso..." >
            <button type="submit">Avvia ricerca</button>
        </form>
        <section class="courses-container">
            <ul class="courses-list">
                <?php foreach($templateParams["corsi"] as $corso):?>
                <li class="course">
                    <h2><?php echo $corso["Nome"]; ?></h2>
                    <p>Codice : <?php echo $corso["Codice"]; ?></p>
                    <p>Crediti : <?php echo $corso["CFU"]; ?></p>
                    <p>Richiede progetto : 
                        <?php 
                        if($corso["ProgettoRichiesto"]==0): 
                            echo 'No';
                        else :
                            echo "Sì";
                        endif 
                        ?>
                    </p>
                    <p>Descrizione : <?php echo $corso["Descrizione"]; ?></p>
                    <div class="teachers-list">
                        Docenti :
                        <ul>
                            <?php $templateParams["docenti"] = $dbh->getDocenti($corso["Codice"]); ?>
                            <?php foreach($templateParams["docenti"] as $docente):?>
                                <li><?php echo $docente["Nome"] . ' ' . $docente["Cognome"]; ?>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div>
                        <a href="">Vai ai gruppi</a>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
        </section>
    </main>