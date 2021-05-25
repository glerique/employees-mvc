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
          <legend>Id</legend>
          <select name="id">
            <?php
          foreach($manager->getList() as $value){ ?>
          <option value ="<?php echo $value->getId();?>"><?php echo $value->getId();?></option>
        <?php }?>
        </select>
          <br />
          <br />
          <input type="submit" value="envoyer">
        </form>
        </fieldset>


<form method ="post" action="modif.php">
<?php

if(isset($_POST['id'])){
$todo = $manager->get($_POST['id']);
echo '<p>'.$todo->getId().' | '.$todo->getName().' | '.$todo->getContent().'</p>'; 
}
echo '<p>Il y a '.$manager->count().' todos dans la bdd</p>';
?>
</body>
</html>
