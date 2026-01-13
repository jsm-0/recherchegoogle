# TP Comments - Système de Recherche et Commentaires

Bienvenue dans ce projet de TP pour le BTS Cybersécurité. Ce projet combine une interface de recherche (simulation) et un système de commentaires simple utilisant PHP et MySQL.

## Fonctionnalités

1.  **Page de Recherche (`index.html`)** :
    *   Interface utilisateur accueillante avec un design stylisé.
    *   Formulaire de recherche redirigeant vers une recherche Google.
    *   Lien pour poster des commentaires.

2.  **Système de Commentaires (`comments.php` & `submit.php`)** :
    *   Affichage des commentaires existants, triés du plus récent au plus ancien.
    *   Possibilité d'ajouter de nouveaux commentaires via un formulaire.
    *   Stockage persistant des données dans une base de données MySQL.

## Prérequis technique

*   Serveur Web (Apache, Nginx, ou via XAMPP/WAMP/MAMP).
*   PHP 7.4 ou supérieur.
*   MySQL ou MariaDB.

## Installation et Configuration

### 1. Base de Données

Le fichier `sql/init.sql` crée la base de données. Cependant, vous devez aussi créer la table `comments`. Exécutez les commandes SQL suivantes dans votre outil de gestion de base de données (phpMyAdmin, DBeaver, etc.) :

```sql
-- Création de la base de données (si pas déjà fait)
CREATE DATABASE IF NOT EXISTS tp_comments CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tp_comments;

-- Création de la table comments
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

### 2. Configuration de la connexion

Vérifiez les paramètres de connexion à la base de données dans les fichiers `comments.php` et `submit.php` :

```php
$host = '127.0.0.1';
$db   = 'tp_comments';
$user = 'root'; // Votre utilisateur MySQL
$pass = '';     // Votre mot de passe MySQL
```

### 3. Lancement

1.  Placez les fichiers du projet dans le dossier racine de votre serveur web (ex: `htdocs` pour XAMPP ou `www` pour WAMP).
2.  Accédez à l'URL : `http://localhost/tp_comments/index.html` (adaptez le chemin selon votre dossier).

## Structure des fichiers

*   `index.html` : Page d'accueil avec recherche.
*   `comments.php` : Page d'affichage des commentaires.
*   `submit.php` : Script backend pour l'enregistrement des commentaires.
*   `style.css` : Feuille de style pour la mise en page.
*   `sql/` : Dossier contenant les scripts SQL d'initialisation.

## Notes de Sécurité (Contexte Cybersécurité)

Ce projet est un TP et contient intentionnellement des points d'amélioration possibles pour la sécurité (ex: validation des entrées, protection CSRF).
