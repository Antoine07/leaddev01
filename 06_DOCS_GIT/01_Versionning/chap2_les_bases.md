# Git aide

Git est décentralisé et distribué.

Les objets de Git: blob, tag, commit, tree

Un commit possède un parent, un ancêtre, Git est un graphe orienté

## Commandes de plomberies

``` bash
find .git\objects\ -type f # objets Git Windows
find .git/objects/ -type f # objets Git Windows

git log 
git cat-file -p 3c65 # décompresse un objet Git

```

## Initialisation d'un dépôt

``` bash

git init # création du dossier .git 
git add . # ajoute tous les fichiers modifiés ou pas encore suivi(s) par Git ATTENTION
git commit -m "first commit"

# Un fichier créé dans le dépôt n'est pas tracké par défaut, il faut l'ajouter à la staging area une première fois

touch readme.md
git add readme.md && git commit -m "ajout readme"

# Une fois tracké le fichier readme, ajout dans la staging area puis commité

git commit -am "modification contenu readme"

``` 

## Règles messages de commit

- un titre de 49 caractères max
- un texte plus long
- on peut commiter avec un titre uniquement option -m

``` bash

git commit -m "étudiant/tp: si terminé, attribuer note"

# Ouvrir l'éditeur et mettre un titre et texte plus long

git commit

```

## Commandes d'aide 

``` bash

git status
git help [commande]
git log 
git oneline # voir alias dans la configuration
git log master..origin/master # voir les différences entre deux branches
git log -5 # 5 derniers commits
git log -p -5 # log avec différence pour chaque commit sur les 5 derniers
git log --stat # stat sur les modifs par commits
git log --since=2.weeks # depuis deux semaines, --until existe également

# Blame qui a fait la modif...

git blame -L 40,60 readme.md # rechercher qui a fait les modifs par ligne -L
git blame --since=3.weeks -- readme.md # depuis 3 semaines avec auteurs des modifications
git blame -L "/^### /" readme.md # recherche avec expression régulière
```

## Tags

taguer un commit, tag de version

``` bash
# Tag annoté
git tag -a v1.0 -m "version 1 de l'application"
# Tag léger peu utilisé
git tag v1

# Etiquetter après coup
git tag -a v1.0.1 -m "version 1.0.1" 9fceb2

# liste les tags
git tag

# liste les tags avec un pattern
git tag -l v1*

# show tag avec information
git show v1.0.0 
```

## Branches

Une branche n'est rien d'autre qu'un pointeur sur commit

``` bash

# voir les réf branch dans le dossier .git
cat .git/refs/heads/main

# création
git branch dev 
# ou git checkout -b dev crée la branche et s'y place

```

Git fait un fast-foward sur la branche master et dev, par exemple quand tous les commits de la branche master sont atteignables depuis la branche dev,
sinon Git fait un commit de merge

``` bash

git checkout master
git merge dev

# Forcer un commit de merge sur un fast-foward

git merge dev --no-ff

# Supprimer une branche 

git branch -d dev

# Voir toutes les branches non mergés

git branch --no-merged

# Forcer la suppression d'une branche, non mergé donc, en perdant le travail dessus:

git branch -D ma_branche

```

## Gestion de conflit

Pour fusionner deux branches Git repère le dernier commit commun entre les deux branches et utilise les modifs des deux branches.

Il analyse trois versions différentes du dépôt:

- version dernier commit
- version de la première branche à fusionner actuelle
- version de la deuxième branche à fusionner actuelle

Il faut résoudre chaque conflit, lorsque deux versions du même fichier ont été modifié aux mêmes endroits.

``` bash
tagtagtag HEAD 
	Music Pi 
tagtagtag
	SONIC 
tagtagtag branchB  

git add . 
git commit # message de merge par défaut

```
On peut avoir plusieurs conflits à gérer dans plusieurs fichiers

## Reset annulation
La commande reset modifie l'historique, **il ne faut jamais le faire sur des commits déjà publiés!**

``` bash
# Annule le dernier commit et met tout dans le WD sans perte
git reset HEAD~ 

# Annule le dernier commit et met tout dans la staging area sans perte
git reset --soft HEAD~

# Annule le dernier commit et supprime les modifications...(DANGER)
git reset --hard HEAD~

# Retire un fichier de la staging area, sans perte de modif
git add [fileName] # ajout dans la staging area
git reset HEAD [fileName] # on retire le fichier de la staging

# Revenir à l'état du commit suivant historique supprimé (DANGER)
git reset f597d47552d 

...

```

Par exemple

```txt
C commit (hash aaa)
|
C commit (hash bbb)
|
C commit (hash ccc)
|
C commit (hash ddd)

git reset bbb

C commit (hash aaa)
|
C commit (hash bbb)
```

L'historique des annulations, modifications sera alors effacé de la mémoire de Git.

## Checkout

### Retour en arrière sans rien changer

On peut déplacer le pointeur sur un autre commit.

``` bash
# Mettre le dépôt tel qu'il était lors du commit f597d47552d, le pointeur se déplace sur le commit
git checkout f597d47552d
# Pour remettre le pointeur sur le dernier commit
git checkout master

```

### Modifier un fichier dans l'historique

``` bash
# Le fichier index.html est stagé (git add index.htm) dans l'état dans lequel il se trouvait pour ce [sha1]
git checkout [sha1] index.html

git commit -m "retour en arrière pour le code dans index.html"

```

#### 01 Exercice Mettre en pratique 

Construire un exemple qui illustre ce dernier principe.

Créez un fichier index.html dans lequel vous écrirez la rectte suivante :

```txt
200g farine
20g Levure de boulanger
2 cuil. à soupe Huile
2 pincées Sel
200g Jambon
150g Mozzarella
1kg Tomates
1 Boîte de purée de tomates
100g Champignons de Paris
10 Olives noires
2 Oignons
2 gousses Ail
Sel
Poivre
```

### Revert

défaire ce qui a été fait, cela peut entrainer des conflits qu'il faudra résoudre

``` bash
# Crée un commit qui annulera ce qui a été fait pour le commit 12916f5
git revert 12916f5

```

Visuellement cela donnera avec un autre exemple :

```txt
C commit (hash aaa)
|
C commit (hash bbb)
|
C commit (hash ccc)  <-- Vous pouvez revenir ici dans l'historique
|
C commit (hash ddd)  <-- Vous pouvez revenir ici dans l'historique
|
C commit revert (hash eee, même état que bbb, annulation des modifications de ccc et de ddd) 

```

## Amend

Dans le cas où on a oublié du code et que l'on vient de faire un commit. Ou que l'on souhaite modifier le dernier message de commit.

Ces actions ne sont valables que si et seulement si vous n'avez pas publié vos modifications.

``` bash

# On ajoute le code qui manquait
vim index.html

git add index.html
git commit --amend # associe les changements au dernier commit, le message du dernier commit s'ouvrira dans l'éditeur par défaut

# Si on souhaite uniquement modifier le message du commit

git commit --amend

```
## Stash (remisé)

Si des fichiers suivis par Git, modifiés mais non commité, sur une branche particulière existent, alors on ne peut pas changer de branche. Cependant, on peut remiser son code sur la branche particulière pour y revenir plus tard.

 ``` bash

 git branch
 master
 dev
 * feature_route
 git stach
 git checkout master
 # correction d'un bug...
 git checkout feature_route
 # liste les stash
 git stash list
 stash@{0}: WIP on master: 01524a bug important 
 stash@{1}: WIP on master: 452ets un test non validé
 # remet le code remisé dans le WD on peut ajouter --index pour le re-stagé si il l'était
 git stash apply
 # ou appliquer un stash particulier
 git stash apply stash@{1}
 # supprime le stash
 git stash drop 

 ```

### 02 Exercice

Reprennez la recette de la pizza ci-dessus, et illustrer les deux derniers principes que nous venons de décrire.

## Rebase

S'applique sur un historique non publié, bien sûr... Il permet de linéariser l'historique. Toute modification de l'historique ne peut être faite que localement avant publication.

![alt tag](https://github.com/Antoine07/demo_git/blob/master/images/rebase.png)

- il faut pour mettre les commits C1 et C2 à la suite du master rebaser sur la branche sidebar ci-dessus

``` bash
git checkout sidebar 
git rebase master 
# puis on merge, fast-foward naturellement, gestion de conflits
git merge sidebar
# et on supprime la branche
git branch -d sidebar

```
![alt tag](https://github.com/Antoine07/demo_git/blob/master/images/rebaseF.png)

- on peut également utiliser le mode rebasage interactif pour fusionner des commits

``` bash
...
git rebase -i master
# dans le message du commit, si on choisit pick et squash on peut fusionner deux commits
pick fb09e82 sidebar ajouté 
squash  37f886  menu nav dans sidebar
...

```
![alt tag](https://github.com/Antoine07/demo_git/blob/master/images/rebaseFu.png)

## cherry-pick

But: récupérer un commit sur une branche que l'on ne souhaite pas garder sur celle-ci, avant suppression de la branche en question.

``` bash

git checkout master
git cherry-pick [sha1] # provenant de la branche feature_test
# Après conflit éventuel, on supprime la branche du commit cherry-pické
git branch -D feature_test

```
Rappel: un rebasage est un cherry-pick automatisé

Notez que dans l'historique vous pouvez revenir en arrière et retrouver la branche supprimer. 

Voici les étapes dans ce cas à réaliser :

```bash
git reflog
git checkout [sha1]
git checkout -b [branchname]
# Ou en une seule ligne
git checkout -b <branch> [sha1]
```

## Remote

## Ajouter une branche distante

Ajouter une branche distante (remote) dans son dépôt local

``` bash
git remote add [nom_court] [url]
``` 
### Commandes remotes

``` bash

# Branches distantes
git remote -v

# Toutes les branches

git branch -a

# Respectivement supprimer, renommer un remote

git remote rm origin

git remote rename origin dev 

# Fetch récupérer la branche distante localement sans fusion avec sa branche master

git fetch origin

# Comparer les différences entre master local et distant (après un fetch)

git log master..origin/master

# git pull équivalent à git fetch + git merge

git fetch origin
git merge origin/master

```
## Bisect

trouver le commit responsable d'un bug, méthode dichotomique

``` bash

# Rechercher un commit à partir duquel on a pas de bug, noter le sha1
git checkout [sha1]

git checkout master

# Démarrer le bisectage
git bisect start

# Si la version courante est buguée
git bisect bad

# Version non buguée
git bisect good [sha1]

# L'algo de bisectage commence
bisecting ...
[sha1]

# Si version pour ce sha1 est encore bugué
git bisect bad
bisecting ...
[sha1]

# Si encore bugué ...
git bisect bad

# Si non bugué ...
git bisect good

etc...

# Si git n'a plus de révision à tester, il arrive à la fin de la bisection et il propose un commit
git show [sha1] # pour voir le problème...

# Puis on arrête le bisectage
git bisect reset

# On fait un revert sur le sha1 trouvé, on corrige les conflits et le bug si besoin
git revert [sha1]

```

### 03 Exercice bissect

Soit le code suivant dans un fichier index.js, faites quelques changement et introduisez un bug dans l'arbre des commits. Puis essayez d'illustrer le principe que nous venons de voir.

```js

console.log("Bonjour tout le monde");

```

## Workflow

### initialisation du dépôt

organisation

- pour utiliser Gitflow il faut deux branches permanentes: master et dev

- les branches feature, release et hotfixe sont dites éphémères

- les branches hotfixe et release sont mergées dans la branche master et dev

- la branche feature est mergée uniquement dans la branche dev

- les hotfixes sont taguées avec le deuxième chiffre Y de version X.Y, exemple tag 0.2 

- les releases sont taguées avec le premier chiffre X de version X.Y, exemple tag 1.0

- si on a une release et que l'on fait une nouvelle feature => merge dans dev et feature

- Initialisation du projet
``` bash

git init
# Exécute une commande sans effet --dry-run, liste les fichiers stagés
git add --all --dry-run > list.txt
rm list.txt
touch .gitignore
touch README.md
git commit -m "C1: ajout du projet"
git tag v1.0.0

```
- Création de la branche dev

``` bash

git checkout -b dev
# Création d'un commit vide --allow-empty
git commit -m "C2: branche dev" --allow-empty

```
- envoie des deux branches, master et dev, créées sur le dépôt commits avec les réfs (option -u)

les refs envoient les pointeurs sur branche

``` bash
# Option -u commits + réfs
git push -u --all

```
### création d'une feature

- Exemple de développement d'une feature, par Simon

``` bash

git pull --all
# vérification de l'import des branches distantes
git branch -a
* master
remotes/origin/HEAD -> origin/master
remotes/origin/dev
remotes/origin/master
```
#### création de la branche dev

attention, la branche dev n'est pas automatiquement créée, vous devez faire:

``` bash

git checkout remotes/origin/dev
git checkout -b dev

```
- Création d'une feature à partir de la branch dev

``` bash
git branch
master
*dev
git checkout -b feature_routes
# commit pour prévenir que l'on fait une nouvelle feature
git commit -m "feature: task route" --allow-empty

git push -u origin feature_routes

```
- Fin de la feature, Simon doit commiter

``` bash

git pull --all
git add .
git commit -m "feature: task mise en place des routes app"
git push -u --all

```
- Revu de code par Antoine
Si tout marche bien, Antoine va merger la nouvelle feature dans la branche dev

``` bash

git pull --all
git merge --no-ff feature_routes -m "feature: task route terminée -> branch dev"
git push -u origin dev

```
- Suppression de la branche feature_routes par Simon

``` bash

git pull --all
git branch -d feature_routes
# attention pour supprimer une branche distante bien mettre :
git push origin :feature_routes

```
- Création de la branche de version par Lead_Antoine, elle n'acceptera plus que des correctifs

``` bash

git pull --all
git checkout dev
git checkout -b release-v1.0
git commit --allow-empty -m "Release-v1.0"
git push -u origin release-v1.0

```

- Intégration, par Lead_Antoine, de la release dans la branche master et dev

``` bash

git pull --all
git checkout master
git merge --no-ff release-v1.0 -m "version master stable v1.0"
git push 
# création du tag release
git tag v1.0
# publication des tags sur le serveur
git push --tags
git checkout master
git merge --no-ff release-v1.0 -m "version dev stable v1.0"
git push 
# suppression de la branche release
git branch -d release-v1.0
git push origin :release-v1.0

```

### correction d'un bug sur la branche master, hotfixe

correction du "bugname" par Antoine

``` bash
git pull --all
git checkout master
git checkout -b hotfix_bugname
# fin de la correction du bug
git add --all
git commit -m "Fix: bugname"
# option -u pour publié toutes les refs
git push -u origin hotfix_bugname

```
Lead_Antoine fait la revu du code et intégre le correctif à la branche master

``` bash
git checkout master
git pull --all
git checkout remotes/origin/hotfix_bugname
git checkout -b hotfix_bugname
git merge --no-ff hotfix_bugname
git push
# tag pour le correctif
git tag v1.0.1
git push --tags
# mettre à jour la branche dev
git checkout dev
git merge --no-ff hotfix_bugname
git push -u origin dev
# suppression de la branche hotfix
git branch -d hotfix_bugname
git push origin :hotfix_bugname
```
