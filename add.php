<?php
require_once('autoload.php');
$manager = new TodoManager($db);
?>

<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <form action="" method="post">
        <fieldset>
          <legend>Add</legend>
          <p>Todo : <input type ="text" name="name"></p>
          <p>Contenu : <input type ="text" name= "content"><p>
          <input type="submit" value="envoyer">
        </form>
        </fieldset>
<?php
if(isset($_POST['name'])){
$name = $_POST['name'];
$content = $_POST['content'];
$todo = new Todo([
  'name' => $name,
  'content' => $content
]);
$manager->add($todo);
}
?>
