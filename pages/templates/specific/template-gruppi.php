    <main class="groups-main">
        <div class="top-bar">
            <form action="gruppi.php" method="GET" class="search-bar-form">
                <span class="material-symbols-outlined">search</span>
                <input type="text" id="search-group" name="search-group" placeholder="Cerca gruppo...">
                <button type="submit">Avvia ricerca</button>
            </form>
            <a class="filters-button-mobile" id="filters-button">Filtri</a>
        </div>
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
        <aside class="groups-aside" id="groups-aside">
            <?php require('filtri-gruppi.php'); ?>  
        </aside>
    </main>