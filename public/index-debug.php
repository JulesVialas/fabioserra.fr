<?php
echo "<h1>🚀 Index.php Debug - Fabio Serra</h1>";
echo "<p>✅ index.php est bien exécuté !</p>";
echo "<hr>";

session_start();

echo "<h2>📍 Diagnostic des chemins</h2>";
echo "<p><strong>DOCUMENT_ROOT:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p><strong>Chemin calculé src:</strong> " . $_SERVER['DOCUMENT_ROOT'] . '/../src/' . "</p>";

// Test des chemins possibles pour src
$possiblePaths = [
    $_SERVER['DOCUMENT_ROOT'] . '/../src/controllers/AccueilController.php',
    __DIR__ . '/../src/controllers/AccueilController.php',
    '../src/controllers/AccueilController.php',
    '../../src/controllers/AccueilController.php'
];

echo "<h2>🔍 Test des chemins src</h2>";
$foundPath = null;
foreach ($possiblePaths as $path) {
    $exists = file_exists($path);
    echo "<p>" . ($exists ? '✅' : '❌') . " $path</p>";
    if ($exists && !$foundPath) {
        $foundPath = $path;
    }
}

if ($foundPath) {
    echo "<p style='color: green;'>✅ Fichiers source trouvés !</p>";
    echo "<p><strong>Chemin utilisé:</strong> $foundPath</p>";
    
    // Essayer d'inclure le contrôleur
    try {
        require_once $foundPath;
        echo "<p>✅ AccueilController inclus avec succès !</p>";
        
        if (class_exists('AccueilController')) {
            echo "<p>✅ Classe AccueilController trouvée !</p>";
            
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $method = strtolower($_SERVER['REQUEST_METHOD']);
            
            echo "<p><strong>URI:</strong> $uri</p>";
            echo "<p><strong>Méthode:</strong> $method</p>";
            
            // Test de création du contrôleur
            try {
                $controller = new AccueilController();
                echo "<p>✅ Contrôleur créé avec succès !</p>";
                echo "<p>🎯 Le site devrait normalement fonctionner maintenant.</p>";
            } catch (Exception $e) {
                echo "<p>❌ Erreur lors de la création du contrôleur: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p>❌ Classe AccueilController non trouvée après inclusion</p>";
        }
    } catch (Exception $e) {
        echo "<p>❌ Erreur lors de l'inclusion: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color: red;'>❌ Aucun fichier source trouvé !</p>";
    echo "<p>Vérifiez que le dossier 'src' est bien déployé sur le serveur.</p>";
}

echo "<hr>";
echo "<h2>📂 Structure actuelle du serveur</h2>";
echo "<pre>";
function listDirectory($dir, $prefix = '') {
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                echo $prefix . $file . (is_dir($dir . '/' . $file) ? '/ (dossier)' : '') . "\n";
                if (is_dir($dir . '/' . $file) && strlen($prefix) < 6) { // Limite la profondeur
                    listDirectory($dir . '/' . $file, $prefix . '  ');
                }
            }
        }
    }
}

echo "Répertoire courant (www/public/):\n";
listDirectory('.');

echo "\nRépertoire parent (www/):\n";
if (is_dir('..')) {
    listDirectory('..');
}

echo "\nRépertoire grand-parent (racine serveur):\n";
if (is_dir('../..')) {
    listDirectory('../..');
}
echo "</pre>";
?>