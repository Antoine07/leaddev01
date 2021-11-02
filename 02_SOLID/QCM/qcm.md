# QCM

## Qestion 01

1. Est-ce que la classe Tools est SOLID ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] Oui 

[ ] Non

2. Combien de responsabilités pouvons-nous définir à partir de la classe "spaghetti" ci-après ? 

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] 1

[ ] 2

[ ] 3

[ ] 0

```php

class Tools{

    public function date(){
        return (new Datetime("now"))->format('d/m/y');
    }

    public function dateDay($days){
        return (new Datetime($days))->format('d/m/y');
    }

    public function input($name, $value){
        return sprintf( '<input type="text" name="%s" value="%s" />', $name, $value ); 
    }
}
```

## Question 02

A quelle lettre le principe suivant correspond-il ?

**Une classe doit être fermée aux modifications (on ne casse pas le code existant ) mais ouverte aux extensions.**

Répondez en choisissant une seule et bonne réponse ci-dessous.


[ ] S

[ ] O

[ ] L

[ ] I

[ ] D


## Question 03

A quelle lettre le principe suivant correspond-il ?

**Vous pouvez également appliquer la règle suivante. Si vous remplacez une classe parente par une classe enfante alors le comportement général de votre code ne devrait pas en être impacté.**

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] S

[ ] O

[ ] L

[ ] I

[ ] D

## Question 04

A quelle lettre le principe suivant correspond-il ?

**Attribuer des responsabilités limitées, uniques et bornées à une classe.**

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] S

[ ] O

[ ] L

[ ] I

[ ] D

## Question 05

A quelle lettre le principe suivant correspond-il ?

**Un objet A ne doit par "consommer" directement un objet B, il doit consommer son interface.**

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] S

[ ] O

[ ] L

[ ] I

[ ] D


## Question 06

A quelle lettre le principe suivant correspond-il ?

**Les classes ne doivent pas créer elles-mêmes les objets dont elles dépendent, on doit les injecter (on crée les instances à l'extérieur de la classe, puis on les "injecte"; on ne fait pas de new dans une classe.)**

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] S

[ ] O

[ ] L

[ ] I

[ ] D

## Question 07

Est-ce que la classe suivante brise le principe de Liskov ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

```php
class Product
{
    public $price;
    public $name ;

    public function __construct(float $price, string $name)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function priceTTC(float $price, float $tva):float
    {
        return $price * (1 + $tva);
    }
}

class Book extends Product
{
    public function priceTTC(float $price, float $tva, float $taxe = .2):float
    {
         return $price * (1 + $tva) * $taxe;
    }
}

class Cart
{
    private $total = 0;
    private $products = [] ;

    public function setProduct( Product $product){
        $this->products[] = $product;
    }

    public function total()
    {
        // calcul du prix total
        foreach($this->products as $product)
            $this->total += $product->priceTTC($product->getPrice(), .2);
    }
}
```

[ ] Oui

[ ] Non

## Question 08

Dans la classe suivante StorageSession est une classe concrète, que doit-on faire pour la rendre modulable ?

Répondez en choisissant une seule et bonne réponse ci-dessous.


```php

class Cart{
    public function __construct( StorageSession $storage){
        // ...
    }
}

```

[ ] Rien elle est modulable.

[ ] On doit définir un contrat que la classe Cart doit implémenter.

[ ] On doit définir un contrat que la classe StorageSession doit implémenter.

[ ] On doit définir un contrat pour la classe StorageSession et l'utiliser comme type pour la variable storage.

## Question 09

Quel degré de relation entre la classe A parente et la classe B enfante l'héritage définit-il ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] Une relation très faible entre la classe A et la classe B.

[ ] Une relation très faible entre la classe B et la classe A.

[ ] La classe B est fortement liée à la classe A.

[ ] La classe A est fortement liée à la classe B.

## Question 10

Qu'impose le mot-clé final pour une classe dans un arbre d'héritage ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] Il termine l'arbre d'héritage, sans possibilité de continuer l'héritage.

[ ] Il termine l'arbre d'héritage, avec la possibilité de continuer l'héritage.

[ ] Il commence l'arbre d'héritage, avec la possiblité de continuer l'héritage.

[ ] Il commence l'arbre d'héritage, sans la possiblité de continuer l'héritage.

## Question 11

Quel est le symbole pour exprimer la visibilité **private**. 

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] -

[ ] +

[ ] #

## Question 12

Quel est le symbole pour exprimer la visibilité **public**. 

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] -

[ ] +

[ ] #

## Question 13

Quel est le symbole pour exprimer la visibilité **protected**. 

Répondez en choisissant une seule et bonne réponse ci-dessous.

[ ] -

[ ] +

[ ] #

## Question 14

Quel est le nom de la relation entre la classe RaspberryPi et Log ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

```php
class RaspberryPi{
    
    public function __construct(Log $log){
        $log->log('START...'); // utilisation permanente
    }
}

class Log{
    protected $status;

    public function log(string $status){
        $this->status = $status;
    }
}

```


[ ] Agrégation

[ ] Composition

[ ] Association ponctuelle

[ ] Association permanente


## Question 15

Quel est le nom de la relation entre la classe RaspberryPi et Connector ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

```php
class RaspberryPi{
    
    public function setConnector(Connector $c){
        $c->set(); 
    }

}

class Connector{

    public function set(){
        // 
    }
}

```


[ ] Agrégation

[ ] Composition

[ ] Association ponctuelle

[ ] Association permanente


## Question 16

Quel est le nom de la relation entre la classe RaspberryPi et Sd ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

```php

class RaspberryPi{
    protected $sd;
    
    public function setSd(Sd $sd){
        $this->sd=$sd;
    }
    
    public function getSd(){
        return $this->sd;
    }

}

class Sd{
    
}

```

[ ] Agrégation

[ ] Composition

[ ] Association ponctuelle

[ ] Association permanente


## Question 17

Quel est le nom de la relation entre la classe RaspberryPi et Arm ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

```php
class RaspberryPi{
    protected $arm;
    
    public function __construct(){
        $this->arm = new Arm;
    }
}

// micro precessor
class Arm{
}
```

[ ] Agrégation

[ ] Composition

[ ] Association ponctuelle

[ ] Association permanente

## Question 18

Soit la classe A ci-dessous. Peut-on instancier cette classe dans le script courant ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

```php
class A{
    
    private function __construct(){
        $this->name = "A";
    }
}
```

[ ] Oui.

[ ] Non.

## Question 19

Soit la classe Model ci-dessous. Peut-on instancier cette classe dans le script courant ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

```php
abstract class Model{
    
    public function __construct(){
        $this->name = "Model";
    }
}
```

[ ] Oui.

[ ] Non.

## Question 20

Qu'affiche le code suivant ?

Répondez en choisissant une seule et bonne réponse ci-dessous.

```php
abstract class Model{
    
    public function __construct(){
        echo $this->tableName ?? "Anonymous" ;
    }
}

class Post extends Model{
    protected $tableName = "POST";
}

$post = new Post;
```

[ ] NULL

[ ] Anonymous

[ ] POST

[ ] Une exception PHP de type InvalidArgument

