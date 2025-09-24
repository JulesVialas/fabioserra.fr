<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/head.php';
?>
<body class="page-accueil">
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/header.php';
?>

<main class="main">
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/hero.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/actualites.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/consultation-citoyenne.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/contact.php';
?>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/footer.php';
?>
<script src="/assets/js/script.js"></script>
</body>
</html>