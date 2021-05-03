<?php

namespace App\Model;

use PDO;
use \App\Model\Bdd;



class EmployeeManager
{

        private $db;

        public function __construct()
        {
                $this->db = Bdd::dbConnect();
        }

        public function findAll()
        {
                $req = $this->db->query('SELECT * FROM employee');
                $req->execute();
                $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Employee');
                $employees =  $req->fetchAll();
                return $employees;
        }

        public function findById($id)
        {

                $req = $this->db->prepare('SELECT * FROM employee WHERE id = :id');

                $req->bindValue(':id', (int)$id);
                $req->execute();
                $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Employee');
                $employee =  $req->fetch();
                return $employee;
        }
}
