# Tests fonctionnels

Nous allons utiliser Behat, il permet de tester le comportement d'une application.

Ce framework de tests fonctionnels permet, à partir de l'écriture de scénarios écrit, de tester des comportements spécifiques de l'application. Ces tests pourront également être utilisés avec les tests unitaires.

Ces scénarios sont basés sur la syntaxe **Gherkin** qui permet de les définir. Le scénario est à écrire en Anglais ou Français, une fois le scénario analysé par Behat il sera transcrit en code PHP que vous devrez compléter pour réaliser les tests.

```text
Feature: Product basket
  In order to buy products
  As a customer
  I need to be able to put interesting products into a basket
```

Ce scénario est un peu moins précis que le suivant :

```text
Feature: Product basket
  In order to buy products
  As a customer
  I need to be able to put interesting products into a basket

  Rules:
  - VAT is 20%
  - Delivery for basket under £10 is £3
  - Delivery for basket over £10 is £2
```

Ce dernier scénario n'est pas encore très précis, nous allons utiliser des mots clés du Framework pour le préciser. 

```text
Scenario: Some description of the scenario
  Given some context
  When some event
  Then outcome
```

Le principe du test fonctionnel avec Behat est que si le test échoue, alors on lévera une Exception, dans le cas contraire le test est valide.

Les Fonctionnalités de Behat sont composées d'étapes, c'est-à-dire `Etant donné`_, `Quand`_ and `Alors`_.

Behat ne distingue pas techniquement ces trois types d'étapes. Cependant, vous devez le faire. Ces mot-clefs ont été choisis avec soin.

Robert C. Martin a écrit sur les concepts "Etant donné - Quand - Alors" du BDD, dans lequel il les pense comme un Automate fini (concept théorique en programmation).

Une documentation assez complète sur le langage Gherkin se trouve ici : [https://github.com/Behat/fr-docs.behat.org/blob/master/guides/1.gherkin.rst](https://github.com/Behat/fr-docs.behat.org/blob/master/guides/1.gherkin.rst).

## 01 Exercice Message

Nous allons créer un projet et écrire un premier scénario.

Nous voulons testez avec Behat le comportement de notre classe Message, elle doit répondre aux spécificités suivantes :

- Si je définit un message "message".
- Et que j'affiche se message alors il s'affichera en majuscule.

- Si je met un nombre une exception sera alors levée.

Dans le dossier Exercice du chapitre 04_BDD créez le dossier 01_Exercice_Message puis initialisé le projet.

```bash
composer init
composer require --dev behat/behat
# Behat se trouve dans le dossier bin
vendor/bin/behat -V
```

Vous devez maintenant initialiser un projet avec Behat :

```bash
vendor/bin/behat --init
```

Vous devriez avoir maintenant la structure de projet suivante dans votre dossier. 

```text
01_Exercice_Message/
    features/
        bootstrap/
            FeatureContext.php
    src/
    composer.json
    vendor/
    .gitignore
```

Créez le fichier **message.feature** dans le dossier **features** dans lequel vous écrirez votre scénario. Il faut comme avec les tests unitaires en TDD faire les tests avant de créer les méthodes dans la classe. 

Votre structure de dossier devrait maintenant ressembler à :

```text
01_Exercice_Message/
    features/
        bootstrap/
            FeatureContext.php
        message.feature
    src/
    composer.json
    vendor/
    .gitignore
```

Une fois votre scénario écrit tapez la commande Behat suivante, elle vous donnera l'ensemble des mots clés utilisés dans vos tests.

```bash
vendor/bin/behat -dl
```

Remarque:vous pouvez écrire vous scénario en français :

```text
# language: fr
Fonctionnalité: ma super classe Message
  Afin de gérer des messages simples en majuscule
  En tant que utilisateur
  Je dois être capable d'effectuer des opérations basique avec ma classe

Scénario: Avoir un message valide
    Etant donné que j'ai un nouveau message "bonjour tout le monde"
    Alors je dois avoir "BONJOUR TOUT LE MONDE"

Scénario: Avoir un message non valide
    Etant donné que j'ai un nouveau message "17"
    Alors je dois avoir une exception "InvalidArgumentException"
```

La commande suivante va gérer le code que vous devez copier et coller dans votre classe FeatureContext, puis vous devez valider chaque méthode pour valider le scénario. On vous rappelle que si une exception est levée alors le test a échoué.


## PHPUnit et Behat

Vous pouvez également utiliser le framework de tests unitaires phpunit avec Behat dans ce cas vous devez installer cette dépendance de votre projet comme suit :

```bash
composer require phpunit/phpunit --dev
```

Puis vous devez importer celle-ci dans la classe de Feature :

```php
use PHPUnit\Framework\Assert;
```

Et utilisez les assertions de la manière suivante à la place des exceptions classiques de Behat.

```php
Assert::assertTrue(true);
```

## 02 Exercice Calculator

Faites maintenant l'exercice suivant, nous aimerions tester le fonctionnement d'une calculatrice qui fait la somme de deux nombres et qui mémorise le résultat. Cette calculatrice possède les méthodes suivantes. La méthode add retourne également le résultat de l'addition et le mémorise.
- add
- getMemory
- reset

Cette calculatrice ne pourra pas mémoriser un résultat inférieur à 200, dans ce cas une exception sera levé. Créez une exception spéciale dans ce cas dans votre application :

```php
namespace App;

use Exception, Throwable;

class MemoryException extends Exception
{
  public function __construct($message, $code = 0, Throwable $previous = null) {
    parent::__construct($message, $code, $previous);
  }

  public function __toString() {
    return "{$this->message}\n";
  }
}
```

## Tests fonctionnels avec navigateur

Pour cette partie nous allons utiliser Symfony

1. Installez le projet Bar avec la CLI de SF

2. Installez les bundles suivants permettant de faire de l'injection de dépendance, d'avoir une page Web et du contenus.

```bash
composer require sensio/framework-extra-bundle
composer require twig
composer require doctrine/annotations
# ORM Doctrine
composer require symfony/orm-pack
# Makers de Doctrine
composer require --dev symfony/maker-bundle

# Insertion de données
composer require --dev doctrine/doctrine-fixtures-bundle

# Donnez d'exemple
composer require --dev fakerphp/faker
```

Dans le fichier .env décommenté la ligne suivante en renommant la base de données 

```text
DATABASE_URL="sqlite:///%kernel.project_dir%/var/bar.db"

php bin/console doctrine:database:create
```

## Installation des tests unitaires

```bash
symfony composer req phpunit --dev

# Création de la classe de tests
 symfony console make:test TestCase SpamCheckerTest

# Lancement des tests 
symfony php bin/phpunit
```

## Tests fonctionels

Une commande SF pour créer le test fonctionnel pour le contrôleur que nous avons créé.

```bash
symfony console make:test WebTestCase Controller\\BeerController
```
