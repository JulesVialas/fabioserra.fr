<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/services/SEO.php';

$uri = $_SERVER['REQUEST_URI'];
$uri = parse_url($uri, PHP_URL_PATH);
if ($uri === '') $uri = '/';

$seo = SEO::getPageData($uri);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title><?= htmlspecialchars($seo['title']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($seo['keywords']) ?>">
    <meta name="author" content="Fabio Serra">
    <meta name="robots" content="index, follow">
    <meta name="language" content="French">
    <meta name="geo.region" content="FR-31">
    <meta name="geo.placename" content="Muret">
    <meta name="geo.position" content="43.4646;1.3282">
    <meta name="ICBM" content="43.4646, 1.3282">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($seo['canonical']) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($seo['title']) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['description']) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og_image']) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="Fabio Serra - Retrouvons Muret !">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= htmlspecialchars($seo['canonical']) ?>">
    <meta property="twitter:title" content="<?= htmlspecialchars($seo['title']) ?>">
    <meta property="twitter:description" content="<?= htmlspecialchars($seo['description']) ?>">
    <meta property="twitter:image" content="<?= htmlspecialchars($seo['og_image']) ?>">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    <?= SEO::generateStructuredData($uri) ?>
    </script>
    
    <!-- Styles -->
    <link rel="stylesheet" href="/assets/css/styles.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="/assets/images/favicon.webp">
    <link rel="apple-touch-icon" href="/assets/images/favicon.webp">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']) ?>">
</head>