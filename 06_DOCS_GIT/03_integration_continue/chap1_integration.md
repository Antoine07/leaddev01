# Intégration continue

## Définition

L'intégration continue est un ensemble de pratiques utilisées en génie logiciel, consistant à vérifier, à chaque modification de code source que le résultat des modifications ne produit pas de régression dans l'application développée.

C'est un ensemble de pratiques utilisées en génie logiciel

- Le principe est de tester son code en continue

## Travis

Cette solution nécessite la création d'un compte, avec CB même gratuit, nous ne l'utiliserons pas dans notre cas.

## 01 Exercice GitHub (recherche)

### Contraintes d'organisation

Nous pouvons parfaitement créer une action dans Github pour faire de l'intégration continue. Nous allons découvrir ce principe à travers un TP guidé, à chaque fois que vous pusherez une feature les tests s'exécuterons sur Github, un mail vous sera alors envoyé pour vous avertir de l'issu des tests, vous pouvez cependant dans Github visualiser l'avencement des tests.

Créez un dépôt spécifique pour le projet Titanic, nous allons développer une petite application qui propose un formulaire pour connaître le nombre de survivant(s) en fonction du sex et de la classe. Développez un formulaire.

### Proposition pour démarrer 

Vous utiliserez le squelette d'application qui est proposée pour commencer le projet dans le dossier Exercices sur le dépôt. Nous utilisons dans ce projet twig pour l'affichage du projet.

Allez sur Github dans votre dépôt et cliquez sur l'onglet Action, puis créez, une nouvelle action Github pour PHP le fichier php.yml suivant pour commencer le projet

```yml
name: PHP Titanic

on: [push]

jobs:
  build-test:
    runs-on: ubuntu-latest

    steps:
    - uses: actions/checkout@v2
    - uses: php-actions/composer@v5 # or alternative dependency management
    - uses: php-actions/phpunit@v3
```

- on : lorsque l'action push se fera sur votre dépôt le build s'exécutera et vos tests s'effectueront

- actions/checkout@v2 utilise le protocole ssh, n'exécute que le dernier commit, voyez le détails ici : [checkout](https://github.com/actions/checkout
)

- php-actions/composer@v5 installera les dépendances de votre projet

- php-actions/phpunit@v3  lancera les tests avec phpunit
