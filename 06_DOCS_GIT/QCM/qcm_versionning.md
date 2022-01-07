# QCM

## Question 01

Lorsque vous installez Git sur votre machine personnelle que devez faire avant de commencer à travailler avec Git ?

Répondez en choisissant une/des seules et bonne(s) réponse(s) ci-dessous.

[ ] Nommez mes dossiers Git (versionné) "myDoc.git" avec l'extension ".git"

[ ] Après l'installation de Git rien n'est nécessaire pour commencer à travailler.

[ ] Renseignez Git sur mon identité avec les commandes suivantes

```bash
git config --global user.name Tony 
git config --global user.email tony@tony.fr
```

[ ] Renseignez Git sur mon identité, dans le dossier versionné, avec les commandes suivantes

```bash
git config --local user.name Tony 
git config --local user.email tony@tony.fr
```

## Question 02

Comment définissez-vous, de manière globale, l'alias "changes" dans Git faisant un **git diff --name-status**

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] 1

```bash
git config --global changes "diff --name-status"
```

[ ] 2

```bash
git config-global alias "changes: diff --name-status"
```

[ ] 3

```bash
git config --global alias.changes "diff --name-status"
```

[ ] 4

```bash
git --global alias.changes "diff --name-status"
```

## Question 03

Comment s'appelle le dossier historique de Git dans un dépôt ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] save

[ ] .save

[ ] git

[ ] .git

[ ] save-git


## Question 04

Quand pouvez-vous, même si ce n'est pas recommandé d'écrire des commits courts, écrire la commande suivante, raccourci de deux commandes pour créer un commit ?

```bash
git commit -am "modification contenu readme"
```

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] N'importe quand même pour un fichier nouveau (untracked)

[ ] Une fois le fichier tracké par Git

## Question 05

Quelle est la règle pour écrire un commit dans un projet ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] un commentaire sans titre assez long avec la commande git commit (ouverture d'un éditeur dans la console)

[ ] Un texte court dans un commit rapide avec la commande git commit -m "message"

[ ] Un titre 49 caractères max et un texte plus long avec la commande git commit (ouverture d'un éditeur dans la console)

## Question 06

Que fait la commande git suivante ?

```bash
git log main..origin/main
```

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] La différence entre les deux derniers commits

[ ] La différence entre les deux plus anciers commits

[ ] La différence entre les commits de la branche locale et la branch distante récupérer avec un pull

[ ] La différence entre les commits de la branche locale et la branch distante récupérer avec un fetch

## Question 07

Que fait la commande git suivante ?

```bash
git log --since=2.weeks 
```

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] Affiche les logs à partir de deux semaines jusqu'au début first commit

[ ] Affiche les logs depuis deux semaines.

## Question 08

Comment retrouvez le développeur qui a produit un bug dans le fichier app.php dans le dernier commit entre la ligne 10 et 60.

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] 1

```bash
git blame -L 10,60 
```

[ ] 2

```bash
git blame -L 10,60 app.php
```

[ ] 3

```bash
git blame 
```

[ ] 4

```bash
git blame app.php
```

## Question 09

Comment retrouvez le développeur qui a produit un bug dans le fichier app.php dans le dernier commit entre la ligne 10 et 60 il y a 3 semaines ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] 1

```bash
git blame -L 10,60 app.php
```

[ ] 2

```bash
```

[ ] 3

```bash
git blame --until=3.weeks -- app.php

```

[ ] 4

```bash
git blame < 3.weeks -- app.php
```

## Question 10

Quand verifiez-vous un tag dans votre historique Git ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] A chaque fois que j'ai fait un commit.

[ ] lorsqu'on merge dans main la branche dev 

[ ] Lorsqu'on rencontre un bug.

## Question 11

Qu'est-ce qu'une branhce ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] C'est un fichier physique.

[ ] C'est un pointeur sur commit.

[ ] C'est un commit.

## Question 12

Quand Git fait un fast-foward de la branche pour un merge de dev dans main?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] Quand tous les commits de la branche main sont atteignables depuis la branche dev.

[ ] Quand des commits dans main ont avencé par rapport à dev.

## Question 13

Que fait la commande suivante pour un fichier donné ici category.html ?

```bash
git restore category.html
```

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] Marche si le fichier est modifié dans le WD : efface les modifications et garde ce dernier dans le WD.

[ ] Marche si le fichier est dans la staging : efface les modifications et met ce dernier dans le WD.

[ ] Marche si le fichier est commité : garde les modifications et met ce dernier dans la staging.

[ ] Marche si le fichier est dans la staging : remet le fichier dans le WD sans perte des modifications.

## Question 14

Que fait la commande suivante pour un fichier donné ici category.html ?

```bash
git restore --staged category.html
```

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] Marche si le fichier est modifié dans le WD : efface les modifications et garde ce dernier dans le WD.

[ ] Marche si le fichier est dans la staging : efface les modifications et met ce dernier dans le WD.

[ ] Marche si le fichier est commité : garde les modifications et met ce dernier dans la staging.

[ ] Marche si le fichier est dans la staging : remet le fichier dans le WD sans perte des modifications.

## Question 15

Que fait la commande suivante par rapport aux commits aaa, bbb, ccc et ddd ci-après ?

```txt
C commit (hash aaa)
|
C commit (hash bbb)
|
C commit (hash ccc)  
|
C commit (hash ddd)  
```

Commande revert sur le commit bbb

``` bash
git revert bbb
```

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] 1 

```txt
C commit (hash aaa)
|
C commit (hash bbb)
|
C commit (hash ccc)  
|
C commit (hash ddd)  
|
C commit revert (hash eee, fusionne les commits ccc et ddd dans le commit eee ) 
```

[ ] 2 Il y a cependant dans la solution ci-dessous possiblement des conflits

```txt
C commit (hash aaa)
|
C commit (hash bbb)
|
C commit (hash ccc)  
|
C commit (hash ddd) 
|
C commit revert (hash eee, même état que bbb, annulation des modifications de ccc et de ddd) 
```

[ ] 3 Il y a cependant dans la solution ci-dessous aucun conflits possibles

```txt
C commit (hash aaa)
|
C commit (hash bbb)
|
C commit (hash ccc) 
|
C commit (hash ddd)  
|
C commit revert (hash eee, même état que bbb, annulation des modifications de ccc et de ddd) 
```

## Question 16 

Que fait la commande amend de Git ?

Répondez en choisissant une/des bonne(s) réponse(s) ci-dessous.

[ ]  Permet de changer le dernier message de commit avant publication.

[ ]  Permet de changer le dernier message de commit après publication.

[ ]  Permet d'associer des modifications d'un fichier au dernier commit.

[ ]  Permet de supprimer le dernier message de commit avant publication.

## Question 16 

A quoi sert la commande stash de Git ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ]  A supprimer des branches distantes

[ ]  A supprimer une branche locale

[ ]  A sortir d'une branche non clean pour aller sur autre branche

[ ]   A sortir d'une branche distante pour aller sur une branche locale.

## Question 17

A quoi sert la commande rebase de Git ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ]  Elle sert à créer des branches supplémentaires.

[ ]  Elle sert merger plusieurs branches à la fois

[ ]  Elle sert à linéariser un historique.

[ ] Elle permet d'ajouter des commits de merge oubliés.

## Question 18

A quoi sert la commande cherry-pick de Git ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ]  Elle sert cloner un commit.

[ ]  Elle sert rechercher un commit distant.

[ ]  Elle sert à récupérer un commit sur une autre branche que l'on souhaite supprimer.

[ ] Elle sert à permuter des commits sur une autre branche que l'on souhaite garder.

## Question 19 

A quoi sert la commande bisect de Git ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ]  Elle sert supprimer un commit par dichotomie.

[ ]  Elle sert trouver un commit par dichotomie qui produit un bug dans l'application.

[ ]  Elle sert supprimer un commit par dichotomie qui produit un bug dans l'application.

## Question 20

A quoi sert la commande remote de Git ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ]  Elle permet de cloner un dépôt distant.

[ ]  Elle permet trouver une branche distante.

[ ]  Elle permet d'ajotuer une branche distante (remote) dans son dépôt local


## 01 Exericice GitFlow

Créez votre propre GitFlow en explicitant chacune des méthodes et conventions que vous mettriez en palce pour travailler en équipe.

## 02 Exercice Yam

Créez une classe qui permet de lancer 5 dés à 6 faces, et de calculer respectivement, pour le jeu de Yam, les pourcentages d'obtenir (simulation) :

1. Un Yam exemple : 1, 1, 1, 1, 1

2. Un carré. 1, 1 , 1, 1, ... (4 dés identiques, le reste n'importe quoi mais différent de 1 dans l'exemple)

3. Un brelan de 1, 1, 1, ... (trois dés identiques, le reste n'importe mais différent de 1 dans exemple)

*Pour vérifier de manière empirique ces probabilités lancer répéter un grand nombre de fois l'expérience.*

Faites 5 méthodes, respectivement, pour simuler un lancer de 5 dés à 6 faces, une méthode pour calculer les Yams, carrés et les brelans. Avec une méthode run pour lancer la simulation.
Créez deux branches dev et main. Chaque commit doit être parfaitement écrit en respectant les conventions du cours. Produisez la documentation PHPDoc de la classe correctement identée.
