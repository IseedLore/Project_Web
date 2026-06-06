            <form action="gruppi.php" method="GET" id="groups-form">
                <h2>Filtri</h2>
                <?php if (isUserLoggedIn()):?>
                    <div>
                        <label for="filter-logged">Gruppi : </label>
                        <select name="filter-logged" id="filter-logged">
                            <option>Tutti i gruppi</option>
                            <option>I miei gruppi</option>
                        </select>
                    </div>
                <?php endif ?>
                <div>
                    <label for="filter-group-type">Tipo gruppo :</label>
                    <select name="filter-group-type" id="filter-group-type">
                        <option value="Tutti">Tutti</option>
                        <option value="Progetto">Progetto</option>
                        <option value="Studio">Studio</option>
                    </select>
                </div>
                <div>
                    <label for="filter-course">Corso :</label>
                    <select name="filter-course" id="filter-course">
                        <option value="Tutti">Tutti</option>
                        <?php foreach($templateParams["corsi"] as $corso): ?>
                            <option value="<?php echo $corso["Nome"]; ?>"><?php echo $corso["Nome"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit">Filtra</a>
            </form>