# fabioserra.fr

> Dépôt public du site web fabioserra.fr

## Présentation

Ce projet est un site web développé en PHP, structuré selon le modèle MVC (Modèle-Vue-Contrôleur). Il comprend une partie publique et une partie d'administration.

## Structure du projet

- `public/` : Fichiers accessibles publiquement (point d'entrée, assets)
- `src/controllers/` : Contrôleurs de l'application
- `src/models/` : Modèles de données
- `src/services/` : Services (base de données, email, configuration, SEO)
- `src/views/` : Vues et composants PHP
- `.github/workflows/` : Workflows CI/CD pour le déploiement automatique

## Fonctionnalités principales

- Page d'accueil dynamique
- Tableau de bord d'administration
- Authentification utilisateur
- Gestion de contenus (actualités, consultations citoyennes)
- Pages légales (mentions légales, politique de confidentialité)

## Déploiement

Le déploiement est automatisé via GitHub Actions et FTP. Les fichiers sensibles sont exclus du dépôt et du déploiement.

## Bonnes pratiques

- Ne versionnez jamais de données sensibles ou de configuration privée.
- Utilisez un fichier `.env` localement (non inclus dans le dépôt).
- Ajoutez tout fichier confidentiel dans `.gitignore`.

## Licence

Ce projet est distribué sous licence libre. Voir le fichier LICENSE si présent.

## Auteur

Jules Vialas
