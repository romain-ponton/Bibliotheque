

# Instructions pour configurer le projet Laravel 11

Ce guide vous aidera à configurer le projet Laravel 11 sur votre machine locale.

## Prérequis

- PHP >= 8.2
- Composer
- Base de données configurée (MySQL, PostgreSQL, etc.)

## Étapes d'installation

1. **Cloner le dépôt**

   Clonez le dépôt du projet sur votre machine locale.

   ```bash
   git clone <URL_DU_DÉPÔT>
   cd <NOM_DU_PROJET>
   ```


2. **Installer les dépendances**

   Exécutez la commande suivante pour installer les dépendances PHP via Composer.

   ```bash
   composer install
   ```

3. **Configurer l'environnement**

   Copiez le fichier `.env.example` en `.env` et configurez les variables d'environnement, notamment les informations de connexion à la base de données.

   ```bash
   cp .env.example .env
   ```

   Générez une clé d'application.

   ```bash
   php artisan key:generate
   ```

4. **Exécuter les migrations et les seeders**

   Exécutez les migrations pour créer les tables de la base de données.

   ```bash
   php artisan migrate
   ```

   Exécutez les seeders pour remplir la base de données avec des données initiales.

   ```bash
   php artisan db:seed --class=CategorySeeder
   php artisan db:seed --class=AdminSeeder
   php artisan db:seed --class=UserSeeder
   php artisan db:seed --class=BookSeeder
   ```

5. **Démarrer le serveur de développement**

   Vous pouvez maintenant démarrer le serveur de développement Laravel.

   ```bash
   php artisan serve
   ```
