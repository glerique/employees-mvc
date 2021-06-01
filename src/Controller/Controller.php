<?php

namespace App\Controller;

use App\Lib\Http;
use App\Lib\Session;

abstract Class Controller{

      
        protected function redirectWithError(string $url, string $message)
        {
            Session::addFlash('error', $message);
            Http::redirect($url);
        }
    
        protected function redirectWithSuccess(string $url, string $message)
        {
            Session::addFlash('success', $message);
            Http::redirect($url);
        }

        


   
}