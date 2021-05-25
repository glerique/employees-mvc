<?php

require_once('autoload.php');
$manager = new TodoManager($db);

$id = $_POST['id'];
$name= $_POST['name'];
$content = $_POST['content'];

$todo = new Todo([
  'id' => $id,
  'name' => $name,
  'content' => $content
]);

 $manager->update($todo);
 header('location:index.php');
 
?>
