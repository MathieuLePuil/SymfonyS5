# Installation du Projet Symfony

Ce guide vous aidera à installer et configurer le projet Symfony sur votre environnement de développement local.

## Prérequis

Assurez-vous d'avoir `git`, `PHP` et `Composer` installés sur votre machine. Pour vérifier, exécutez les commandes suivantes dans votre terminal :

```bash
git --version
php --version
composer --version
```


Si ces commandes affichent les versions installées, vous pouvez continuer. Sinon, installez les composants manquants avant de procéder.

## Étapes d'Installation

1. **Cloner le dépôt**

   Clonez le code source du projet en exécutant :

    ```bash
   git clone https://github.com/MathieuLePuil/SymfonyS5.git
    ```
<br>

2. **Naviguer dans le dossier du projet**

    Accédez au dossier du projet cloné :

    ```bash
    cd SymfonyS5
    ```
<br>


3. **Installer les dépendances**

    Installez les dépendances PHP avec Composer :

    ```bash
    composer install
    ```
<br>


4. **Configurer l'environnement**

    Copiez le fichier `.env` en un fichier `.env.local` qui sera utilisé pour la configuration locale :
    
    ```bash
    cp .env .env.local
    ```

    Ensuite, ouvrez `.env.local` avec votre éditeur de texte et modifiez la ligne de connexion à la base de données pour qu'elle corresponde à votre environnement local :

    ```bash
    DATABASE_URL="mysql://{user}:{password}@127.0.0.1:3306/{database_name}?serverVersion=8.0.32&charset=utf8mb4"
    ```
    
   Remplacez `{user}`, `{password}` et `{database_name}` par vos propres valeurs.

<br>

5. **Créer la base de données**

    Créez la base de données en exécutant :

    ```bash
    bin/console doctrine:database:create
    ```
<br>

6. **Mettre à jour la base de données**

    Appliquez les migrations à votre base de données :
    
    ```bash
    bin/console doctrine:schema:update --force
    ```
<br>

7. **Charger les données de test**

    Si nécessaire, chargez les données de test dans la base de données :
    
    ```bash
    bin/console doctrine:fixtures:load
    ```
<br>


8. **Démarrer le serveur de développement**

    Lancez le serveur de développement Symfony :
    
    ```bash
    symfony server:start
    ```
<br>


Vous verrez un message indiquant que le serveur est en marche et à l'écoute des requêtes.

## Accès au Site

Le site est maintenant accessible à l'adresse [http://127.0.0.1:8000](http://127.0.0.1:8000). Ouvrez cette URL dans votre navigateur pour voir l'application.
