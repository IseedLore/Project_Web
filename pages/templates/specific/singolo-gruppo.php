    <main class="single-group-main">
        <section class="single-group-info">
            <?php $gruppo = $templateParams["gruppo-singolo"];?>
            <h2><?php echo $gruppo["NomeGruppo"];?></h2>
            <p>Codice : <?php echo $gruppo["CodiceGruppo"];?></p>
            <p>Tipo gruppo : <?php echo $gruppo["Tipo"];?></p>
            <p>Corso : <?php echo $gruppo["NomeCorso"];?></p>
            <?php if($gruppo["DataConsegnaProgetto"]!='0000-00-00'):?>
                <p>Scadenza progetto : <?php echo $gruppo["DataConsegnaProgetto"]; ?></p>
            <?php endif; ?>
            <div class="teachers-list">
                Docenti :
                    <ul>
                        <?php $templateParams["docenti"] = $dbh->getDocentiPerCorso($gruppo["CodiceCorso"]); ?>
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
           <?php $incontri = $dbh->getIncontriGruppo($gruppo["CodiceGruppo"]);
           if($incontri==NULL):?>
                <p>Attualmente non sono programmati incontri.</p>
            <?php else : ?>
                <table>
                    <tr>
                        <th id="data">Data</th>
                        <th id="orario">Orario</th>
                        <th id="mod">Modalità</th>
                        <th id="luogo">Luogo</th>
                        <th id="note">Note</th>
                    </tr>
                    <?php foreach($incontri as $incontro):?>
                        <tr>
                            <td headers="data"><?php echo $incontro["Data"];?></td>
                            <td headers="orario"><?php echo $incontro["Orario"];?></td>
                            <td headers="mod"><?php echo $incontro["Modalità"];?></td>
                            <td headers="luogo"><?php echo $incontro["Luogo"];?></td>
                            <td headers="note"><?php echo $incontro["Note"];?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif;?>
            <?php if(isUserLoggedIn() && $_SESSION['matricola']==$templateParams["creatore-gruppo"]["MatricolaCreatore"]):?>
                <a class="modify-meetings-button" href="visualizzazione-gruppo.php?open-modify-meetings=true&single-group=<?php echo $gruppo["CodiceGruppo"];?>">Modifica incontri</a>
            <?php endif; ?>
        </section>
        <?php if(isset($_GET["open-modify-meetings"]) && $_GET["open-modify-meetings"]=="true"): ?>
            <div class="modify-meetings" id="modify-meetings">
                <?php require($templateParams["section-modify-meetings"]);?>
            </div>
        <?php endif;?>
        <aside>
            <section class="single-group-members">
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
                    <form action="visualizzazione-gruppo.php" method="GET">
                            <input type="hidden" name="single-group" id="single-group" value="<?php echo $gruppo["CodiceGruppo"];?>"/>
                            <?php if(isUserLoggedIn()):?>
                                <input type="hidden" name="new-subscription-student-id" id="new-subscription-student-id" value=<?php echo $_SESSION["matricola"];?>/>
                            <?php endif; ?>
                            <input type="hidden" name="new-subscription" id="new-subscription"/>
                            <input type="submit" value="Iscriviti al gruppo"/>
                    </form>
                <?php else: ?>
                    <p>Non ci sono più posti nel gruppo</p>
                <?php endif;?>
            </section>
            <?php if(isset($templateParams["errore"])):?>
                <p><?php echo $templateParams["errore"];?></p>
            <?php endif;?>
            <?php if(isUserLoggedIn() && $_SESSION['matricola']==$templateParams["creatore-gruppo"]["MatricolaCreatore"]): ?>
                <section class="delete-group-section">
                    <a class="delete-group" href="visualizzazione-gruppo.php?delete-group=true&single-group=<?php echo $gruppo["CodiceGruppo"];?>">Elimina gruppo</a>
                </section>
                <section class="update-group-section">
                    <?php if(isset($templateParams["update-form-visible"]) && $templateParams["update-form-visible"]==true) :?>
                        <form action="visualizzazione-gruppo.php" method="GET" >
                            <ul>
                                <li>
                                    <label for="nome">Nome : </label>
                                    <input type="text" name="nome" id="nome" value="<?php echo $gruppo["NomeGruppo"];?>"/>
                                </li>
                                <li>
                                    <label for="descrizione">Descrizione : </label></br>
                                    <textarea name="descrizione" id="nome"><?php echo $gruppo["Descrizione"];?></textarea>
                                </li>
                            </ul>
                            <input type="hidden" name="single-group" id="single-group" value="<?php echo $gruppo["CodiceGruppo"];?>"/>
                            <input type="submit" name="modifica-gruppo" id="modifica-gruppo" value="Modifica gruppo"/>
                        </form>
                    <?php else: ?>
                        <a href="visualizzazione-gruppo.php?update-visible=true&single-group=<?php echo $gruppo["CodiceGruppo"];?>">Modifica gruppo</a>
                    <?php endif; ?>
                </section>
            <?php endif; ?>
        </aside>
    </main> 