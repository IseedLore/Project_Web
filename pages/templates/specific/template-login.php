<main class="login-main-container">
    <div class="login-grid">        
        <section class="login-section">
            <h2>Accedi</h2>
            <form action="" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="login-username">Nome Utente</label>
                    <input type="text" id="login-username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                
                <button type="submit" class="btn-auth">Accedi</button>
            </form>
        </section>

        <section class="login-section">
            <h2>Iscriviti</h2>
            <form action="" method="POST" class="auth-form registration-grid">
                <div class="form-group">
                    <label for="reg-username">Nome Utente</label>
                    <input type="text" id="reg-username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="reg-matricola">Matricola</label>
                    <input type="text" id="reg-matricola" name="matricola" required>
                </div>
                
                <div class="form-group">
                    <label for="reg-password">Password</label>
                    <input type="password" id="reg-password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="reg-email">Email</label>
                    <input type="email" id="reg-email" name="email" required>
                </div>
                
                <button type="submit" class="btn-auth">Iscriviti</button>                
            </form>
        </section>

    </div>
</main>



