<?php
// Script de nettoyage - Supprime les fichiers parasites
echo "<h1>🧹 Nettoyage du serveur</h1>";

$parasiteFiles = ['../index.html', 'index.html'];

foreach ($parasiteFiles as $file) {
    if (file_exists($file)) {
        if (unlink($file)) {
            echo "<p>✅ Supprimé: $file</p>";
        } else {
            echo "<p>❌ Impossible de supprimer: $file</p>";
        }
    } else {
        echo "<p>ℹ️ Fichier non trouvé: $file</p>";
    }
}

echo "<h2>🔄 Test de redirection</h2>";
echo "<p><a href='/'>Tester la page d'accueil</a></p>";
echo "<p><a href='/accueil'>Tester /accueil</a></p>";
echo "<p><a href='/mentions-legales'>Tester /mentions-legales</a></p>";

echo "<h2>✅ Nettoyage terminé</h2>";
echo "<p>Votre site devrait maintenant fonctionner correctement !</p>";
?>