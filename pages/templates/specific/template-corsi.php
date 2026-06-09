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
                            <?php $templateParams["docenti"] = $dbh->getDocentiPerCorso($corso["Codice"]); ?>
                            <?php foreach($templateParams["docenti"] as $docente):?>
                                <li>
                                    <?php if($docente["Classe"]!=''){
                                            echo $docente["Nome"] . ' ' . $docente["Cognome"] . " (classe " . $docente["Classe"] . ")";
                                    } else{
                                        echo $docente["Nome"] . ' ' . $docente["Cognome"];
                                    }?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php 
                    if(isset($templateParams["form-courses-type"])) : 
                        require ($templateParams["form-courses-type"]);
                    endif; ?>
                </li>
                <?php endforeach ?>
            </ul>