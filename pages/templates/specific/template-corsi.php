    <main class="courses-main">
        <form action="corsi.php" method="GET" class="search-bar-form">
            <span class="material-symbols-outlined">search</span>
            <?php if(isset($_GET["search-course"])):?>
                <input type="text" id="search-course" name="search-course" placeholder=<?php echo $_GET["search-course"];?>>
            <?php else:?>
                <input type="text" id="search-course" name="search-course" placeholder="Cerca corso..." >
            <?php endif;?>  
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
                    <form action="gruppi.php" method="GET">
                        <input type="hidden" name="filter-course" id="filter-course" value="<?php echo $corso["Nome"];?>">
                        <input type="hidden" name="filter-group-type" id="filter-group-type" value="Tutti"/>
                        <input type="submit" value="Vai ai gruppi">
                    </form>
                </li>
                <?php endforeach ?>
            </ul>
        </section>
    </main>