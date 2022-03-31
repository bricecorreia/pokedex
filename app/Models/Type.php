<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use \PDO;

class Type extends CoreModel {

    private $id;
    private $type_name;
    private $color;

    private $hp;
    private $atk;
    private $def;
    private $atk_spe;
    private $def_spe;
    private $speed;

    public function findType($id) {

        $sql = '    SELECT `type_name`, `color` 
                    FROM `type`
                    JOIN `pokemon_type` ON type.id =  pokemon_type.type_id
                    JOIN `pokemon` ON pokemon_type.pokemon_number = pokemon.number
                    WHERE pokemon.id = ' . $id ;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $pokemonType = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $pokemonType;
    }


    public function findStats($id) {

        $sql = '    SELECT `hp`, `atk`, `def`, `atk_spe`, `def_spe`, `speed`
                    FROM `pokemon`
                    WHERE pokemon.id = ' . $id ;
                
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $pokemonStats = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $pokemonStats;
        
    }

    public function findAllTypes() {

        $sql = ' SELECT * FROM `type`';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $types;
    }

    #region
        /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of type_name
     */ 
    public function getType_name()
    {
        return $this->type_name;
    }

    /**
     * Set the value of type_name
     *
     * @return  self
     */ 
    public function setType_name($type_name)
    {
        $this->type_name = $type_name;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

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

    #endregion
}