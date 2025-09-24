<?php
echo "<h1>🔍 Debug Fabio Serra</h1>";
echo "<hr>";

echo "<h2>📍 Informations serveur</h2>";
echo "<p><strong>Date/Heure:</strong> " . date('Y-m-d H:i:s') . "</p>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>Répertoire courant:</strong> " . getcwd() . "</p>";
echo "<p><strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p><strong>Script Name:</strong> " . $_SERVER['SCRIPT_NAME'] . "</p>";
echo "<p><strong>REQUEST_URI:</strong> " . $_SERVER['REQUEST_URI'] . "</p>";

echo "<h2>📂 Structure des fichiers</h2>";
echo "<h3>Contenu du répertoire courant:</h3>";
echo "<pre>";
$files = scandir('.');
foreach($files as $file) {
    if ($file != '.' && $file != '..') {
        echo ($file == 'index.php' ? '✅ ' : '📄 ') . $file;
        if (is_dir($file)) echo ' (dossier)';
        echo "\n";
    }
}
echo "</pre>";

echo "<h3>Vérification des fichiers critiques:</h3>";
$criticalFiles = ['index.php', '.htaccess', 'assets'];
foreach($criticalFiles as $file) {
    $exists = file_exists($file);
    echo "<p>" . ($exists ? '✅' : '❌') . " $file " . ($exists ? 'existe' : 'n\'existe pas') . "</p>";
    if ($exists && $file == 'index.php') {
        echo "<p>📏 Taille: " . filesize($file) . " bytes</p>";
    }
}

echo "<h3>Vérification du dossier src:</h3>";
$srcPaths = ['../src', '../../src', './src'];
foreach($srcPaths as $path) {
    if (is_dir($path)) {
        echo "<p>✅ Dossier src trouvé dans: $path</p>";
        echo "<pre>";
        $srcFiles = scandir($path);
        foreach(array_slice($srcFiles, 0, 10) as $file) {
            if ($file != '.' && $file != '..') {
                echo "  - $file" . (is_dir($path.'/'.$file) ? ' (dossier)' : '') . "\n";
            }
        }
        echo "</pre>";
        break;
    } else {
        echo "<p>❌ Pas de dossier src dans: $path</p>";
    }
}

echo "<h2>🔧 Test d'inclusion</h2>";
$testPaths = [
    $_SERVER['DOCUMENT_ROOT'] . '/../src/controllers/AccueilController.php',
    '../src/controllers/AccueilController.php',
    '../../src/controllers/AccueilController.php'
];

foreach($testPaths as $path) {
    if (file_exists($path)) {
        echo "<p>✅ AccueilController trouvé: $path</p>";
        break;
    } else {
        echo "<p>❌ AccueilController introuvable: $path</p>";
    }
}

echo "<h2>🌐 Variables d'environnement</h2>";
echo "<p><strong>HTTP_HOST:</strong> " . ($_SERVER['HTTP_HOST'] ?? 'non défini') . "</p>";
echo "<p><strong>HTTPS:</strong> " . ($_SERVER['HTTPS'] ?? 'non défini') . "</p>";
echo "<p><strong>SERVER_NAME:</strong> " . ($_SERVER['SERVER_NAME'] ?? 'non défini') . "</p>";

echo "<h2>🔄 Test de réécriture</h2>";
echo "<p>Si vous voyez cette page à l'adresse /debug.php, la réécriture fonctionne partiellement.</p>";
echo "<p>Si vous la voyez à une autre adresse, il y a un problème de réécriture.</p>";

echo "<hr>";
echo "<p style='color: green; font-weight: bold;'>✅ PHP fonctionne correctement!</p>";
?>