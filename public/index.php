<?php

/**
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 *
 * Ceci est en quelque sorte un FrontController ou controlleur frontal et joue aussi
 * le rôle d'un router.
 * Il est chargé d'analyser la requête du user et de rendre la vue correspondante à
 * la route demandée par ce dernier.
 * 
 */

require_once('../src/ViewLoader/View.php');

$view = new View();

if(isset($_GET['action'])){
    switch ($_GET['action'])
    {
        case 'newArticle': $view->newArticle();
                            break;
        case 'newCategory': $view->newCategory();
                            break;
        case 'storeCategory': $view->storeCategory();
                                break;
        case 'storeArticle' : $view->storeArticle();
                                break;
        case 'articlesByCategory' : if(isset($_GET['category'])){
                                        $view->articlesByCategory();
                                        break;
                                        }
    }
}

$view->index();