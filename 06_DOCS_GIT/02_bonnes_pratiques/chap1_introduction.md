# Bonnes pratiques

Il faut dès le début du projet appliquer les principes d'organisation du code décrit ci-dessous.

## Conseils de développement

- Vous devez utiliser ce qui existe déjà.

- Développez des extensions là où les besoins sont spécifiques.

- Pas de Framework perso ! Utilisez Django, Symfony, ...

- Utilisez des composants du Framework

- En PHP PEAR (compiler dans votre noyau PHP), ou utilisez des composants tiers.

## Code 

- Votre code doit être bien indenté 

- Nommage des classes : MonNomDeClasse

- Nommage des méthodes : monNomDeMethode

- Nommage des propriétés privées (faculatif) _monNomDeMethode

- Nommage des constantes : MA_CONSTANTE

- Utilisez les namespaces pour structurer vos dossiers/fichiers de classe

- Une classe par fichier.

- Indentation : 2 ou 4 espaces, un saut de ligne pour séparer les blocs logiques de code. Un saut de ligne avant un return.

Vos fichiers ne doivent pas comporter trop de ligne de code, une classe avec 15 à 20 méthodes est vraiment le maximum.

Chaque méthode ne doit pas également comporter trop de lignes de code, 35 à 40 est un maximum.

Vous devez également appliquer les principes SOLID dans tout votre développement. Et séparez les couches logiques de l'application : MVC, par exemple, pas de SQL dans les templates.

## Outils d'analyse de votre code

- **phpcs** analyse les fichiers PHP, Javascript, CSS d'un projet afin de detecter des erreurs dans l'application des standards du PHP. Suivre ces rèles permet une meilleur visibilité du code et la compréhension

- **phpcbf** est un complément de l'outils précédent, il peut parfois détecter plus de violation dans les standards.

Installation dans un projet PHP

```bash
composer require "squizlabs/php_codesniffer=*" --dev
```

Nous allons analyser le projet suivant bonnes_pratiques dans le dossier d'Examples :

```bash
phpcs -p --ignore=*/tests/*,*/data/* src
```

- L'argument p indiquera la progression de l'analyse

- ignore permet comme son nom l'indique d'ignorer des dossiers 

- Enfin on cible le dossier src pour l'analyse

## 01 Exercice Standard12

Pour cet exercice dans VSCODE installez le module PHP Intelephense et définissez, vous pourrez ainsi automatiquement indenter votre code en respectant les standards en vigueur.

Reprenez le projet Standard12 et mettez le code au standard en utilisant la commande suivante :

```bash
vendor/bin/phpcs -p --standard=PSR12 src/
```
