<?php

namespace App\Model;

use PDO;
use \App\Model\Bdd;
use App\Model\Model;
use App\Entity\Departement;



class DepartementManager extends Model
{
        protected $table = 'departement';
        protected $class  = 'App\Entity\Departement';


        public function findById($id)
        {

                $req = $this->db->prepare('SELECT * FROM departement WHERE id = :id');
                $req->bindValue(':id', (int)$id);
                $req->execute();
                $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Departement');
                return $req->fetch();
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
                $req = $this->db->prepare('DELETE FROM employee WHERE id = :id');
                $req->bindvalue(':id', $departement->getId());
                $req->execute();
        }
}
