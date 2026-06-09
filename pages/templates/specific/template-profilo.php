<main class="profile-container">
    <div class="profile-top-row">
        <section class="user-data-card">
            <div>
                <img src="<?php echo UPLOAD_DIR.$templateParams["imgprofilo"]; ?>" alt="Immagine Profilo">
            </div>
            <div class="user-data-box">                  
                <h2><?=$templateParams["nome"]?> <?=$templateParams["cognome"]?></h2>
                <p><?=$templateParams["email"]?></p>
                               
                <form action="modifica-immagine.php"  class="box-modifca-img" method="POST" enctype="multipart/form-data">
                    <label for="imgUtente" tabindex="0">Modifica Immagine</label>
                    <input type="file" name="imgUtente" id="imgUtente" />
                </form>
            </div>
        </section>
        <section class="user-preferences-card">
            <h3>Preferenze</h3>
            <ul class="preferences-list">
                <?php foreach($templateParams["preferenzeStudente"] as $preferenze):?>                        
                <li><?=$preferenze["Nome"]?></li>
                <?php endforeach ?>
            </ul>
            <button type="button" id="btn-show-pref-list" class="btn-see-all">Vedi tutti</button>
            
            <div id="preferences-overlay-panel" class="preferences-overlay-panel">
                <div class="panel-header">
                    <h4>Preferenze</h4>
                    <button type="button" id="btn-hide-pref-list" class="btn-close-panel">x</button>
                </div>
                <form action="update_preferences.php" method="POST">
                    <div class="panel-scroll-content">
                        <?php foreach($templateParams["tuttePreferenze"] as $preference): ?>
                        <div class="pref-check-row">
                            <label for="<?= $preference["Codice"]?>"><?= $preference["Nome"]?> </label>
                            <input type="checkbox" id="<?=$preference["Codice"]?>" name="pref_<?=$preference["Codice"];?>" value="<?=$preference["Nome"]?>"
                            <?php $prfStudente = array_column($templateParams["tuttePreferenzeStudente"], "Nome");
                            if(in_array($preference["Nome"], $prfStudente)) {
                                echo 'checked="checked"'; 
                            }?> />
                        </div>
                        <?php endforeach ?>
                    </div>
                    <button type="submit" class="btn-save-overlay">Salva</button>
                </form>
            </div>
        </section>

    </div>

    <div class="profile-bottom-row">        
        <section class="groups-box">
            <h3>I miei gruppi</h3>
            <ul class="groups-item-list">
                <?php foreach($templateParams["gruppiDelloStudente"] as $gruppo): ?>
                    <li><?= $gruppo["Nome"]?></li>
                <?php endforeach ?>
            </ul>
            <a href="gruppi.php?visualizza=miei" class="btn-see-all">vedi tutti</a>
        </section>

        <section class="groups-box">
            <h3>Gruppi di cui fai parte</h3>
            <ul class="groups-item-list">
                <?php foreach($templateParams["gruppiDiAppartenenza"] as $gruppo): ?>
                    <li><?= $gruppo["Nome"]?> <?= $gruppo["Tipo"]?></li>
                <?php endforeach ?>
            </ul>
            <a href="gruppi.php?visualizza=appartenenza" class="btn-see-all">vedi tutti</a>
        </section>

    </div>
</main>