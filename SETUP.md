# Préparation de l'environnement
1. Installation de Wamp http://wampserver.com/
2. Installation de PEAR https://pear.php.net/manual/en/installation.getting.php
3. Installation de CodeSniffer `pear install PHP_CodeSniffer`
4. Ajout du standard CakePHP à CodeSniffer `vendor/bin/phpcs --config-set installed_paths /path/to/your/app/vendor/cakephp/cakephp-codesniffer`

# Initialisation du site
1. Créer la DB mll_site
2. Créer le compte DB
 - Nom utilisateur : mllAdmin
 - Mot de passe : toto
3. Modifier config/app.php
 - Username : mllAdmin
 - Password : toto
 - Database : mll_site
4. Ouvrir cmd
 - Déplacer le dossier courant : `cd path\to\bin`
 - Lancer la migration : `cake migrations migrate`
5. Ouvrir PHPMyAdmin
 - Atteindre la DB mll_site 
 - Ouvrir l'onglet SQL
 - Glisser populate.sql et lancer l'exécution

#ENGLISH VERSION#

# Setup for your environnement
1. Installation of Wamp http://wampserver.com/
2. Installation of PEAR https://pear.php.net/manual/en/installation.getting.php
3. Installation of CodeSniffer `pear install PHP_CodeSniffer`
4. Installation of the CakePHP's CodeSniffer standard `vendor/bin/phpcs --config-set installed_paths /path/to/your/app/vendor/cakephp/cakephp-codesniffer`

# Initialize the website
1. Create the database mll_site
2. Create the db account
 - Username : mllAdmin
 - Password : toto
3. Change the config/app.php
 - Username : mllAdmin
 - Password : toto
 - Database : mll_site
4. Open cmd
 - Move to the bin folder : `cd path\to\bin`
 - Execute the migration : `cake migrations migrate`
5. Open PHPMyAdmin
 - Go to mll_site DB
 - Open the SQL tab
 - Drag populate.sql into the SQL window and execute
6. Enjoy!



#LINUX#
Autorisation : <br/>
`HTTPDUSER=``ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1` <br/>
`setfacl -R -m u:${HTTPDUSER}:rwx tmp` <br/>
`setfacl -R -d -m u:${HTTPDUSER}:rwx tmp` <br/>
`setfacl -R -m u:${HTTPDUSER}:rwx logs` <br/>
`setfacl -R -d -m u:${HTTPDUSER}:rwx logs` <br/>
