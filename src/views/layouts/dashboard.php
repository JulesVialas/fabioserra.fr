<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../src/views/components/head.php';
?>
<body class="page-dashboard">
    <div class="dashboard-container">
        <header class="dashboard-header">
            <div class="container">
                <div class="dashboard-nav">
                    <h1 class="dashboard-title">Dashboard Administrateur</h1>
                    <div class="dashboard-user">
                        <span class="user-welcome">Bonjour <?= htmlspecialchars($_SESSION['username']) ?></span>
                        <form method="post" class="logout-form">
                            <button type="submit" name="logout" class="btn btn-secondary btn-small">Déconnexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="dashboard-main">
            <div class="container">
                <div class="dashboard-content">
                    <div class="dashboard-stats">
                        <div class="stat-card">
                            <h3 class="stat-title">Consultations</h3>
                            <p class="stat-number"><?= count($consultations) ?></p>
                            <p class="stat-label">participations reçues</p>
                        </div>
                    </div>

                    <div class="dashboard-section">
                        <h2 class="section-title">Résultats de la Consultation Citoyenne</h2>
                        
                        <div class="table-container">
                            <div class="table-responsive">
                                <table class="dashboard-table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Quartier</th>
                                            <th>Satisfaction</th>
                                            <th>Sujets prioritaires</th>
                                            <th>État infrastructures</th>
                                            <th>Âge</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($consultations as $consultation): ?>
                                            <tr class="table-row">
                                                <td class="table-cell" data-label="Date"><?= htmlspecialchars(date('d/m/Y H:i', strtotime($consultation['date_soumission']))) ?></td>
                                                <td class="table-cell" data-label="Quartier"><?= htmlspecialchars($consultation['quartier']) ?></td>
                                                <td class="table-cell" data-label="Satisfaction"><?= htmlspecialchars($consultation['satisfaction']) ?></td>
                                                <td class="table-cell" data-label="Sujets"><?= htmlspecialchars($consultation['sujets']) ?></td>
                                                <td class="table-cell" data-label="État"><?= htmlspecialchars($consultation['etat']) ?></td>
                                                <td class="table-cell" data-label="Âge"><?= htmlspecialchars($consultation['age']) ?></td>
                                            </tr>
                                            <?php if (!empty($consultation['ameliorations'])): ?>
                                                <tr class="table-row table-suggestion">
                                                    <td colspan="6" class="table-cell">
                                                        <div class="suggestion-content">
                                                            <strong>Suggestions d'améliorations :</strong> 
                                                            <span><?= htmlspecialchars($consultation['ameliorations']) ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dashboard-actions">
                        <a href="/" class="btn btn-primary">Retour au site</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="/assets/js/script.js"></script>
</body>
</html>