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
                    <h1 class="page-title">Mentions Légales</h1>
                    <p class="page-description">Informations légales relatives au site fabioserra.fr</p>
                </header>

                <div class="legal-body">
                    <article class="legal-article">
                        <h2>Éditeur du site</h2>
                        <p><strong>Fabio Serra</strong><br>
                        Candidat aux élections municipales de Muret<br>
                        Email : contact@fabioserra.fr</p>
                    </article>

                    <article class="legal-article">
                        <h2>Hébergement</h2>
                        <p><strong>OVH</strong><br>
                        2 rue Kellermann<br>
                        59100 Roubaix<br>
                        France</p>
                    </article>

                    <article class="legal-article">
                        <h2>Propriété intellectuelle</h2>
                        <p>L'ensemble des contenus présents sur ce site (textes, images, logos) est la propriété exclusive de Fabio Serra, sauf mention contraire. Toute reproduction, même partielle, est interdite sans autorisation préalable.</p>
                    </article>

                    <article class="legal-article">
                        <h2>Données personnelles</h2>
                        <p>Les données collectées via les formulaires de contact et de consultation citoyenne sont utilisées uniquement dans le cadre de la campagne municipale. Conformément au RGPD, vous disposez d'un droit d'accès, de rectification et de suppression de vos données.</p>
                    </article>

                    <article class="legal-article">
                        <h2>Cookies</h2>
                        <p>Ce site utilise des cookies techniques nécessaires à son bon fonctionnement. Aucun cookie de tracking ou publicitaire n'est utilisé.</p>
                    </article>

                    <article class="legal-article">
                        <h2>Responsabilité</h2>
                        <p>L'éditeur s'efforce de maintenir les informations de ce site à jour et exactes, mais ne peut garantir l'exactitude, la complétude ou l'actualité des informations diffusées.</p>
                    </article>
                </div>
                <div class="legal-footer">
                    <p class="legal-update">Dernière mise à jour : <?= date('d/m/Y') ?></p>
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