<h1 style="color:red"><u>End of the Year Project</u></h1>
<h2>Class Attendance Management Web Application</h2>

<h4>Local Installation Guide:</h4>
<ol>
    <li>Download & Install WampServer on your computer (https://www.wampserver.com/en/#wampserver-64-bits-php-5-6-25-php-7)</li>
    <li>Download & Install Composer on your computer (https://getcomposer.org/Composer-Setup.exe)</li>
    <li>Download & Install Node.js on your computer (https://nodejs.org/dist/v16.15.1/node-v16.15.1-x64.msi)</li>
    <li>Open WampServer's DocumentRoot directory, usually: "C:\wamp64\www\"</li>
    <li>Download this repository's code and put it in the directory mentioned in step 4</li>
    <li>Open your code editor (preferrably VSCODE) then open the folder where the recently downloaded repository code resides, it should be: "C:\wamp64\www\class_attendance\"</li>
    <li>Start a new terminal in VSCODE and run the command: "composer install"</li>
    <li>Afterwards run the commands "npm install" followed by "npm run dev"</li>
    <li>Open WampServer's "phpmyadmin" page from a browser, then create a new MySQL database titled: "pfa"</li>
    <li>Import into this newly created database, the file named "pfa.sql" which exists at the root folder of this repository</li>
    <li>Open WampServer's "localhost" page from a browser then click on "Add a new virtual host"</li>
    <li>Type "class_attendance" in the first text field, and "c:/wamp64/www/class_attendance" in the second text field then click ok</li>
    <li>Now you should be able to access the locally hosted application from a browser using the urls "http://localhost/class_attendance" or "http://localhost/class_attendance/public/"</li>
    <li>The login credentials for the admin user are email: <b>admin@gmail.com</b> and password: <b>adminadmin</b></li>
</ol>

<hr>

<h1 style="color:red"><u>Projet de fin d'année</u></h1>
<h2>Application Web: Gestion des Absences</h2>

<h4>Les étapes d'installation:</h4>
<ol>
    <li>Installer Wamp Server sur votre machine (https://www.wampserver.com/en/#wampserver-64-bits-php-5-6-25-php-7)</li>
    <li>Installer Composer sur votre machine (https://getcomposer.org/Composer-Setup.exe)</li>
    <li>Installer Node.js sur votre machine (https://nodejs.org/dist/v16.15.1/node-v16.15.1-x64.msi)</li>
    <li>Accéder au répertoire DocumentRoot de fichiers Wamp: "C:\wamp64\www\"</li>
    <li>Télecharger le code de cette repository et mettez le dans le répertoire de l'étape 4</li>
    <li>Ouvrez VSCODE et ouvrir le dossier où réside votre code maintenant ("C:\wamp64\www\class_attendance\")</li>
    <li>Ouvrez un nouveau terminal et lancez la commande "composer install"</li>
    <li>Ouvrez un nouveau terminal et lancez la commande "npm install" puis la commande "npm run dev"</li>
    <li>Accéder à la page "phpmyadmin" depuis un navigateur, apprés créer une nouvelle base de données MySQL intitulée: "pfa"</li>
    <li>Puis importez dans cette base de données, le fichier "pfa.sql" qui existe à la racine du code de cette repository</li>
    <li>Accéder à la page "localhost" depuis un navigateur puis cliquer sur "Add a new virtual host/Ajouter un nouveau hote virtuel"</li>
    <li>Mettez "class_attendance" dans le premier champs, et "c:/wamp64/www/class_attendance" dans le deuxieme champs et cliquer sur OK</li>
    <li>Vous pouvez maintenant accéder à l'application depuis un navigateur avec les liens "http://localhost/class_attendance" ou "http://localhost/class_attendance/public/"</li>
    <li>Email login admin est: <b>admin@gmail.com</b>, mot de passe admin est: <b>adminadmin</b></li>
</ol>
