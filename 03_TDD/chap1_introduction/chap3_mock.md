# Mock

Nous avons vu comment Mocker une classe en implémentant la logique métier dans une classe. Phpunit propose la création de Mock de manière automatique.

```php
class Model
{
    public function all():array
    {
        // Do something. with DB
    }

    // ...
}

```

Dans votre classe de tests vous allez écrire :

```php
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    public function testStub()
    {
        // Créer un bouchon pour la classe SomeClass.
        $stub = $this->createMock(Model::class);

        // Configurer le bouchon.
        $stub->method('all')
             ->willReturn(['phpunit','behat']);
.
        $this->assertContains('phpunit', $stub->all());
    }
}
```

Le retour des méthodes peut être plus complexe :

- returnValue()

- returnArgument()

```php
->will($this->returnArgument(0)); // $stub->all('foo'); $stub->all('bar')
```

- returnCallback()

```php
->will($this->returnCallback('str_rot13'));
```

- will
```php
->will($this->onConsecutiveCalls(2, 3, 5, 7));
```

La méthode will avec une exception peut également être utilisée :

- will
```php
$this->throwException(new Exception));
```

Des extensions comme ci-dessous vous permet de Mocker un flux qui ne consommera aucune ressource (voir dans la documentation).

```text
mikey179/vfsStream
```

Vous permettrons de tester les flux comme les fichiers et donc vous n'avez techniquement pas besoin des fichiers eux-mêmes, aucun flux n'est ouvert et du reste il est donc inutile à chercher à le fermer ... 


### Exemple

```php
use PHPUnit\Framework\TestCase;

class Example
{
    protected $id;
    protected $directory;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function setDirectory($directory)
    {
        $this->directory = $directory . DIRECTORY_SEPARATOR . $this->id;

        if (!file_exists($this->directory)) {
            mkdir($this->directory, 0700, true);
        }
    }
}
```

- En utilisant le composant 

```php
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function setUp()
    {
        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory('exampleDir'));
    }

    public function testDirectoryIsCreated()
    {
        $example = new Example('id');
        $this->assertFalse(vfsStreamWrapper::getRoot()->hasChild('id'));

        $example->setDirectory(vfsStream::url('exampleDir'));
        $this->assertTrue(vfsStreamWrapper::getRoot()->hasChild('id'));
    }
}
```