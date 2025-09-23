<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/head.php';
?>
<body class="page-legal">
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/header.php';
?>

<main class="main">
    <section class="section legal-section">
        <div class="container">
            <div class="legal-content">
                <header class="legal-header">
                    <h1 class="page-title">Politique de Confidentialité</h1>
                    <p class="page-description">Protection et traitement de vos données personnelles</p>
                </header>

                <div class="legal-body">
                    <article class="legal-article">
                        <h2>Responsable du traitement</h2>
                        <p><strong>Fabio Serra</strong><br>
                        Candidat aux élections municipales de Muret<br>
                        Email : contact@fabioserra.fr</p>
                    </article>

                    <article class="legal-article">
                        <h2>Données collectées</h2>
                        <p>Nous collectons les données suivantes :</p>
                        <ul>
                            <li><strong>Formulaire de contact :</strong> nom, prénom, sujet, message</li>
                            <li><strong>Consultation citoyenne :</strong> quartier, satisfaction, sujets prioritaires, état des infrastructures, suggestions d'améliorations, tranche d'âge</li>
                        </ul>
                    </article>

                    <article class="legal-article">
                        <h2>Finalités du traitement</h2>
                        <p>Vos données sont utilisées pour :</p>
                        <ul>
                            <li>Répondre à vos demandes de contact</li>
                            <li>Analyser les résultats de la consultation citoyenne</li>
                            <li>Élaborer le programme municipal en fonction des attentes des citoyens</li>
                        </ul>
                    </article>

                    <article class="legal-article">
                        <h2>Base légale</h2>
                        <p>Le traitement de vos données repose sur votre consentement libre et éclairé lors de la soumission des formulaires.</p>
                    </article>

                    <article class="legal-article">
                        <h2>Conservation des données</h2>
                        <p>Vos données sont conservées pendant la durée de la campagne municipale et jusqu'à 6 mois après les élections, puis sont supprimées de façon sécurisée.</p>
                    </article>

                    <article class="legal-article">
                        <h2>Vos droits</h2>
                        <p>Conformément au RGPD, vous disposez des droits suivants :</p>
                        <ul>
                            <li><strong>Droit d'accès :</strong> obtenir la confirmation que vos données sont traitées</li>
                            <li><strong>Droit de rectification :</strong> corriger vos données inexactes</li>
                            <li><strong>Droit à l'effacement :</strong> demander la suppression de vos données</li>
                            <li><strong>Droit d'opposition :</strong> vous opposer au traitement de vos données</li>
                            <li><strong>Droit à la portabilité :</strong> récupérer vos données dans un format structuré</li>
                        </ul>
                        <p>Pour exercer ces droits, contactez-nous à : <strong>contact@fabioserra.fr</strong></p>
                    </article>

                    <article class="legal-article">
                        <h2>Sécurité des données</h2>
                        <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre la perte, l'usage non autorisé ou la divulgation.</p>
                    </article>

                    <article class="legal-article">
                        <h2>Transfert de données</h2>
                        <p>Vos données ne sont pas transférées en dehors de l'Union européenne et ne sont pas partagées avec des tiers sans votre consentement explicite.</p>
                    </article>

                    <article class="legal-article">
                        <h2>Réclamation</h2>
                        <p>Si vous estimez que le traitement de vos données porte atteinte à vos droits, vous pouvez introduire une réclamation auprès de la CNIL : <strong>www.cnil.fr</strong></p>
                    </article>
                </div>

                <div class="legal-footer">
                    <p class="legal-update">Dernière mise à jour : <?= date('d/m/Y') ?></p>
                    <a href="/" class="btn btn-primary">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/footer.php';
?>
<script src="/assets/js/script.js"></script>
</body>
</html>