# Framework Symfony

## Installation

Pour initialiser le projet vous devez entrer à la racine du projet la commande suivante.
Composer va installer les dépendances nécessaire au fonctionnement du framework.

```
$ composer install
```

## Mise en place d'un Controller

La création du controller applicatif se fait dans le dossier **./App/Controller** .

```php
use Symfony\Component\HttpFoundation\Response;

class ExampleController{

    public function index(): Response {

        return new Response("Hello World !");

    }

}
```

Nous avons obligation de retourner une reponse.

```php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// ..

public function name(Request $request) : Response
{
    $name = $request->get('name', 'Titouan');

    return new Response("Hello $name");
}
```

Toute les méthodes du controller recoivent l'objet request en paramètre, il  permet d'acceder aux paramètres passer dans l'url à partir de ses méthodes.

## Création d'une route

Instance d'un objet **Routing\Route** dans le fichier **./App/app.php** ayant pour paramètre:
- chaine de caractères contenant la ressource qu'il définit
- tableau d'arguments
  - le Controller et sa méthode appelée de manière statique
  - argument supplémentaire ...

```php
new Routing\Route(
    "/home/{name}", 
    ['_controller' => HomeController::class . "::name"]
);
```


## Définition des routes

La définitions des routes est gérée par le composant routing de symfony. L'instanciation d'une classe **RouteCollection** est obligatoire afin de pouvoir définir nos endpoints.

```php
use App\Controller\HomeController;
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

// Définition des routes

return $routes;
```

Il faut utiliser la méthode add de notre **RouteCollection** pour définir une route. Cette dernière requiert 2 paramètres.
- Le nom de la route
- L'instance d'un objet **Route** comme vu précedemment

```php
$routes->add("name", new Routing\Route("/home/{name}", [
    '_controller' => HomeController::class . "::name"
]));
```

