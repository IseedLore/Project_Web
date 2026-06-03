<main class="groups-main">
        <form action="gruppi.php" method="GET" class="search-bar-form">
            <span class="material-symbols-outlined">search</span>
            <input type="text" id="search-group" name="search-group" placeholder="Cerca gruppo...">
            <button type="submit">Avvia ricerca</button>
        </form>
        <section class="groups-container">
            <ul class="groups-list">
                <?php foreach($templateParams["gruppi"] as $gruppo):?>
                <li class="group">
                    <h2><?php echo $gruppo["Nome"]; ?></h2>
                    <p>Codice : <?php echo $gruppo["Codice"];?></p>
                    <p>
                    <?php 
                        if($gruppo["Tipo"]=="Studio"):
                            echo "Gruppo studio";
                        else : 
                            echo "Gruppo progetto";
                        endif
                    ?>
                    </p>
                    <p>Corso : <?php echo $gruppo["NomeCorso"]?></p> 
                    <?php 
                        if($gruppo["NumeroMembri"]!=0):
                            if($gruppo["NumeroMembriAttuale"]==$gruppo["NumeroMembri"]):
                                ?> <p>Gruppo pieno (non ci sono posti liberi)</p>
                            <?php
                            else : ?>
                                <p>Numero membri richiesti : <?php echo $gruppo["NumeroMembri"];?></p>
                                <p>Numero membri attuali : <?php echo $gruppo["NumeroMembriAttuale"];?></p>
                            <?php endif; ?>
                    <?php endif; ?>
                    <a href="">Dettagli</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <aside class="groups-aside">
            <form action="gruppi.php" method="GET" id="groups-form">
                <h2>Filtri</h2>
                <?php if (isUserLoggedIn()):?>
                    <div>
                        <label for="filter-logged">Gruppi : </label>
                        <select name="filter-logged" id="filter-logged">
                            <option>I miei gruppi</option>
                            <option>Tutti i gruppi</option>
                        </select>
                    </div>
                <?php endif ?>
                <div>
                    <label for="filter-group-type">Tipo gruppo :</label>
                    <select name="filter-group-type" id="filter-group-type">
                        <option value="Tutti">Tutti</option>
                        <option value="Progetto">Progetto</option>
                        <option value="Studio">Studio</option>
                    </select>
                </div>
                <div>
                    <label for="filter-course">Corso :</label>
                    <select name="filter-course" id="filter-course">
                        <option value="Tutti">Tutti</option>
                        <?php foreach($templateParams["corsi"] as $corso): ?>
                            <option value="<?php echo $corso["Nome"]; ?>"><?php echo $corso["Nome"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit">Filtra</a>
            </form>
        </aside>
    </main>