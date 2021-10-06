# Tests fonctionnels

Nous allons utiliser Behat, il permet de tester le comportement d'une application.

Ce framework de tests fonctionnels permet, à partir de l'écriture de scénario écrit, de tester des comportements spécifiques de l'application.

Ces scénarios sont basés sur la syntaxe **Gherkin** qui permet de les définir. Le scénario est à écrire en Anglais :

```text
Feature: Product basket
  In order to buy products
  As a customer
  I need to be able to put interesting products into a basket
```

Un autre scénario de commande de produit serait 

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

Cependant ces scénarios ne sont pas assez structurés pour valider un comportement spécifique. La syntaxe nous allons utiliser des mots clés qui vont définir ce que l'on attend comme comportement.

```text
Scenario: Some description of the scenario
  Given some context
  When some event
  Then outcome
```
## Exemple

Nous allons créer un projet et écrire un premier test.

Dans le dossier Examples créez le dossier FirstScenario puis initialisé le projet.

```bash
composer require --dev behat/behat
vendor/bin/behat -V
```

Vous devez maintenant initialiser un projet avec Behat :

```bash
vendor/bin/behat --init
```