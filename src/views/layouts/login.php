<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/head.php';
?>
<body class="page-login">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img src="/assets/images/logo-header.webp" alt="Logo Retrouvons Muret" class="login-logo">
                <h1 class="login-title">Connexion Administrateur</h1>
            </div>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <?= htmlspecialchars($_SESSION['error']) ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            
            <form method="post" action="/login" class="login-form">
                <div class="form-group">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required class="form-input">
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" id="password" name="password" required class="form-input">
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </form>
            
            <div class="login-footer">
                <a href="/" class="btn btn-secondary btn-outline">Retour au site</a>
            </div>
        </div>
    </div>
    <script src="/assets/js/script.js"></script>
</body>
</html>