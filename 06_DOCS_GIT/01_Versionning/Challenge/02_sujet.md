# Sujet 02

Nous verrons jeudi comment créez de manière efficace de la documentation pour les fichiers, classes et méthodes. Cette partie n'est donc pas à faire.

Par équipe de 2 ou 3.

## Context

Le client souhaites mettre en ligne un jeu qui propose de devinez rapidement des multiplications. L'utilisateur devra, pour jouer, enregistrer un pseudo unique. Le jeu consiste à deviner 10 multiplications le plus rapidement possible. Une fois terminer on lui affichera son score. Il pourra recommencer le jeu autant de fois qu'il le désir.

Le projet est simple et n'évoluera sans doute pas dans le temps. Cependant, vous pouvez imaginer une solution technique stable et modulable dans la durée.

Budget pour ce client : 2500 euros, temps estimé pour le développement : 1 journée.

## Contraintes

1. Vous êtes pour l'instant seul maitre d'ouvrage, à 16h votre Lead Dev fera la revu de code avec chaque équipe. Chaque développeur devra justifié d'au moins une feature réalisée.

2. Documentation technique & présentation & commentaires

Vous devez proposez un design d'architecture logiciel, pour développer le projet, en documentant vos choix. Vous pourriez par exemple proposer une architecture Symfony **simple**, augmentée de quelques composants spécifiques. **Précisez les composants que vous souhaitez utiliser : Doctrine, Twig, ...**. Créez un doc un readme.md ou un PDF (à placez dans la colonne DOCS du CRM).

Détaillez le choix de la persistance des données.

Détaillez également les features :

- Service : CalculMultiplication
  _Ce service permet de générer une multiplication aléatoirement ..._

Créez un petit PDF présentant les deux ou trois développeurs ayant participés au projet. Mettez ce document dans le partie DOCS du CRM.

Chaque méthode devra être correctement commentée comme suit :

```php
/**
 * A summary informing the user what the associated element does.
 *
 * A *description*, that can span multiple lines, to go _in-depth_ into
 * the details of this element and to provide some background information
 * or textual references.
 *
 * @param string $arg With a *description* of this argument,
 *                           these may also span multiple lines.
 *
 * @return void
 */
 public function myFunc(string $arg):void
 {
 }

```

3. GitFlow

Respectez le gitflow suivant, les branches entres crochets sont des branches éphémères. Créez un commit de merge même pour si vous faites du fast-forward (voir la documentation)

```txt

master  ----------

dev     ----------
    .
      .
       [feature_*]

```

Tous les commits devront être correctement formés : un titre et un texte qui explique chaque feature.

4. CRM

Créez les trois colonnes : TODO, DOING & DONE, ainsi que les deux colonnes : TESTS et DOCS. Les documents techniques, de composants, ... seront placés dans la colonne DOCS, et pourront être consulté par le Lead Dev

Vous devez réfléchir à l'ordre dans lequel vous allez faire le découpage des features, précisez dans votre organisation cet ordre.

5. Exercices Bugs & simulations

- Un des développeur crée un bug dans l'application, par exemple une erreur dans votre algorithmique pour calculer les multiplications (service). Constatez ce bug dans les tests unitaires, puis blamez le developpeur qui a fait cette erreur.

- Créez un bug une fois l'application en pré-prod, théoriquement terminée, créez une branche éphémère HotFix, mais ne la supprimez pas.
