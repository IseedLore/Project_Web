    <main class="groups-main">
        <div class="top-bar">
            <form action="gruppi.php" method="GET" class="search-bar-form">
                <span class="material-symbols-outlined">search</span>
                <?php if(isset($_GET["search-group"])):?>
                    <input type="text" id="search-group" name="search-group" placeholder=<?php echo $_GET["search-group"];?> />
                <?php else:?>
                    <input type="text" id="search-group" name="search-group" placeholder="Cerca gruppo..." />
                <?php endif;?>  
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
                        if($gruppo["NumeroMembriRichiesti"]!=0):
                            if($gruppo["NumeroMembriAttuali"]==$gruppo["NumeroMembriRichiesti"]):
                                ?> <p>Gruppo pieno (non ci sono posti liberi)</p>
                            <?php
                            else : ?>
                                <p>Numero membri richiesti : <?php echo $gruppo["NumeroMembriRichiesti"];?></p>
                                <p>Numero membri attuali : <?php echo $gruppo["NumeroMembriAttuali"];?></p>
                            <?php endif; ?>
                    <?php endif; ?>
                    <form action="visualizzazione-gruppo.php" method="GET">
                        <input type="hidden" name="single-group" id="single-group" value="<?php echo $gruppo["Codice"];?>" />
                        <input type="submit" value="Dettagli" />
                    </form>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <aside class="groups-aside" id="groups-aside">
            <?php require('filtri-gruppi.php'); ?>  
        </aside>
    </main>