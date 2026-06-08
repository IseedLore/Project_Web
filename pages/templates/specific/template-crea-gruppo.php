    <main class="creation-group">
    <section>
        <?php if(!isUserLoggedIn()): ?>
            <p class="message-error">Per poter creare un gruppo, bisogna essere loggati!</p>
        <?php elseif(isset($templateParams["file-tipo"])):
            require $templateParams["file-tipo"];
        endif; ?>
        <?php if(isset($msg)): ?>
            <p class="message-result"><?php echo $msg;?></p>
        <?php endif; ?>
    </section>
    <aside>
        <h2>Seleziona il tipo di gruppo che vuoi creare</h2>
        <a href="creazione-gruppo.php?type=studio">Studio</a>
        <a href="creazione-gruppo.php?type=progetto">Progetto</a>
    </aside>
    </main>