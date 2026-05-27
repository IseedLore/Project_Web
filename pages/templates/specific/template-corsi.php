<main class="container mt-5 mb-10">
        <section class="container p-0">
            <ul class="row row-cols-md-4 row-cols-xs-1 p-0 g-2">
                <?php foreach($templateParams["corsi"] as $corso):?>
                <li class="col border border-info border-3 rounded m-0 p-2">
                    <h2 class="fs-4 text-info"><?php echo $corso["Nome"]; ?></h2>
                    <p>Codice : <?php echo $corso["Codice"]; ?></p>
                    <p>Crediti : <?php echo $corso["CFU"]; ?></p>
                    <p>Richiede progetto : <?php echo $corso["ProgettoRichiesto"]; ?></p>
                    <p>Descrizione : <?php echo $corso["Descrizione"]; ?></p>
                    <div class="text-end">
                        <a class="btn btn-info" href="">Vai ai gruppi</a>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
        </section>

    </main>