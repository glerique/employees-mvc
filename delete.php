<?php
require_once('autoload.php');
$id=$_GET['id'];
$manager = new TodoManager($db);
$delete=$manager->get($id);
$manager->delete($delete);
header('location:index.php');
 ?>
