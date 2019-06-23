<?php

/**
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 *
 * Je définis ici un helper pour la gestion des fichiers static
 * 
 */

//$root_dir = dirname(__DIR__, 3);
//$base_dir = substr($root_dir, strlen($root_dir)-7);

define('BASE_DIR', substr(dirname(__DIR__, 3), strlen(dirname(__DIR__, 3))-7));

/**
 * Fontion permettant de retourner le chemin de la ressource passée en paramètre.
 *
 * @param   String  $file  ressource demandée
 *
 * @return  path         chemin de la ressource demandée
 */
function asset($file)
{
    return '/'.BASE_DIR.'/public/assets/'.$file;
}

function assetUpload($file)
{
    return '/'.BASE_DIR.'/public/uploads/'.$file;
}