<?php

/**
 * 
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 * 
 * Classe chargée de rendre les différentes vues.
 * 
 */
class View 
{
    public function __construct()
    {

    }

    public function index()
    {
        require_once('../templates/blog/index.php');
    }
}