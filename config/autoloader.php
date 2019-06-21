<?php

/**
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 *
 * Je définis ici mes différents autoloader.
 * Ce sont des fonctions qui vont permettre l'autochargement des entités et 
 * des managers.
 * 
 */

function loadEntity($entity)
{
    require_once('../public/src/Entity/'.$entity.'.class.php');
}

function loadManager($manager)
{
    require_once('../public/src/Manager/'.$manager.'.class.php');
}

spl_autoload_register('loadEntity');
spl_autoload_register('loadManager');