# Documentation

## Insallation 

Installez la dépendance en récupérant l'exécutable PHP à l'adresse suivante :

[phpdoc]( https://phpdoc.org/phpDocumentor.phar)

Dans votre projet vous créez le fichier XML **phpdoc.dist.xml** de configuration à la racine de votre suivant :

```xml
<?xml version="1.0" encoding="UTF-8" ?>
<phpdocumentor
        configVersion="3"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns="https://www.phpdoc.org"
        xsi:noNamespaceSchemaLocation="https://docs.phpdoc.org/latest/phpdoc.xsd"
>
    <paths>
        <output>build/api</output>
        <cache>build/cache</cache>
    </paths>
    <version number="3.0.0">
        <api>
            <source dsn=".">
                <path>src</path>
            </source>
        </api>
    </version>
</phpdocumentor>
```

Pour un projet structué comme suit :

```txt
src/
    MyClass.php
app.php
phpdoc.dist.xml
```

- Pour lancer la génération de la configuration vous tapez le code suivant :

```bash
# Sans fichier xml de configuration
phpdoc -d ./src -t ./docs/api

# Avec le fichier de configuration
phpdoc
```

Visitez maintenant le dossier docs dans le dossier api vous avez une application qui décrit l'ensemble de vos fonctionnalités (documentation de l'application).

## Introduction définition de la documentation dans un projet

Nous pouvons définir 4 types de documentation :

1. Les classes, méthodes la logique métier et les API.

2. La documenation fonctionnelle : comment l'application doit-elle être utiliser. Les scénarios d'utilisation, ...

3. Le déploiement de l'application. Description du déploiement, que faire en cas d'incident.

4. La documenation pour l'utilisateur. Une granularité différente par rapport à la documentation fonctionnelle. La gestion des Wiki

## PHPDoc 

### Docblocks

Ce sont les blocs de commentaires que vous placez au-dessus des classes, ou au début du fichier.

- Fonction

```php
<?php
/**
 * This is a DocBlock.
 */
function myFunction()
{
}
```

- Fichier

```php
<?php
/**
 * I belong to a file
 */

/**
 * I belong to a class
 */
class Def
{
}
```

- class

```php
<?php
/**
 * I belong to a class
 */

class Def
{
}
```

## 01 Exemple de documenation 

```php
<?php
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
 function myFunc($arg)
 {
 }

 ```

 La première ligne est une description courte, suivi d'une description plus longue.

 Vous pouvez dans la description longue utiliser le Markdown pour formater une description plus longue de votre code.

 Les tags param et return indiquent le type des arguments avec description ainsi que le type de retour.


- Vous trouverez la liste des tags à l'adresse suivante :

[doc](https://docs.phpdoc.org/guide/guides/docblocks.html)

## 02 Exercice Web App

Pour cette exercice vous allez utiliser un CRM (Custom Relationship management)

Par équipe de 2 en respectant SOLID, le Gitflow déjà mis en place créez une petite application en Symfony, elle possèdera deux uniques entités Post et Author avec les attributs suivants. Cette application affichera des contenus de cours produit en Markdown et afficher en HTML ([twig](https://twig.symfony.com/doc/2.x/filters/markdown_to_html.html))

- title

- content

- author (relation)

- published_at

Indications : vous serez évaluer sur l'ensemble des techniques demandées.