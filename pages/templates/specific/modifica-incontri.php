            <table>
                <tr>
                    <th id="data">Data</th>
                    <th id="orario">Orario</th>
                    <th id="azione">Azione</th>
                </tr>
                <?php foreach($incontri as $incontro): ?>
                <tr>
                    <td headers="data"><?php echo $incontro["Data"];?></td>
                    <td headers="orario"><?php echo $incontro["Orario"];?></td>
                    <td headers="azione">
                        <a href="visualizzazione-gruppo.php?open-modify-meetings=true&single-group=<?php echo $gruppo["CodiceGruppo"];?>&action=2&date=<?php echo $incontro["Data"];?>&time=<?php echo $incontro["Orario"];?>">Modifica</a>
                        <a href="visualizzazione-gruppo.php?open-modify-meetings=true&single-group=<?php echo $gruppo["CodiceGruppo"];?>&action=3&date=<?php echo $incontro["Data"];?>&time=<?php echo $incontro["Orario"];?>">Elimina</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <a class="insert-button" href="visualizzazione-gruppo.php?open-modify-meetings=true&single-group=<?php echo $gruppo["CodiceGruppo"];?>&action=1">Inserisci nuovo incontro</a>