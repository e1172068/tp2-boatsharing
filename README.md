># TP2 - Boatsharing

## Instructions d'installation
1. Télécharger et décompresser le projet.
2. Copier le contenu dans le répertoire www de wamp. (ajuster cette étape en fonction de l'OS utilisé)
3. Installer localement Composer à la racine du projet.
4. Installer Twig dans le projet avec la commande suivante: `composer require "twig/twig:^2.0"`.
5. À la racine du projet, ajouter un fichier .htaccess avec le contenu suivant: <br>
`RewriteEngine On`<br>
`RewriteCond %{REQUEST_FILENAME} !-d`<br>
`RewriteCond %{REQUEST_FILENAME} !-f`<br>
`RewriteRule ^(.*)$ index.php?url=$1 [L]`
6. Dans le fichier `tp2-boatsharing/library/RequirePage.php`, changer l'url à la ligne 9 pour qu'il corresponde à l'url de votre serveur local.
7. Dans le fichier `tp2-boatsharing/library/Twig.php`, changer l'url à la ligne 7 pour qu'il corresponde à l'url de votre serveur local.
8. Importer la base de données sous le nom de tp2-boatsharing sur PHPMyAdmin ou l'outil préféré et modifier les informations de connexion à la bd pour les vôtres dans le fichier `tp2-boatsharing/model/ModelCRUD.php`
9. Tout devrait être bon!

Version live sur WebDev: https://e1172068.webdev.cmaisonneuve.qc.ca/tp2-boatsharing/index.php <br>
Github: https://github.com/e1172068/tp2-boatsharing
