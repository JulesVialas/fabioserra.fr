<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/controllers/AccueilController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/controllers/MentionsLegalesController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/controllers/PolitiqueConfidentialiteController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/controllers/LoginController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../src/controllers/DashboardController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = strtolower($_SERVER['REQUEST_METHOD']);

switch ($uri) {
    case '/':
    case '/accueil':
        $controller = new AccueilController();
        break;
    case '/mentions-legales':
        $controller = new MentionsLegalesController();
        break;
    case '/politique-confidentialite':
        $controller = new PolitiqueConfidentialiteController();
        break;
    case '/login':
        $controller = new LoginController();
        break;
    case '/dashboard':
        $controller = new DashboardController();
        break;
    default:
        $controller = new AccueilController();
        break;
}

$controller->$method();
?>