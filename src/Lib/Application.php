<?php

namespace App\Lib;

use App\Controller\Controller;


Class Application{

    public static function start(){        

        /*
        if(!empty($_GET['action'])){
            $action = $_GET['action'];        
        }
        else {$action="index";}                      
       
          
        
        $controller = new Controller(); 
        $controller->$action();
        */
         

         
         $params = [];
         if(isset($_GET['p'])){
             $params = explode('/', $_GET['p']);
    }
        /*
         var_dump($params);
         die();
        */
         // var_dump($params);
         if($params[0] != ""){
             // On a au moins 1 paramètre
             // On récupère le nom du contrôleur à instancier
             // On met une majuscule en 1ère lettre, on ajoute le namespace complet avant et on ajoute "Controller" après
             $controller = '\\App\\Controller\\'.ucfirst(array_shift($params));
             /*
             var_dump($controller);
             die();
             */
             // On instancie le contrôleur
             $controller = new $controller();
 
             // On récupère le 2ème paramètre d'URL
             $action = (isset($params[0])) ? array_shift($params) : 'index';
             /*
             var_dump($action);
             die();
             */
             if(method_exists($controller, $action)){
                 // Si il reste des paramètres on les passe à la méthode
                 (isset($params[0])) ? call_user_func_array([$controller, $action], $params) : $controller->$action();
             }else{
                 echo "La page recherchée n'existe pas";
             }
 
         }else{
             // On n'a pas de paramètres
             // On instancie le contrôleur par défaut
             $controller = new Controller;
             
             // On appelle la méthode index
             $controller->index();
         }
     }
    }

