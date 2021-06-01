<?php

namespace App\Model;

use PDO;
use Exception;
use PDOStatement;
use \App\Model\Bdd;
use App\Entity\Departement;



class DepartementManager
{

        private $db;

        public function __construct()
        {
                $this->db = Bdd::dbConnect();
        }

        
        public function findAll()
        {
                $req = $this->db->prepare('SELECT * FROM departement');
                $req->execute();
                $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Departement');
                $departements =  $req->fetchAll();
                return $departements;
        }

        public function findById($id)
        {
                
                $req = $this->db->prepare('SELECT * FROM departement WHERE id = :id');
                $req->bindValue(':id', (int)$id);
                $req->execute();
                $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Departement');
                $departement =  $req->fetch();
                return $departement;

                
        }

        public function add(Departement $departement)
        {
                $req = $this->db->prepare('INSERT INTO departement (name) 
                VALUES (:name)');                
                $req->bindvalue(':name', $departement->getName());
                $req->execute();
        }

        public function update(Departement $departement)
        {
                $req = $this->db->prepare('UPDATE departement SET  name = :name WHERE id = :id');                
                $req->bindvalue(':name', $departement->getName());
                $req->bindvalue(':id', $departement->getId());
                $req->execute();
        }

        public function deleteById(Departement $departement)
        {
                $req = $this->db->prepare('DELETE FROM departement WHERE id = :id');
                $req->bindvalue(':id', $departement->getId());
                $req->execute();
                
        }
}
