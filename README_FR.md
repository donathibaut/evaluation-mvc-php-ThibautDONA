# evaluation-mvc-php-ThibautDONA

Création du site intranet "Touche pas au klaxon" permettant de créer et proposer des trajets en covoiturage.

Sommaire :

- Prérequis
- Installation
- Utilisation

## Prérequis

Ce projet utilise les ressources suivantes :

- git
- XAMPP
- Apache
- PHP
- Composer
- PhpMyAdmin (base de données MySQL)
- Node.js v24.12.0
- npm

## Installation

||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||  
/ ! \ .ENV => Vous trouverez un fichier .env.example dans le répertoire /env/

|-> Créez un fichier .env dans ce répertoire qui reprendra les mêmes variables.
Vous y ajouterez les valeurs correspondantes à votre configuration du projet.

---

.env.example :
DB_USERNAME="username" - (nom de l'utilisateur ayant les autorisations sur la base de données)
DB_PASSWORD="password" - (mot de passe de ce dernier)
DB_HOST="127.0.0.1" - (adresse IP de bouclage)
DB_PORT="xxxx" - (port associé à la base de données)
DB_NAME="bdd-tpak" - (nom de la base de données)

---

PS : Les parties du README appelant le .env seront marquées par \*\*\*  
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

### GIT

1. Installez git :
   https://git-scm.com

   Clonez le repository :
   Dans votre terminal, utilisez :

   ```bash
   git clone https://github.com/donathibaut/evaluation-mvc-php-ThibautDONA
   ```

### XAMPP

2. Installez XAMPP :
   https://www.apachefriends.org/fr/index.html

### APACHE / PHP

3. Placez le projet dans le répertoire htdocs de votre installation XAMPP
   (exemple : XAMPP/htdocs/dossier-projet).

   Ensuite, depuis le Control Panel de XAMPP, appuyez sur le bouton "Start" du module "Apache"
   afin d'activer ce dernier.
   (Ce module vous permettra d'effectuer le rendu des fichiers PHP sur votre navigateur.)

### COMPOSER

4. Installez Composer via l'installateur trouvable depuis cette page :
   https://getcomposer.org/download/

   Après ça, lancez votre terminal à la racine de votre projet et utilisez la commande :

   ```bash
   composer install
   ```

### PHP_MY_ADMIN / BASE DE DONNÉES\*\*\*

5. Allez sur PhpMyAdmin :
   Sur l'interface XAMPP, appuyez sur les boutons "Start" du module MySQL.
   Ensuite, cliquez sur le bouton "Admin" de ce module, cela vous enverra sur PhpMyAdmin.

   Une fois que vous y serez, accédez à l'onglet SQL disponible depuis l'accueil et collez le script contenu
   dans le fichier bdd-tpak.sql (annexes/bdd-tpak.sql).

   ATTENTION => remplacer les valeurs "DB\_" (ex : DB_USERNAME) par les valeurs correspondantes du fichier .env.

   Cela étant fait, dirigez-vous dans la base nouvellement créée, allez dans l'onglet SQL s'y trouvant
   et collez le script insert.sql.

   La base de données est maintenant prête !

### NODE.JS / NPM (nécessaire pour Bootstrap)

6. Installez nvm :
   https://www.nvmnode.com/guide/installation.html

   Installez Node.js + npm :
   Dans le terminal, utilisez :

   ```bash
   nvm install 24.12.0
   ```

   puis :

   ```bash
   nvm use 24.12.0
   ```

   Pour voir si c'est bien installé :

   ```bash
   node -v
   ```

   (Vous devriez voir : v.24.12.0)

   Installez les packages de package.json :
   Avec le terminal, allez à la racine du projet.
   Dans le terminal, utilisez :

   ```bash
   npm i
   ```

## Utilisation

### API \*\*\*

1. Config.php (répertoire : /Core/Config.php) => ce fichier utilise les données du .env.

### Lancement du site

2. Laissez tourner Apache et la base de données MySQL via XAMPP comme indiqué précédemment.

Lorsque tout est en place, rendez vous sur :
http://localhost/"dossier-projet"/public/index.php

"dossier-projet" => nom du dossier dans lequel se trouvera le projet  
(se référer au dossier htdocs renseigné plus haut -> partie "APACHE / PHP")

### Identifiants et Mots de Passe

3. ! Voir à la fin du livrable PDF !
