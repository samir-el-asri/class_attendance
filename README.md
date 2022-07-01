<h1 style="color:red"><u>Projet de fin d'année (EMSI-Tanger 3IIR-G2)</u></h1>
<h2>Application Web: Gestion des Absences</h2>

<h4>Les étapes d'installation:</h4>
<ol>
    <li>Installer Wamp Server sur votre machine (https://www.wampserver.com/en/#wampserver-64-bits-php-5-6-25-php-7)</li>
    <li>Installer Composer sur votre machine (https://getcomposer.org/Composer-Setup.exe)</li>
    <li>Installer Node.js sur votre machine (https://nodejs.org/dist/v16.15.1/node-v16.15.1-x64.msi)</li>
    <li>Accéder au répertoire de fichiers Wamp: "C:\wamp64\www\"</li>
    <li>Télecharger le code de cette repository et le mettre dans le répertoire de l'étape 4</li>
    <li>Ouvrez VSCODE et ouvrir le dossier où réside votre code maintenant ("C:\wamp64\www\pfa\")</li>
    <li>Ouvrez un nouveau terminal et lancez la commande "composer install"</li>
    <li>Ouvrez un nouveau terminal et lancez la commande "npm install" puis la commande "npm run dev"</li>
    <li>Accéder à phpmyadmin, apprés créer une nouvelle base de données intitulée: "pfa"</li>
    <li>Puis importez dans cette base de données, le fichier "pfa.sql" qui existe à la racine du code de cette repository</li>
    <li>Accéder à "localhost" depuis un navigateur puis cliquer sur "Add a new virtual host/Ajouter un nouveau hote virtuel"</li>
    <li>Mettez "pfa" dans le premier champs, et "c:/wamp64/www/pfa" dans le deuxieme champs et cliquer sur OK</li>
    <li>Vous pouvez maintenant accéder à l'application depuis un navigateur avec les liens "http://localhost/pfa" ou "http://localhost/pfa/public/"</li>
    <li>Email login admin est: <b>admin@gmail.com</b>, mot de passe admin est: <b>adminadmin</b></li>
</ol>
