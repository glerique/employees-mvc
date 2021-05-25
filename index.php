<?php
require_once('autoload.php');
echo '<hr>';

$db= new PDO('mysql:host=localhost;dbname=todo', 'root', 'test');

echo '<h2>Add</h2>';
include 'add.php';
echo '<hr>';

echo '<h2>Get</h2>';
include "get.php";
echo '<hr>';

echo '<h2>getList</h2>';
include 'getlist.php';
?>
