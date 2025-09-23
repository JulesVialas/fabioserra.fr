<section id="contact" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Contact</h2>
            <p class="section-description">Contactez-nous pour toute question ou demande d'information.</p>
        </div>
        <div class="form-container">
            <form method="post" action="/" class="form">
                <div class="form-group">
                    <label for="nom">Nom *</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre nom" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom *</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="sujet">Sujet *</label>
                    <input type="text" id="sujet" name="sujet" placeholder="Sujet de votre message" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" placeholder="Votre message" required class="form-textarea"></textarea>
                </div>
                <button type="submit" class="btn btn-primary form-submit">Envoyer le message</button>
            </form>
        </div>
    </div>
</section>