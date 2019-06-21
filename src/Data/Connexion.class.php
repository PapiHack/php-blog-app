<?php

require_once('../../config/database.php');

/**
 * 
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 * 
 * Classe permettant d'établir une connexion à la BD.
 * J'implémente ici le pattern Singleton.
 * 
 */
class Connexion 
{
    private static $connexion;

    private function __construct()
    {
        try 
        {
            self::$connexion = new PDO(DB_CONNECTION.':host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        }
        catch(Exception $e)
        {
            echo 'Une erreur est survenue lors de la connection à la BD => '. $e->getMessage();
            die();
        }
    }

    public static function getConnexion()
    {
        if($connexion === null)
            self::$connexion == new Connexion;
        return self::$connexion;
    }
}