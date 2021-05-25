<?php
require_once('autoload.php');
$manager = new TodoManager($db);
$todo = $manager->get($_GET['id']);
?>
<form method ="post" action="update.php">
<input type="hidden" name="id" value="<?php echo $todo->GetId(); ?>">
<p>Todo : <input type ="text" name ="name"  value="<?php echo $todo->getName(); ?>"></p>
<p>Contenu : <input type ="text" name="content" value="<?php echo $todo->getContent(); ?>"></p>
<input type="submit" value ="modifier">
</form>
