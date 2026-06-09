            <table>
                <tr>
                    <th id="data" scope="colgroup">Data</th>
                    <th id="orario" scope="colgroup">Orario</th>
                    <th id="azione" scope="colgroup">Azione</th>
                </tr>
                <?php foreach($incontri as $incontro): ?>
                <tr>
                    <td headers="data" scope="col"><?php echo $incontro["Data"];?></td>
                    <td headers="orario" scope="col"><?php echo $incontro["Orario"];?></td>
                    <td headers="azione" scope="col">
                        <a href="visualizzazione-gruppo.php?open-modify-meetings=true&single-group=<?php echo $gruppo["CodiceGruppo"];?>&action=2&date=<?php echo $incontro["Data"];?>&time=<?php echo $incontro["Orario"];?>">Modifica</a>
                        <a href="visualizzazione-gruppo.php?open-modify-meetings=true&single-group=<?php echo $gruppo["CodiceGruppo"];?>&action=3&date=<?php echo $incontro["Data"];?>&time=<?php echo $incontro["Orario"];?>">Elimina</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <a class="insert-button" href="visualizzazione-gruppo.php?open-modify-meetings=true&single-group=<?php echo $gruppo["CodiceGruppo"];?>&action=1">Inserisci nuovo incontro</a>