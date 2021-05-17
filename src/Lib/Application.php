<?php

namespace App\Lib;

use App\Controller\Controller;


Class Application{

    public static function start(){        

        
        if(!empty($_GET['action'])){
            $action = $_GET['action'];        
        }
        else {$action="index";}                      
       
          
        
        $controller = new Controller(); 
        $controller->$action();
    }
}
