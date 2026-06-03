<main class="home-container">
    <section class="cards-container">
        <h2>Gruppi Studio</h2>
        <div class="card-grid">
            <?php foreach ($templateParams["gruppiStudio"] as $gruppo): ?>
                <div class="card">
                    <h3><?= $gruppo['Nome'] ?></h3>
                    <p><?= $gruppo['Descrizione'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <h2>Progetti</h2>
        <div class="card-grid">
            <?php foreach ($templateParams["gruppiProgetto"] as $gruppo): ?>
                <div class="card">
                    <h3><?= $gruppo['Nome'] ?></h3>
                    <p><?= $gruppo['Descrizione'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <aside class="sidebar-suggeriti">
        <h2>Suggeriti</h2>
        <div class="vertical-list">
            <?php foreach ($templateParams["gruppiCasuali"] as $gruppo): ?>
                <div class="card">
                    <h3><?= $gruppo['Nome'] ?></h3>
                    <p><?= $gruppo['Descrizione'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </aside>
</main>
