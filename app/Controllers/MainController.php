<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class MainController extends CoreController {

    function home($params)
    {
        // récupérer les catégories de la homepage
        $pokemonModel = new Pokemon();
        $homePokemons = $pokemonModel->findAllForHome();
        // dump($homePokemons);
        $this->show('home', [
            'homePokemons' => $homePokemons,
        ]);
    }
}
