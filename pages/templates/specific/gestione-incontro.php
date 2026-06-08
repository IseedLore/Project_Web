<?php 
if(isset($templateParams["incontro"])):
    $incontro = $templateParams["incontro"];
endif;
$azione = getAction($templateParams["azione"]);
?>
<form action="visualizzazione-gruppo.php" method="POST" enctype="multipart/form-data">
    <h4>Informazioni incontro</h4>
    <ul>
        <li>
            <label for="data">Data : </label>
            <?php if($azione!="Inserisci"): ?>
                <input type="date" id="data" name="data" value="<?php echo $incontro["Data"];?>" min="2025-09-01" max="2027-09-01"/>
            <?php else: ?>
                <input type="date" id="data" name="data" min="2025-09-01" max="2027-09-01"/>
            <?php endif; ?>
        </li>
        <li>
            <label for="orario">Orario : </label>
            <?php if($azione!="Inserisci"): ?>
                <input type="time" id="orario" name="orario" value="<?php echo $incontro["Orario"];?>" min="08:00:00" max="21:00:00"/>
            <?php else: ?>
                <input type="time" id="orario" name="orario" min="08:00:00" max="21:00:00"/>
            <?php endif; ?>
        </li>
        <li>
            <p>Modalità : </p>
            <label for="mod-presenza">In presenza</label>
            <?php if($azione!="Inserisci" && $incontro["Modalità"]=="In presenza"): ?>
                <input type="radio" id="mod-presenza" name="mod" value="In presenza" checked="checked" required/>
            <?php else: ?>
                <input type="radio" id="mod-presenza" name="mod" value="In presenza" required/>
            <?php endif;?>
            <label for="mod-remoto">Da remoto</label>
            <?php if($azione!="Inserisci" && $incontro["Modalità"]=="Da remoto"): ?>
                <input type="radio" id="mod-remoto" name="mod" value="Da remoto" checked="checked"/>
            <?php else: ?>
                <input type="radio" id="mod-remoto" name="mod" value="Da remoto"/>
            <?php endif;?>
        </li>
        <li>
            <label for="luogo">Luogo : </label>
            <?php if($azione!="Inserisci"): ?>
                <input type="text" id="luogo" name="luogo" value="<?php echo $incontro["Luogo"];?>"/>
            <?php else: ?>
                <input type="text" id="luogo" name="luogo"/>
            <?php endif; ?>
        </li>
        <li>
            <label for="note">Note : </br></label>
            <?php if($azione!="Inserisci"): ?>
                <textarea id="note" name="note"><?php echo $incontro["Note"];?></textarea>
            <?php else: ?>
                <textarea id="note" name="note"></textarea>
            <?php endif; ?>
        </li>
        <li>
            <input type="submit" name="submit" value="<?php echo $azione; ?> incontro" />
            <a href="visualizzazione-gruppo.php?open-modify-meetings=true&single-group=<?php echo $templateParams["gruppo-singolo"]["CodiceGruppo"];?>">Annulla</a>
        </li>
    </ul>
    <?php if($azione!="Inserisci"): ?>
        <input type="hidden" name="olddata" value="<?php echo $incontro["Data"];?>"/>
        <input type="hidden" name="oldtime" value="<?php echo $incontro["Orario"];?>"/>
    <?php endif; ?>

    <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>"/>
    <input type="hidden" name="single-group" value="<?php echo $templateParams["gruppo-singolo"]["CodiceGruppo"];?>"/>
</form>