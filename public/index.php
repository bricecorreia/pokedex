<?php

//* FRONT CONTROLLER

// inclure les dépendances composer
require __DIR__ . '/../vendor/autoload.php';
// Grâce à ce fichier, les librairies se chargent automatiquement

//* création d'une instance AltoRouter
$router = new AltoRouter();

//* on déclare à Altorouter que notre site est placé dans des sous-répertoires
$router->setBasePath($_SERVER['BASE_URI']);
// $_SERVER['BASE_URI'] est créée via le .htaccess



//* Tableau des routes
$routes = [
    //* les différentes routes de notre site
    [
        'GET',
        '/',
        [ 
            'controller' => 'MainController',
            'action' => 'home' 
        ],
        'home' 
    ],

    [
        'GET', 
        '/details-du-pokemon/[i:id]',
        [ 
            'controller' => 'PokedexController',
            'action' => 'pokemon' 
        ],
        'details' 
    ],

    [
        'GET', 
        '/glossaire-des-types', 
        [ 
            'controller' => 'PokedexController',
            'action' => 'glossaireTypes' 
        ],
        'glossaireTypes' 
    ],

    [
        'GET', 
        '/liste-par-type/[i:id]', 
        [
            'controller' => 'PokedexController',
            'action' => 'pokeByType' 
        ],
        'pokeByType' 
    ]
];

// envoi du tableau $routes dans Altorouter
$router->addRoutes($routes);



//* Début du dispatcher

$match = $router->match();

if ($match !== false) {
    // On récupére avec altorouteur (le résultat de match()) les données de la route (mappé plus haut)
    $controllerToUse = 'Pokedex\\Controllers\\' . $match['target']['controller'];
    $methodToUse = $match['target']['action'];

    
    // on transformee $mainController->$methodToUse() en $mainController->home();
    $controller = new $controllerToUse();
    $controller->$methodToUse($match['params']);
}

else {
    echo ('<img src="https://thumbs.gfycat.com/GrimUnconsciousBug-size_restricted.gif">');
    // http_response_code('404');
}

//* Fin Dispatcher