<?php
require 'vendor/autoload.php';

use App\Controller\Controller;
/** Pour afficher les erreur en Dev */
ini_set('display_errors', 1);

$controleur = new Controller();
$controleur->invoke();
