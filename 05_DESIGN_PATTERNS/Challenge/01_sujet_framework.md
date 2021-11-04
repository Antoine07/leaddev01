# Sujet Framework

Vous allez par équipe de 2 créez votre propre Framework. Ce projet doit-être documenté, vous devez fournir un PDF décrivant chacune de vos étapes afin de pouvoir présenter votre projet.

Dans un premier temps vous devez mettre en place la structure du Framework.

Nous utiliserons Apache2 pour la gestion du serveur.

Vous n'êtes pas obligé de mettre une base de données en place pour ce projet.

Vous pouvez vous pouvez utiliser les composants Symfony suivants :

- Twig 

- Router

- Request 

- ...

Pour vous aidez vous pouvez utiliser la documentation de Symfony suivante qui décrit comment mettre en place un Framework PHP

[framework](https://symfony.com/doc/current/create_framework/index.html)

Vous pouvez également vous aider de ce projet personnel :

[framework](https://github.com/Antoine07/myFramwork)

## Partie 1 structure

Créez les dossiers et fichiers distincts suivants : 

```text
public/
    .htaccess
    index.php <-- Point d'entrée de l'application
resources/ <-- Templating
src/ <-- Structure de votre Framework
tests/ <-- tests
app.php <-- Bootstrap
.env <-- variables d'environnement
```

## Partie 2 point d'entrée et bootstrap

- Le point d'entrée, ce fichier est exposé à une adresse internet

Vous devez définir un fichier .htaccess, ce fichier doit re-diriger toutes les requêtes vers le fichier index.php

```txt
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>
    RewriteBase /
    RewriteEngine On

    # Redirect Trailing Slashes...
    RewriteRule ^(.*)/$ /$1 [L,R=301]

    SetEnv APPLICATION_ENV dev

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

Le fichier index.php instanciera l'application, il incluera le fichier app.php bootstrap de l'application. Notez que le dispatcher appelle sa méthode run.

```php
/**
 * @author: 
 * @description: framework PHP
 */

require_once __DIR__.'/../app.php';

$dispatcher->run();
```

## Partie 3  Dispatcher

Notez que votre Dispatcher peut contenir votre Service Container. Dans ce cas ce dernier pourra être passer à vos contrôleurs de l'application facilement.

Définissez un abstract controller permettant de faire une instance de votre Service Container.

Il va orchestrer le demande du client et fournir une réponse au client. Il prend l'objet Request analyse la demande du client et instanciera le contrôleur et sa méthode en lui passant éventuellement des paramètres.

Le fichier app.php est le bootstrap de votre application.

```php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

$dispatcher = new Dispatcher(new Request);
```

Le Dispatcher possède une méthode run, c'est cette méthode qui va invoquer le router et en fonction de la route faire en sorte que le FronController instancie la bonne méthode dans le bon contrôleur pour répondre à la requête. Le Dispatcher possède une méthode makeController.

Notez que une fonction comme call_user_func_array permet d'appeler une méthode d'une instance en lui passant des paramètres 

```php
call_user_func_array([$instance, $method], $params);
```

- méthode run

```php
public function run()
{
    // récupère la route à l'aide du router => nom du contrôleur + méthode avec ses paramètres éventuels

    // puis lance la méthode send() pour afficher la réponse.
}
```

- Il faut instancier le bon contrôleur cela va se faire également dans le Dispatcher. Notez que vous pouvez utiliser un service Container pour le passer à l'instance du contrôleur.

```php
protected function makeController($controller){
    // ...
    return new $controllerClass($container);
}

```
Enfin la méthode send permet de retourner la réponse à la requête demandée.

```php
public function send($status = '200 OK')
{
    header("HTTP/1.1 $status");
    header("Content-Type: text/html, charset=UTF-8");

    echo (string)$this; // appelle la méthode __toString et retourne la $content à envoyer au client.
}
```

## Partie 4 Twig 

Vous pouvez mettre en place le composant Twig pour gérer les vues dans la réponse au client. Utilisez votre Service Container pour préparer Twig et son utilisation dans votre framework.
