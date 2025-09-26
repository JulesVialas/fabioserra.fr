<section id="consultation-citoyenne" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Consultation citoyenne</h2>
        </div>
        <div class="form-container">
            <form method="post" action="/" class="form">
                <input type="hidden" name="form_type" value="consultation-citoyenne">
                
                <div class="form-group">
                    <label for="quartier">Dans quel quartier de Muret vivez-vous ? *</label>
                    <input type="text" id="quartier" name="quartier" required placeholder="Ex: Centre-ville, allées Niel, etc." class="form-input">
                </div>

                <div class="form-group">
                    <label>Êtes-vous satisfait(e) de la gestion de la ville ? *</label>
                    <div class="radio-group">
                        <label class="radio-label"><input type="radio" name="satisfaction" value="Très satisfait(e)" required class="form-radio"> Très satisfait(e)</label>
                        <label class="radio-label"><input type="radio" name="satisfaction" value="Plutôt satisfait(e)" class="form-radio"> Plutôt satisfait(e)</label>
                        <label class="radio-label"><input type="radio" name="satisfaction" value="Peu satisfait(e)" class="form-radio"> Peu satisfait(e)</label>
                        <label class="radio-label"><input type="radio" name="satisfaction" value="Pas du tout satisfait(e)" class="form-radio"> Pas du tout satisfait(e)</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Quels sont selon vous les 3 sujets prioritaires pour Muret ? * (3 choix maximum)</label>
                    <div class="checkbox-group">
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Sécurité" class="form-checkbox"> Sécurité</label>
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Transports" class="form-checkbox"> Transports</label>
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Environnement" class="form-checkbox"> Environnement</label>
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Économie locale" class="form-checkbox"> Économie locale</label>
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Jeunesse" class="form-checkbox"> Jeunesse</label>
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Seniors" class="form-checkbox"> Seniors</label>
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Culture" class="form-checkbox"> Culture</label>
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Sport" class="form-checkbox"> Sport</label>
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Urbanisme" class="form-checkbox"> Urbanisme</label>
                        <label class="checkbox-label"><input type="checkbox" name="sujets[]" value="Propreté" class="form-checkbox"> Propreté</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Comment jugez-vous l'état des infrastructures de Muret ? *</label>
                    <div class="radio-group">
                        <label class="radio-label"><input type="radio" name="etat" value="Excellent" required class="form-radio"> Excellent</label>
                        <label class="radio-label"><input type="radio" name="etat" value="Bon" class="form-radio"> Bon</label>
                        <label class="radio-label"><input type="radio" name="etat" value="Moyen" class="form-radio"> Moyen</label>
                        <label class="radio-label"><input type="radio" name="etat" value="Mauvais" class="form-radio"> Mauvais</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ameliorations">Quelles améliorations souhaiteriez-vous voir en priorité ?</label>
                    <textarea id="ameliorations" name="ameliorations" placeholder="Décrivez vos suggestions d'amélioration pour Muret..." class="form-textarea"></textarea>
                </div>

                <div class="form-group">
                    <label>Dans quelle tranche d'âge vous situez-vous ? *</label>
                    <div class="radio-group">
                        <label class="radio-label"><input type="radio" name="age" value="18-25 ans" required class="form-radio"> 18-25 ans</label>
                        <label class="radio-label"><input type="radio" name="age" value="26-35 ans" class="form-radio"> 26-35 ans</label>
                        <label class="radio-label"><input type="radio" name="age" value="36-50 ans" class="form-radio"> 36-50 ans</label>
                        <label class="radio-label"><input type="radio" name="age" value="51-65 ans" class="form-radio"> 51-65 ans</label>
                        <label class="radio-label"><input type="radio" name="age" value="Plus de 65 ans" class="form-radio"> Plus de 65 ans</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary form-submit">Envoyer ma participation</button>
            </form>
        </div>
    </div>
</section>