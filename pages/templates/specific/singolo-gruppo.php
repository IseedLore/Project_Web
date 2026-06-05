    <main class="single-group-main">
        <section class="single-group-info">
            <?php $gruppo = $templateParams["gruppo-singolo"];?>
            <h2><?php echo $gruppo["NomeGruppo"];?></h2>
            <p>Codice : <?php echo $gruppo["CodiceGruppo"];?></p>
            <p>Tipo gruppo : <?php echo $gruppo["Tipo"];?></p>
            <p>Corso : <?php echo $gruppo["NomeCorso"];?></p>
            <div class="teachers-list">
                Docenti :
                    <ul>
                        <?php $templateParams["docenti"] = $dbh->getDocenti($gruppo["CodiceCorso"]); ?>
                        <?php foreach($templateParams["docenti"] as $docente):?>
                        <li><?php echo $docente["Nome"] . ' ' . $docente["Cognome"]; ?>
                        <?php endforeach ?>
                    </ul>
            </div>
            <div class="single-group-description">
                <p>Descrizione :</p>
                <p><?php echo $gruppo["Descrizione"];?></p>
            </div>
        </section>
        <section class="single-group-next-meetings">
           <h3>Prossimi incontri</h3>
           <table>
                <tr>
                    <th id="data">Data</th>
                    <th id="orario">Orario</th>
                    <th id="mod">Modalità</th>
                    <th id="luogo">Luogo</th>
                    <th id="note">Note</th>
                </tr>
                <?php 
                $incontri = $dbh->getIncontriGruppo($gruppo["CodiceGruppo"]);
                foreach($incontri as $incontro):?>
                    <tr>
                        <td headers="data"><?php echo $incontro["Data"];?></td>
                        <td headers="orario"><?php echo $incontro["Orario"];?></td>
                        <td headers="mod"><?php echo $incontro["Modalità"];?></td>
                        <td headers="luogo"><?php echo $incontro["Luogo"];?></td>
                        <td headers="note"><?php echo $incontro["Note"];?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <!-- Inserire controllo sull'utente attuale : il bottone viene mostrato 
             solo se l'utente è loggato e se è il creatore del gruppo -->
            <button>Modifica incontri</button>
        </section>
        <aside class="single-group-members">
            <h3>Membri</h3>
            <?php if($gruppo["NumeroMembriRichiesti"]!=0):?>
                <p>Numero membri richiesti : <?php echo $gruppo["NumeroMembriRichiesti"];?></p>
            <?php endif; ?>
            <p>Numero membri attuali : <?php echo $gruppo["NumeroMembriAttuali"];?></p>
            <table>
                <tr>
                    <th id="nome">Nome</th>
                    <th id="cognome">Cognome</th>
                    <th id="email">Email</th>
                </tr>
                <?php $studentiIscritti = $dbh->getStudentiIscrittiGruppo($gruppo["CodiceGruppo"]);?>
                <?php foreach($studentiIscritti as $studente):?>
                    <tr>
                        <td headers="nome"><?php echo $studente["Nome"];?></td>
                        <td headers="cognome"><?php echo $studente["Cognome"];?></td>
                        <td headers="email"><?php echo $studente["Email"];?></td>
                    </tr>
                <?php endforeach; ?>
            </table> 
            <?php if($gruppo["NumeroMembriRichiesti"]==0 || ($gruppo["NumeroMembriRichiesti"]!=0 && $gruppo["NumeroMembriAttuali"]<$gruppo["NumeroMembriRichiesti"])):?>
                <form action="visualizzazione-gruppo.php" method="POST">
                        <input type="hidden" name="new-enrollment-group-id" id="new-rollment-group-id" value="<?php echo $gruppo["CodiceGruppo"];?>">
                        <input type="hidden" name="new-enrollment-student-id" id="new-rollment-student-id" value="0001081674">
                        <input type="submit" value="Iscriviti al gruppo">
                </form>
            <?php endif;?>
        </aside>
    </main> 