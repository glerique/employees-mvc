<?php
class TodoManager {

  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function count()
  {
    $query = $this->_db->query('SELECT COUNT(*) FROM todo');
    $count = $query->fetchColumn();
    return $count;
  }

  public function add(Todo $todo)
  {
    $query = $this->_db->prepare('INSERT INTO todo(name, content) VALUES(:name, :content)');
    $query->bindValue(':name', $todo->getName());
    $query->bindValue(':content', $todo->getContent());
    $query->execute();
  }

  public function delete(Todo $todo)
  {
    $this->_db->exec('DELETE FROM todo WHERE id = '.$todo->GetId());
  }

  public function get($id)
   {
    $id = (int) $id;
    $query = $this->_db->query('SELECT id, name, content FROM todo WHERE id = '.$id);
    $donnees = $query->fetch(PDO::FETCH_ASSOC);
    return new Todo($donnees);
    }

  public function getList()
  {
    $todos= [];
    $query = $this->_db->query('SELECT id, name, content FROM todo');

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
    {
      $todos[] = new Todo($donnees);
    }

    return $todos;
  }

  public function update(Todo $todo)
  {
    $query = $this->_db->prepare('UPDATE todo SET name = :name, content = :content WHERE id = :id');

    $query->bindValue(':name', $todo->getName(), PDO::PARAM_INT);
    $query->bindValue(':content', $todo->getContent(), PDO::PARAM_INT);
    $query->bindValue(':id', $todo->getId(), PDO::PARAM_INT);
    $query->execute();
  }


  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

?>
