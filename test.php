<?php
require_once('autoload.php');

$db= new PDO('mysql:host=localhost;dbname=todo', 'root', 'test');
$request = $db->query('SELECT * FROM todo') or die(print_r($db->errorInfo()));
while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
  $todo = new Todo($donnees);
  echo $todo->id().' / '.$todo->name().' / '.$todo->content().'<br>';
  }
echo '<hr>';

$test1 = new Compteur;
$test2 = new Compteur;
$test3 = new Compteur;
$test4 = new Compteur;
$test5 = new compteur;
echo Compteur::getCompteur();

echo '<hr>';
$a = new A ;
$method = 'hello';
$a->$method();

echo '<hr>';
?>
