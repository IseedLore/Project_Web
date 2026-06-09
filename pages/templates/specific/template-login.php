<main class="login-main-container">
    <div class="login-grid">        
        <section class="login-section">
            <h2>Accedi</h2>
            <form action="login.php" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="text" id="login-email" name="email" required autocomplete="on"/>
                </div>
                
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required autocomplete="off"/>
                </div>
                
                <button type="submit" class="btn-auth">Accedi</button>

                <div class="form-group">
                    <?=  $templateParams["erroreLogin"] ?>
                </div>
            </form>
        </section>

        <section class="login-section">
            <h2>Iscriviti</h2>
            <form action="login.php" method="POST" class="auth-form registration-grid">
                <div class="form-group">
                    <label for="reg-nome">Nome</label>
                    <input type="text" id="reg-nome" name="nome" required autocomplete="off"/>
                </div>

                <div class="form-group">
                    <label for="reg-cognome">Cognome</label>
                    <input type="text" id="reg-cognome" name="cognome" required autocomplete="off"/>
                </div>

                <div class="form-group">
                    <label for="reg-matricola">Matricola</label>
                    <input type="text" id="reg-matricola" name="matricola" min="10" maxlength="10" pattern="\d{10}" title="Inserire 10 cifre numeriche" required autocomplete="off"/>
                </div>
                
                <div class="form-group">
                    <label for="reg-password">Password</label>
                    <input type="password" id="reg-password" name="password" minlength="10" required autocomplete="off"/>
                </div>
                
                <div class="form-group">
                    <label for="reg-email">Email</label>
                    <input type="email" id="reg-email" name="email" required autocomplete="off"/>
                </div>
                
                <button type="submit" class="btn-auth">Iscriviti</button>                

                <div class="form-group">
                    <?=  $templateParams["erroreRegistrazione"] ?>
                </div>
            </form>
        </section>
    </div>
</main>



