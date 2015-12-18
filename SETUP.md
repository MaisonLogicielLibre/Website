# FRENCH VERSION
## Préparation de l'environnement
1. Installation de [Wamp](http://wampserver.com/)
2. Installation de [composer](https://getcomposer.org/doc/01-basic-usage.md)
3. Installer les dépendances avec [composer](https://getcomposer.org/doc/00-intro.md)
4. Ajout du standard CakePHP à CodeSniffer `vendor/bin/phpcs --config-set installed_paths /path/to/your/app/vendor/cakephp/cakephp-codesniffer`

## Initialisation du site
1. Créer la DB mll_site
2. Créer le compte DB
 - Nom utilisateur : mllAdmin
 - Mot de passe : toto
3. Lancer les migrations de la Base de Donnée
 - Ouvrir un terminal ou l'invite de commande sous Windows
 - Déplacer le dossier courant : `cd path\to\bin`
 - Lancer la migration : `cake migrations migrate`
4. Ouvrir PHPMyAdmin
 - Atteindre la DB mll_site 
 - Ouvrir l'onglet SQL
 - Glisser populate.sql et lancer l'exécution

**Attention** Lors de la premiere visite du site web, un délai est causé par la compilation de less
 
## LINUX
Autorisation : <br/>
`HTTPDUSER=``ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1` <br/>
`setfacl -R -m u:${HTTPDUSER}:rwx tmp` <br/>
`setfacl -R -d -m u:${HTTPDUSER}:rwx tmp` <br/>
`setfacl -R -m u:${HTTPDUSER}:rwx logs` <br/>
`setfacl -R -d -m u:${HTTPDUSER}:rwx logs` <br/>


#ENGLISH VERSION

## Setup for your environnement
1. Installation of [Wamp](http://wampserver.com/)
2. Installation of [composer](https://getcomposer.org/doc/01-basic-usage.md)
3. Installation of dependencies with [composer](https://getcomposer.org/doc/00-intro.md)
4. Installation of CakePHP standard on CodeSniffer `vendor/bin/phpcs --config-set installed_paths /path/to/your/app/vendor/cakephp/cakephp-codesniffer`

## Initialize the website
1. Create the database mll_site
2. Create the db account
 - Username : mllAdmin
 - Password : toto
3. Launch migrations of the DB
 - Open a terminal (cmd on windows)
 - Move to the bin folder : `cd path\to\bin`
 - Execute the migration : `cake migrations migrate`
4. Open PHPMyAdmin
 - Go to mll_site DB
 - Open the SQL tab
 - Drag populate.sql into the SQL window and execute

**Warning** The first time you visit the web site, a delay is caused by less

##LINUX##
Autorisation : <br/>
`HTTPDUSER=``ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1` <br/>
`setfacl -R -m u:${HTTPDUSER}:rwx tmp` <br/>
`setfacl -R -d -m u:${HTTPDUSER}:rwx tmp` <br/>
`setfacl -R -m u:${HTTPDUSER}:rwx logs` <br/>
`setfacl -R -d -m u:${HTTPDUSER}:rwx logs` <br/>
