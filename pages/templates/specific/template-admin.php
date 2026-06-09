<main class="admin-main">
    <section>
        <?php if(isAdminLoggedIn()):?>
            <?php if(isset($templateParams["msg-errore"])) :?>
                <p class="msg-error"><?php echo $templateParams["msg-errore"];?></p>
            <?php else: ?>
                <?php if(!isset($templateParams["modifica"])) :?>
                    <form action="admin.php" method="GET">
                        <input class="admin-insert-btn" type="submit" id="action" name="action" value="Inserisci"/>
                    </form>
                    <?php $templateParams["form-courses-type"] = "form-admin-corso.php";?>
                <?php endif;
                require($templateParams["section-content"]);?>
            <?php endif; ?>
        <?php endif; ?>
    </section>
    <aside>
        <?php if(!isAdminLoggedIn()): ?>
            <form action="admin.php" method="POST">
                <ul>
                    <li>
                        <label for="admin-user">Username : </label>
                        <input type="text" id="admin-user" name="admin-user" required/>
                    </li>
                    <li>
                        <label for="admin-pwd">Password : </label>
                        <input type="password" id="admin-pwd" name="admin-pwd" required/>
                    </li>
                </ul>
                <input type="submit" value="Login"/>
            </form>
            <?php if(isset($errore)) :?>
                <p><?php echo $errore;?></p>
            <?php endif; ?>
        <?php else : ?>
            <h2><?php echo $msg; ?></h2>
            <a href="admin.php?logout=true">Logout</a>
        <?php endif; ?>
    </aside>

</main>