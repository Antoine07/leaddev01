# Sujet 02

Nous verrons jeudi comment créez de manière efficace de la documentation pour les fichiers, classes et méthodes. Cependant vous devez commenter vos méthodes, vous avez un exemple ci-après dans l'énoncé du sujet.

Par équipe de 2 ou 3 vous allez organiser l'ensemble des spécifications techniques à l'aide d'un CRM et commencer le développement de l'application, voyez pour se faire la partie Contexte ci-dessous.

Voici les équipes :

```txt
Equipe 1
Emmanuel
Eric

Equipe 2
Camile
Benoit
Nicolas
```

## Context

Le client souhaites mettre en ligne un jeu qui propose de devinez rapidement des multiplications. L'utilisateur devra, pour jouer, s'enregistrer avec un pseudo unique dans l'application. Le jeu consiste à deviner 10 multiplications le plus rapidement possible, lorsque le joueur à terminé, on lui affichera son score sur une page spécifique. Il pourra recommencer le jeu autant de fois qu'il le désire.

Le projet est simple et n'évoluera sans doute pas dans le temps. Cependant, vous pouvez imaginer une solution technique stable et modulable dans la durée. Il faut dimensionner correctement la demande technique.

Budget pour ce client : 2500 euros, temps estimé pour le développement : 2 journées.

Organisation :

- 9h30 - 11h documentation, organisation dispatching des rôles dans le CRM.

- jusqu'à 16h développement.

## Contraintes

1. Vous êtes pour l'instant seul maitre d'ouvrage, à 16h votre Lead Dev fera la revu de code avec chaque équipe. Chaque développeur devra justifié d'au moins une feature réalisée.

2. Documentations

Mettez ces documents dans le partie DOCS du CRM.

- L'architecture de la solution logiciel 

En quelques lignes, vous devez proposez un design d'architecture logiciel, pour développer le projet. Vous pourriez par exemple proposer une architecture Symfony **simple** augmentée de quelques composants spécifiques. **Précisez les composants que vous souhaitez utiliser : Doctrine, Twig, ...**. 

- Les données

Détaillez le choix de la persistance des données, avec un schéma pour les données (pas plus de 2 tables pour ce projet).

- Détailler les features dans le CRM

Détaillez les features, par exemple Service : CalculMultiplication
  _Ce service permet de générer une multiplication aléatoirement ..._

- Présentez-vous

Créez un petit PDF présentant les deux ou trois développeurs ayant participés au projet en 2 lignes et une photo.

- Présentez l'interface utilisateur

Dans cette partie faites une présentation (Wireframe) des 4 pages théoriques pour le jeu :

 * La page d'inscription : rentrez son pseudo unique.

 * La page du jeu en soi

 * La page des résultats
 
 * Mentions légales (lorem ...)

*Pour l'aspect UX pensez simplement à faire des pages "cohérentes".*

3. Commentez dans le code vos méthodes en suivant la norme PHPDoc ( nous la verrons en détails par la suite)

Chaque méthode devra être correctement commentée comme suit, notez les arrobases qui indiquent les paramètres et le retour de la méhtode.

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

4. GitFlow

Respectez le gitflow suivant, les branches entres crochets sont des branches éphémères les autres des branches permanente. Créez un commit de merge, même pour si vous faites du fast-forward (voir la documentation Git du cours).

```txt
master  -------------
                    .
                  .
             [HotFix]
          .
        .
preprod -------------
                    .
                  .
          [HotFix]
        .  
      .
dev     ----------
    .
      .
       [feature_*]
```

Tous les commits devront être correctement formés : un titre et un texte qui expliquent chaque feature.

5. CRM

Créez les trois colonnes : TODO, DOING & DONE, ainsi que les deux colonnes : TESTS et DOCS. Les documents techniques, de composants, ... seront placés dans la colonne DOCS, et pourront être consultés par le Lead Dev.

Vous devez réfléchir à l'ordre dans lequel vous allez faire le découpage des features, précisez dans votre organisation cet ordre.

6. Exercices Bugs & simulations

- Un des développeur crée un bug dans l'application, par exemple une erreur dans votre algorithmique pour calculer les multiplications (service). Constatez ce bug dans les tests unitaires, puis blamez le developpeur qui a fait cette erreur et créez une branche HoFix.

- Créez un bug une fois l'application en pré-prod, voir le GitFlow plus haut, créez une branche éphémère HotFix, mais ne la supprimez pas.
