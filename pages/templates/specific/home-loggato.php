<main class="home-logged-container home-container ">
    <aside class="sidebar-search">
        <form action="gruppi.php" method="GET" id="home-form">
            <fieldset class="home-box-form card">
                <legend>Ricerca Rapida</legend>
                <div class="form-controll">
                    <label for="visualizza">Visualizza</label>
                    <select name="visualizza" id="visualizza">
                    <option value="miei">I Miei gruppi</option>
                    <option value="tutti">Tutti i gruppi</option>
                    <option value="corsi">Corsi</option>
                    </select>
                </div>
                <div class="form-controll" id="container-corsi">
                    <label for="corsi">Corsi</label>
                    <select name="corsi" id="corsi">
                    <option value="tutti">Tutti</option>
                    <?php foreach($templateParams["corsi"] as $corso):?>                        
                        <option value="<?=  $corso["Nome"]; ?>"><?=  $corso["Nome"]; ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
                <div class="form-controll checkbox" id="container-checkbox">
                    <label for="tipo">Progetto?</label>
                    <input type="checkbox" name="tipo" id="tipo" />                    
                </div>
                <button type="submit">Vai</button>
            </fieldset>
        </form>    
    </aside>
    <section class="main-meetings">
        <h2>I tuoi prossimi incontri</h2>
        <div class="card-grid">
            <?php if(!count($templateParams["prossimiIncontri"]) == 0) {
                foreach ($templateParams["prossimiIncontri"] as $incontro):  ?>            
                <div class="card">
                   <p><?= $incontro["NomeGruppo"];?></p>
                   <p><?= $incontro["Luogo"];?></p>
                   <p><?= $incontro["Data"]; $incontro["Orario"];?></p>     
                   <p><?= $incontro["Modalità"];?></p>                   
                </div>
            <?php endforeach; } else {
                echo "Non hai prossimi incontri";
           } ?>
        </div>
    </section>
    <aside class="sidebar-destra-home-loggato">
        <div class="sidebar-suggeriti">
            <h2>Suggeriti per te</h2>
            <div class="vertical-list">
            <?php if(!count($templateParams["gruppiSuggeriti"]) == 0) { ?>
                <?php foreach ($templateParams["gruppiSuggeriti"] as $suggerito): ?>
                <div class="card">
                    <p><?= $suggerito["Nome"] ?> --- <?= $suggerito["Tipo"] ?></p>
                    <p><?= $suggerito["NomeCorso"] ?></p>
                </div>                    
                <?php endforeach; ?>
            <?php } else { ?>
                <div class="card">
                    <p>Non ci sono nuovi gruppi che combaciano con le tue preferenze</p>
                </div>
            <?php } ?>
            </div>
        </div>
        <?php if(!count($templateParams["scadenzeProgetti"]) == 0) { ?>
        <div>
            <h2>Scadenze Progetti</h2>
            <div class="vertical-list">
                <div class="card">
                    <?php foreach ($templateParams["scadenzeProgetti"] as $progetto): ?>
                        <P>
                            <?php 
                            echo $progetto["Nome"];
                            if($progetto["Data"] != "0000-00-00" && $progetto["Data"] != "" ){ 
                                echo " --- ".$progetto["Data"];
                            }
                            ?>
                        </P>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </aside>
    <?php }?>
</main>