            <form action="creazione-gruppo.php" method="POST" enctype="multipart/form-data">
                <h2>Creazione gruppo studio</h2>
                <ul>
                    <li>
                        <label for="nome">Nome : </label>
                        <input type="text" name="nome" id="nome" required  autocomplete="off"/>
                    </li>
                    <li>
                        <label for="desc">Descrizione : </br></label>
                        <textarea name="desc" id="desc"  autocomplete="off"></textarea>
                    </li>
                    <li>
                        <label for="num">Numero membri richiesti: </label>
                        <input type="number" name="num" id="num" min="0"  autocomplete="off"/>
                    </li>
                    <li>
                        <label for="corso">Corso : </label>
                        <select name="corso" id="corso" autocomplete="off">
                            <?php foreach($templateParams["corsi"] as $corso): ?>
                                <option value="<?php echo $corso["Codice"]; ?>"><?php echo $corso["Nome"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </li>
                </ul>
                <input type="submit" name="create-group" value="Crea gruppo studio"/>
            </form>