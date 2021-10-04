# Introduction & Présentation des tests unitaires

Nous allons aborder les tests unitaires de manière direct dans le code déjà écrit. Nous verrons plus tard une autre manière de procéder que l'on appelle TDD ,Tests Driven Developpment, qui consiste à créer des tests avant même d'implémenter la logique métier dans les classes de l'application.

Les tests unitaires vont vous aider à identifier et corriger les bugs, à refactorer le code et écrire de une documentation précise sur les fonctionnalités de vos méthodes. Les tests unitaires doivent couvrir toutes les possibilités algorithmiques d'un programme. Chaque test unitaire test une logique d'une méthode spécifique.

Nous verrons également qu'il existe des dépendances logiques entre les tests, des scénarios de tests, mais que les tests eux-mêmes sont isolés.

Retenez chaque test est une méthode qui est isolée des autres tests (méthodes) dans une classe de test.

Une application est bien testée si les tests unitaires couvrent 80% de la logique métier. Dans ce cas l'application a peu de chance de produire des bugs en production et également pourra facilement être étendue avec des nouvelles fonctionnalités, bien sûr on doit si l'application évolue refaire des tests.

**Martin Fowler:**

Concepteur et auteur conférencier informaticien britanique, pionnier et une référence dans la programmation agile.

"A chaque fois que vous avez la tentation de saisir quelque chose dans une instruction print ou dans une expression de débogage, écrivez le plutôt dans un test."

## Installation

Vous devez avoir une version de PHP >= 7.4

On va installer **PHPUnit** qui est un framework de tests. Nous pouvons l'installer de manière globale, c'est-à-dire 
dans le dossier /usr/local/bin de notre machine ou alors, l'installer uniquement pour le projet en cours. Nous allons 
l'installer pour notre projet Cart, c'est-à-dire en tant que de dépendance (dossier vendor). Pour se faire nous allons taper les lignes suivantes. Les trois commandes suivantes permettent respectivement de chercher un composant, de montrer les détails d'un composant et d'installer celui-ci dans 
le dossier vendor du projet :

  ```bash
composer search phpunit
composer show phpunit/phpunit --all 

# Installation locale
composer require --dev phpunit/phpunit ^9

# Installation globale
composer global require phpunit/phpunit ^9
```

Une autre manière installer phpunit est d'installer l'exécutable :

```bash
wget -O phpunit https://phar.phpunit.de/phpunit-9.phar
chmod +x phpunit
./phpunit --version

# Déplacez l'exécutable dans le dossier /usr/local/bin
```

## Application d'application configuration

On teste la logique algorithmique d'une classe, chaque test est une méthode d'une classe de test. Les tests sont isolés les uns des autres, principes d'isolation des tests.

Les convetions de nommage des tests sont :

- Pour une classe : NameClasseTest et pour un test (méthode) testNameMethod (mot clé test suivi du nom de la méthode à tester en général).

**Configuration**

1. Créez un dossier **src** et **tests** dans le dossier Messages dans le dossier Examples.

2. Initialisez le projet avec la commande suivante

```bash
composer init
```

Dans le fichier composer.json écrivez le code suivant, la classe Message sera dans le namespace App :

```json
{
    "name": "alan/messages",
    "autoload": {
        "psr-4": {
            "App\\Message\\": "src/"
        },
        "classmap": [
            "src/"
        ]
    },
    "authors": [
        {
            "name": "Alan",
            "email": "alan@alan.com"
        }
    ],
    "require": {}
}
```

à la racine du dossier Messages nous allons placer un fichier de configuration pour phpunit, créez ce fichier et mettez le code suivant, on définit un fichier **autoload.php** de bootstrap à la racine du dossier de tests. 

## La méthode setUp et tearDown

La méthode **setUp** dans la classe MessageTest est appelée en premier avant tous les autres tests, un test est une méthode d'une classe de test. Nous n'implémentons pas la méthode **tearDown**, elle est utile si la méthode **setUp** alloue des ressources externes comme des fichiers ou base de données.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="tests/autoload.php"
         colors="true">
    <testsuites>
        <testsuite name="Message">
            <directory>./tests</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

Le fichier de autoload.php contiendra le code suivant dans un premier temps.

```php
require_once __DIR__.'/../vendor/autoload.php';
```

Créez le test suivant :

```php

use PHPUnit\Framework\TestCase;
use App\Message;

class MessageTest extends TestCase{

    protected Message $message;


    public function setUp():void{
        $this->message = new Message('en');
    }

    public function testOne(){

        $this->assertSame("Hello World!",$this->message->get());
    }
}
```

On vous donne la classe métier à tester :

```php
namespace App;

class Message
{

    public function __construct(
        private string $lang = 'en',  
        private array $translates = ['fr' => 'Bonjour les gesn!', 'en' => 'Hello World!']
        )
    {
    }

    public function get(): string
    {

        return $this->text;
    }

    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }
}
```

Lancez maintenant le test suivant en console à la racine du dossier Message :

```bash
phpunit
```

Indication : si tous les tests sont bons alors, ils seront verts.

## 01 Exercice DotEnv

1. Installez la dépendance DotEnv et définissez à la racine du projet un fichier .env dans lequel vous définissez la variable d'environnement suivante :

```txt
LANGUAGE="fr"
```

Indication : dépôt de la dépendance qu'il faut installer : [https://github.com/vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)

2. Dans le bootstrap des tests importez les variables d'environnement.

3. Testez en fonction de la valeur LANGUAGE = fr ou en le message de la méthode get respectivement "Hello World!" ou "Bonjour les gens!".


## Configuration des tests fournisseurs de données et exceptions

Nous pouvons allez plus loin dans la configuration des tests, pour bien comprendre le framework de tests nous allons présenter d'autres techniques. Nous pouvons en effet fournir aux tests des valeurs arbitraires.

Un fournisseur de tests devra être une méthode publique et retourner soit un tableau, soit un objet qui implémente une interface Iterator. 

On utilise 

```php
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3]
        ];
    }
}
```

Vous pouvez également tester les exceptions, et même le type d'exception que votre code métier retourne :

```php
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
    }
}
```

## 02 Exercice Calculator

Le but de cet exercice et de vous faire appréhender l'organisation des tests.

Dans la suite des tests on prendra comme précision 2 chiffres après la virgule.

Dans les questions 1 et 2 vous testerez uniquement la classe Calculator. Les classes dans le dossier Model seront testées à partir de la question 4.

1. Utilisez le code dans le dossier Exercice_02_Calculator. Installez le projet avec ces dépendance. 

*Attention, assertEquals et assertSame sont différents. La deuxième méthode vérifie le type strictement.*

2. Testez la classe Calculator en utilisant les concepts Provider (passer un tableau de valeurs ) et d'exception décrit précédemment.

*Indications : vous devez tester le type des arguments et également les exceptions levées directement dans le code métier. Pensez à faire un trait pour factoriser les providers.*

3. Testez maintenant le message renvoyé par l'exception.

```php
 $this->expectExceptionMessage('Impossible de diviser par zéro.');
```

*Dans la suite tous les résultats sont des entiers qui n'ont pas de partie décimale, voyez le type NumberString qui est retourné dans l'addition et la division.*

4. Testez maintenant la partie Model dans le dossier src. Réorganisez le fichier XML de configuration des tests comme suit, n'utilisez pas de Provider pour cette partie vous testerez uniquement add et divisor comme dans les exemples ci-après.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="tests/autoload.php"
         colors="true">
    <testsuites>
        <testsuite name="Calculator">
            <file>./tests/CalculatorTest.php</file>
        </testsuite>
         <testsuite name="Model">
           <directory>./tests/Model/ModelTest.php</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

Faites les trois tests suivants :

- testez l'addition de deux nombres de type Number.

```php
public function testAdd()
{

}
```

- Testez la division de deux nombre de type Number.

```php
public function testDivisor()
{

}
```

- Testez l'exception division par zéro.

```php
public function testExceptionDivisor()
{

}
```

## 03 TP Fixtures parti 1/2

Lors de tests vous aurez besoin de fixtures (données d'exemple) pour tester des comportements. Nous allons découvrir cette notion. Récupérez dans le dossier Exercices l'exercice 03_Exercice_Model.

Remarques sur la méthode setUp dans ce TP, lisez les commentaires ci-dessous :


```php
public function setUp(): void
{
    // On utilise sqlite en mode vive
    $this->pdo = new \PDO('sqlite::memory:');
    $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    // On crée une table user dans la base de données en mémoire vive
    $this->pdo->exec(
        "CREATE TABLE IF NOT EXISTS user
        (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username VARCHAR( 225 )
        )
        "
    );

}
```

1. Hydratez les tests (fixtures) avec les données suivantes :

```php
$users = [
    ['username' => 'Alan'],
    ['username' => 'Sophie'],
    ['username' => 'Bernard'],
];
```

Remarque sur PDO vous pouvez demander à PDO de vous retourner les données sous forme d'un objet de type User voyez le code dans ce cas :


- Dans la classe modèle

```php

namespace App;

class User {

    private string $username;
    private int $id;

    public function __set($name, string $value):void
    {
        $this->$name = $value;
    }

    public function __get(string $name):string
    {
        return $this->$name;
    }

}
```

- Dans le modèle et la méthode fetchAll

```php
 public function all()
{
    $stmt = $this->pdo->query("SELECT * FROM user");

    return $stmt->fetchAll(\PDO::FETCH_CLASS, 'App\\User');
}
```

2. Faites les tests décrit dans le fichier UserTest.

3. Créez le ModelPrepare qui s'occupera de sécuriser les requêtes en les préparant.


## 03 TP Fixtures parti 2/2

Nous allons maintenant utiliser un composant pour automatiser l'import des données afin de faire des tests avec une données mieux organiser.

Modifiez le modèle en conséquence des données d'exemple dans cette partie de l'exercice.

Installez la dépendance suivante :

```bash
composer require symfony/yaml --dev
```

Récupérez le dossier _data dans le dossier Examples et à l'aide du code ci-dessous importez ces données d'exemple dans une autre classe de test UserYamlTest. Vous testerez les mêmes méthodes (ne changez pas le code des méthodes de tests).

```php
$yaml = new Parser();
$users = $yaml->parse(file_get_contents(__DIR__.'/_data/seed.yml'));
```

## 04 Exercice Iterator

1. Une classe PHP qui implémente l'interface Iterator est une classe itérable, à partir de l'exemple suivant créez une classe Even elle n'affiche que les nombres paires. Une fois la classe créée testez son bon fonctionnement.

```php
class Even implements Iterator {
    
    public function __construct(private int $position = 0, array $array =[
        "premierelement",
        "secondelement",
        "dernierelement"] ) {
    }

    public function rewind() {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    public function current() {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    public function key() {
        var_dump(__METHOD__);
        return $this->position;
    }

    public function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid() {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
}
```
