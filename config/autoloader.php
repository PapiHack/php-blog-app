<?php

/**
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 *
 * Je définis ici mes différents autoloaders.
 * Ce sont des fonctions qui vont permettre l'autochargement des entités et 
 * des managers.
 * 
 */

function loadEntity($entity)
{
    $file = '../src/Entity/'.$entity.'.class.php';
    
    if(file_exists($file))
        require_once($file);
}

function loadManager($manager)
{
    $file = '../src/Manager/'.$manager.'.class.php';

    if(file_exists($file))
        require_once($file);
}

function loadData($dataClass)
{
    $file = '../src/Data/'.$dataClass.'.class.php';

    if(file_exists($file))
        require_once($file);
}

spl_autoload_register('loadEntity');
spl_autoload_register('loadManager');
spl_autoload_register('loadData');