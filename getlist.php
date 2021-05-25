<?php
$manager = new TodoManager($db);
echo '<table border="1">';
foreach($manager->getList() as $value){
  echo '<tr><td>'.$value->getId().'</td><td>'.$value->getName().'</td><td>'.$value->getContent().'</td><td><a href="modif.php?id='.$value->getId().'">Modifier</a></td><td><a href="delete.php?id='.$value->getId().'">Supprimer</a></td>';
  }
 echo '</table>';
?>
