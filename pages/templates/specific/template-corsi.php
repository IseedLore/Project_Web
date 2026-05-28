    <main class="courses-main">
        <section class="courses-container">
            <ul class="courses-list">
                <?php foreach($templateParams["corsi"] as $corso):?>
                <li class="course">
                    <h2><?php echo $corso["Nome"]; ?></h2>
                    <p>Codice : <?php echo $corso["Codice"]; ?></p>
                    <p>Crediti : <?php echo $corso["CFU"]; ?></p>
                    <p>Richiede progetto : <?php echo $corso["ProgettoRichiesto"]; ?></p>
                    <p>Descrizione : <?php echo $corso["Descrizione"]; ?></p>
                    <div>
                        <a href="">Vai ai gruppi</a>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
        </section>

    </main>