<?php

require_once('../Utilities/HydratationTrait.php');

/**
 * 
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 * 
 * Classe représentant une catégorie
 * 
 */
class Categorie
{
    use HydratationTrait;

    private $id;
    private $libelle;

    public function __construc(Array $data)
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
}