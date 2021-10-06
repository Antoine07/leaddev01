# Challenge 01

Vous devez vous mettre en équipe de 2 pour réaliser ce TP.

## Partie 1

Récupérez le dossier Exercice_05_Cart dans le dossier Exercices.

1. Créez le MockStorage vous permettant de remplacer le storage de la classe Cart.

2. Définissez une commande de test permettant de valider l'ensemble des méthodes existantes dans la classe métier Cart

3. On décide d'ajouter une fonctionnalité : restoreQuantity cette méthode permettra de retirer une certaine quantité de produit commander. Faites le test avant d'implémenter le code métier dans la classe Cart (TDD).

## Partie 2

Dans la suite de ce TP vous utiliserez PDO.

1. Créez une base de données fruittest dans le fichier autoload.php dans le dossier tests.

```php
$dbh = new PDO("mysql:host=localhost:8889", $_ENV['USERNAME'], $_ENV['PASSWORD']);
```

Nous vous donnons le modèle pour gérer les données en base de données avec du SQL

```sql
CREATE DATABASE fruittest DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE fruittest;
CREATE TABLE IF NOT EXISTS 
products (
    ID INT NOT NULL AUTO_INCREMENT, 
    name VARCHAR(100), 
    price DECIMAL(7,2), 
    total DECIMAL(7,2) NOT NULL DEFAULT 0.00, 
    PRIMARY KEY(id) )
    ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
    
INSERT INTO products (name, price) VALUES  ('apple', 10.5), ('raspberry',13), ('strawberry', 7.8)
```

2. Créez maintenant StorageMySQL et testez cette classe, elle implémentera le contrat Storage.

3. Créez maintenant la compagne de tests en considérant ce nouveau Storage dans le projet Cart.

4. Améliorez la connexion à la base de données avec les deux méthodes statique suivantes :

- setUpBeforeClass() 

- tearDownAfterClass()