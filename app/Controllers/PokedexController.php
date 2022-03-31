<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class PokedexController extends CoreController {
    
    function pokemon($params) {
        $model = new Pokemon();
        $pokemon = $model->findPokemonById($params['id']);
        
        
        $typeModel = new Type();
        $pokemonType = $typeModel->findType($params['id']);

        $statsModel = new Type ();
        $pokemonStats = $statsModel->findStats($params['id']);

        $this->show('displayDetails', [
            'pokemon' => $pokemon,
            'pokemonType' => $pokemonType,
            'pokemonStats' => $pokemonStats
        ]);
    }

    function glossaireTypes() {

        $typesModel = new Type();
        $types = $typesModel->findAllTypes();

        $this->show('displayTypes', [
            'types' => $types
        ]);
    }

    function pokeByType($params) {
        $pokemonsTypeModel = new Pokemon();
        $pokemons = $pokemonsTypeModel->findPokemonsByType($params['id']);

        $this->show('displayPokemonsByType', [
            'pokemons' => $pokemons,
        ]);
    }
}