<form class="manage-course" action="admin.php" method="POST" enctype="multipart/form-data" class="manage-course">
    <h2>Informazioni corso</h2>
    <ul>
        <li>
            <label for="codice">Codice : </label>
            <?php if($action!="Inserisci"): ?>
                <input type="text" id="codice" name="codice" value="<?php echo $corso["Codice"];?>" required/>
            <?php else: ?>
                <input type="text" id="codice" name="codice" required/>
            <?php endif; ?>
        </li>
        <li>
            <label for="nome">Nome : </label>
            <?php if($action!="Inserisci"): ?>
                <input type="text" id="nome" name="nome" value="<?php echo $corso["Nome"];?>" required/>
            <?php else: ?>
                <input type="text" id="nome" name="nome" required/>
            <?php endif; ?>
        </li>
        <li>
            <label for="cfu">Crediti : </label>
            <?php if($action!="Inserisci"): ?>
                <input type="number" id="cfu" name="cfu" value="<?php echo $corso["CFU"];?>" min="3" max="12" required/>
            <?php else: ?>
                <input type="number" id="cfu" name="cfu" min="3" max="12"/>
            <?php endif; ?>
        </li>
        <li>
            <p>Richiede progetto : </br></p>
            <label for="prog-si">Sì</label>
            <?php if($action!="Inserisci" && $corso["ProgettoRichiesto"]==1): ?>
                <input type="radio" id="prog-si" name="prog" value="Sì" checked="checked" required/>
            <?php else: ?>
                <input type="radio" id="prog-si" name="prog" value="1" required/>
            <?php endif;?>
            </br>
            <label for="prog-no">No</label>
            <?php if($action!="Inserisci" && $corso["ProgettoRichiesto"]==0): ?>
                <input type="radio" id="prog-no" name="prog" value="0" checked="checked"/>
            <?php else: ?>
                <input type="radio" id="prog-no" name="prog" value="0"/>
            <?php endif;?>
        </li>
        <li>
            <label for="desc">Descrizione : </br></label>
            <?php if($action!="Inserisci"): ?>
                <textarea id="desc" name="desc"><?php echo $corso["Descrizione"];?></textarea>
            <?php else: ?>
                <textarea id="desc" name="desc"></textarea>
            <?php endif; ?>
        </li>
        <li>
            <p>Docenti : </p>
            <?php if($action!="Inserisci"):
                $docentiPresenti = $dbh->getDocentiPerCorso($corso["Codice"]);
                $codiciPresenti = array();
                foreach($docentiPresenti as $presente):
                    array_push($codiciPresenti, $presente["Codice"]);
                endforeach;
            endif;
            $docenti = $dbh->getDocenti();
            foreach($docenti as $docente):?>
                <input type="checkbox" id="docente_<?php echo $docente["Codice"]; ?>" name="docente_<?php echo $docente["Codice"]; ?>" <?php 
                        if($action!="Inserisci"){
                            if(in_array($docente["Codice"], $codiciPresenti)){ 
                                foreach($docentiPresenti as $presente){
                                    if($presente["Classe"]==""){
                                        echo ' checked="checked" '; 
                                    }
                                } 
                            }
                        }?> value="<?php echo $docente["Codice"]; ?>" />
                <label for="docente_<?php echo $docente["Codice"]; ?>"><?php echo $docente["Nome"] . ' ' . $docente["Cognome"];?></label>
                </br>
                <input type="checkbox" id="docente_<?php echo $docente["Codice"]; ?>_A" name="docente_<?php echo $docente["Codice"]; ?>_A" <?php 
                        if($action!="Inserisci"){
                            if(in_array($docente["Codice"], $codiciPresenti)){
                                foreach($docentiPresenti as $presente){
                                    if($presente["Classe"]=="A"){
                                        echo ' checked="checked" '; 
                                    }
                                } 
                            }
                        }?> value="<?php echo $docente["Codice"]; ?>_A"/>
                <label for="docente_<?php echo $docente["Codice"]; ?>_A"><?php echo $docente["Nome"] . ' ' . $docente["Cognome"] . " (classe A)";?></label>
                </br>
                <input type="checkbox" id="docente_<?php echo $docente["Codice"]; ?>_B" name="docente_<?php echo $docente["Codice"]; ?>_B" <?php 
                        if($action!="Inserisci"){
                            if(in_array($docente["Codice"], $codiciPresenti)){
                                foreach($docentiPresenti as $presente){
                                    if($presente["Classe"]=="B"){
                                        echo ' checked="checked" '; 
                                    }
                                } 
                            }
                        }?> value="<?php echo $docente["Codice"]; ?>_B"/>
                <label for="docente_<?php echo $docente["Codice"]; ?>_B"><?php echo $docente["Nome"] . ' ' . $docente["Cognome"] . " (classe B)";?></label>
                </br>
            <?php endforeach; ?>
        </li>
        <li>
            <input type="submit" name="submit" value="<?php echo $action; ?> corso" />
            <a href="admin.php">Annulla</a>
        </li>
    </ul>
    <?php if($action!="Inserisci"): ?>
        <input type="hidden" name="oldcodice" value="<?php echo $corso["Codice"];?>"/>
    <?php endif; ?>

    <input type="hidden" name="action" value="<?php echo $action; ?>"/>
</form>