[ENGLISH VERSION](#english)

Les contributions externes sont les bienvenues !

# Avant de réaliser...
1. Vérifiez que vous avez [un compte Github](https://github.com/signup/free)
2. Créez votre _issue_ si elle n'existe pas
    * Vérifiez que vous avez la dernière version du code
    * Décrivez clairement votre problème, avec toutes les étapes pour le reproduire

3. **Attribuez-vous** votre _issue_. C'est important pour éviter de se marcher dessus. Si vous n'êtes pas dans l'organisation et donc que vous ne pouvez pas vous attribuer directement l'_issue_, il vous suffit d'ajouter un commentaire clair dans celle-ci (comme _"Je prends"_), et elle sera marquée comme "In progress").
4. _Forkez_ le dépôt

# Contribuer au site
1. Créez une branche pour contenir votre travail
2. Faites vos modifications
3. Ajoutez un test pour votre modification. Seules les modifications de documentation et les réusinages n'ont pas besoin de nouveaux tests
4. Assurez-vous que l'intégralité des tests passent
5. Assurez-vous que le code suit les [conventions de CakePHP](http://book.cakephp.org/3.0/fr/intro/conventions.html)
 - `phpcs --standard=CakePHP /chemin/vers/code/monFichier.inc`
6. Assurez-vous que le code suit le [standard de PEAR](https://pear.php.net/manual/fr/standards.php)
 - `phpcs /chemin/vers/code/monFichier.inc`
7. Assurez-vous que le test suit la [convention test de CakePHP](http://book.cakephp.org/3.0/en/development/testing.html)
8. Si votre travail nécessite des actions spécifiques lors du déploiement, précisez-les dans le fichier [update.md](update.md).
9. Poussez votre travail et faites une _pull request_

# Quelques bonnes pratiques
* Le code et les commentaires sont en anglais
* Le _workflow_ Git utilisé est le [Git flow](http://nvie.com/posts/a-successful-git-branching-model/). En détail :
    * Les arrivées fonctionnalités et corrections de gros bugs hors release se font via des PR.
    * Ces PR sont unitaires. Aucune PR qui corrige plusieurs problèmes ou apporte plusieurs fonctionnalité ne sera accepté ; la règle est : une fonctionnalité ou une correction = une PR.
    * Ces PR sont mergées dans la branche `dev` (appelée `develop` dans le git flow standard), après une QA légère.
    * Pensez à préfixer vos branches selon l'objet de votre PR : `hotfix-XXX`, `feature-XXX`, etc.
    * La branche `prod` (appelée `master` dans le git flow standard) contient exclusivement le code en production, pas la peine d'essayer de faire le moindre _commit_ dessus !

* Votre test doit échouer sans votre modification, et réussir avec
* Faites des messages de _commit_ clairs
* Il n'y a aucune chance que votre _pull request_ soit acceptée sans son test associé

# Les bonnes pratiques pour les PR et les commits
## Les Pull-Requests
* Lors de l'ouverture d'une PR, respectez le template suivant :

    ```markdown
    | Q                             | R
    | ----------------------------- | -------------------------------------------
    | Correction de bugs ?          | [oui|non]
    | Nouvelle Fonctionnalité ?     | [oui|non]
    | Tickets (_issues_) concernés  | [Liste de tickets séparés par des virgules]
    ```
* Ajoutez des notes de QA (Quality Assurance). Ces notes doivent permettent à un testeur de comprendre ce que vous avez modifié, ce qu'il faut tester en priorité et les pièges auxquels il doit s'attendre et donc sur lesquels porter une attention particulière. Précisez tout particulièrement s'il est nécessaire d'effectuer une action de gestion préalable.

## Les commits
* Pour les commits, nous suivons le même ordre d'idée des standards Git, à savoir :
    * La première ligne du commit ne doit pas faire plus de 50 caractères
    * Si besoin, complétez votre commit via des commentaires, en respectant une limite de 70 caractères par ligne
    * Vous pouvez également (c'est d'ailleurs conseillé) de référencer l'_issue_ que vous fixez
    * Un commit doit être atomique ; il fixe / implémente **une** chose et le fait **bien**

* Essayez d'éviter les commits dits inutiles (`fix previous commit`, ...). Si vous en avez dans votre pull-request,
  on vous demandera probablement de faire un `squash` de vos commits.

N'hésitez pas à demander de l'aide, et bon courage !

============================================
<a name="english"></a> ENGLISH

External contributions are welcome!

# Before jumping into the project
1. Verify that you have a [Github account](https://github.com/signup/free)
2. Create your _issue_ if it does not exist
    * Make sure you have the latest project version
    * Describe clearly your problem and the sequence to reproduce it

3. **Flag yourself** on the _issue_. It is important for a good work flow. If you are not aprt of the organisation, thus can't flag yourself on the _issue_, you just need to add _"Working on it"_ and the _issue_ will mark as "In progress".

4. _Fork_ the repo

# Contribute to the website
1. Create a branch
2. Work on it
3. Test your code!. Only documentation and refactoring modifications does not need to have new tests.
4. Make sure the tests are sucessful
5. Make sure the code follow [CakePHP convention](http://book.cakephp.org/3.0/en/intro/conventions.html)
 - `phpcs --standard=CakePHP /chemin/vers/code/monFichier.inc`
6. Make sure the code follow [PEAR code standard](https://pear.php.net/manual/en/standards.php)
 - `phpcs /path/to/code/myfile.inc`
7. Make sure the test follow [CakePHP test convention](http://book.cakephp.org/3.0/en/development/testing.html)
8. If your work need specific tasks for deployment, make sure to notify it in [update.md](update.md).
9. Push and create a _pull request_

# Good practices
* Code and comments are in english
* Follow [Git _workflow_ ](http://nvie.com/posts/a-successful-git-branching-model/).
    * Functionnality and big bugs are made via Pull Requests
    * One bug/fucntionnality per pull requests, no exception!
    * Those pull requests are merged into the `dev` branch (Git flow : `develop` branch)
    * Name the branch based on the modification : `hotfix-XXX`, `feature-XXX`, etc.
    * The branch `prod` (Git flow : `master` branch)  contains the production code. Do not try to _commit_ on this branch !

* Your test must fail before your modification and pass with it
* Make thorough _commit_ comment
* No test, no _pull request_

# Good practices : Pull Request/commit
## Pull-Requests
* PR template :

    ```markdown
    | Q                             | R
    | ----------------------------- | -------------------------------------------
    | Bug fix ?                     | [yes|no]
    | New functionnality ?          | [yes|no]
    | Tickets (_issues_) reference  | [List of ticket seprated by ;]
    ```
* Add QA comments. Those comments help to comprehend what have been modified, what must be tested and the more risky part of the code. Make sure to comment if a setup is needed beforehand.

## Commits
* For commits, we follow the Git philosophy :
    * The first line must not be more than 50 caracters
    * If needed, complete your commit by adding comments (maximum of 70 characters per following lines)
    * Reference the _issue_ associated with the fix
    * One fix , and one good fix only, per commit (atomic)

* Make sure your pull request does not have any useless commits E.G (`fix previous commit`, ...). If you have any, squash it.

Dont hesitate to ask for help, good luck!
