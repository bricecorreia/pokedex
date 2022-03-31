<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use \PDO;

class Pokemon extends CoreModel {

    private $id;
    private $name;
    private $number;

    private $hp;
    private $atk;
    private $def;
    private $atk_spe;
    private $def_spe;
    private $speed;
    


    public function findAllForHome()
    {
        $sql = "SELECT * FROM `pokemon`";

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $pokemons = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $pokemons;
    }

    public function findPokemonById($id) {

        $sql = 'SELECT * FROM `pokemon` WHERE `id` = ' .$id;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $singlePokemon = $pdoStatement->fetchObject('Pokedex\Models\Pokemon');

        return $singlePokemon;
    }

    public function findPokemonsByType($id) {

        $sql =' SELECT * FROM `pokemon`
                JOIN `pokemon_type` ON pokemon.number =  pokemon_type.pokemon_number
                JOIN `type` ON pokemon_type.type_id = type.id
                WHERE type.id = ' . $id ;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $types;
    }

    public function findIdFromNumber($number) {

        $sql =' SELECT `id` 
                FROM `pokemon`
                WHERE pokemon.number = ' . $number ;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $pokemon = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $pokemon;
    }


    // ==============
    #region
    // ==============
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of hp
     */ 
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     *
     * @return  self
     */ 
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get the value of atk
     */ 
    public function getAtk()
    {
        return $this->atk;
    }

    /**
     * Set the value of atk
     *
     * @return  self
     */ 
    public function setAtk($atk)
    {
        $this->atk = $atk;

        return $this;
    }

    /**
     * Get the value of def
     */ 
    public function getDef()
    {
        return $this->def;
    }

    /**
     * Set the value of def
     *
     * @return  self
     */ 
    public function setDef($def)
    {
        $this->def = $def;

        return $this;
    }

    /**
     * Get the value of atk_spe
     */ 
    public function getAtk_spe()
    {
        return $this->atk_spe;
    }

    /**
     * Set the value of atk_spe
     *
     * @return  self
     */ 
    public function setAtk_spe($atk_spe)
    {
        $this->atk_spe = $atk_spe;

        return $this;
    }

    /**
     * Get the value of def_spe
     */ 
    public function getDef_spe()
    {
        return $this->def_spe;
    }

    /**
     * Set the value of def_spe
     *
     * @return  self
     */ 
    public function setDef_spe($def_spe)
    {
        $this->def_spe = $def_spe;

        return $this;
    }

    /**
     * Get the value of speed
     */ 
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set the value of speed
     *
     * @return  self
     */ 
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    // ==============
    #endregion
    // ==============
}