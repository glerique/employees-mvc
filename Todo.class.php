<?php
class Todo {

  private $_id;
  private $_name;
  private $_content;



public function hydrate(array $donnees){
  foreach ($donnees as $key => $value)
  {
    // On récupère le nom du setter correspondant à l'attribut.
    $method = 'set'.ucfirst($key);
    // Si le setter correspondant existe.
    if (method_exists($this, $method))
    {
    // On appelle le setter.
    $this->$method($value);
  }
}
}

// Important car sinon l'objet à sa création est vide.
public function __construct(array $donnees){
  $this->hydrate($donnees);
}

//getters
  public function getId() { return $this->_id;}
  public function getName() { return $this->_name;}
  public function getContent() { return $this->_content;}

//setters
 public function setId($id){
   $id = (int) $id;
   if($id > 0)
   {
     $this->_id = $id;
   }
 }

 public function setName($name){
   if (is_string($name))
   {
     $this->_name = $name;
   }
 }

 public function setContent($content){
   if (is_string($content))
   {
     $this->_content = $content;
   }
  }
}
?>
