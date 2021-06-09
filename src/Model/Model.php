<?php

namespace App\Model;

use PDO;

abstract class Model
{

    protected $db;
    protected $table;
    protected $class;

    public function __construct()
    {
        $this->db = Bdd::dbConnect();
    }



    public function count()
    {
        $query = $this->db->prepare("SELECT COUNT(*) FROM $this->table");
        $query->execute();
        return $query->fetchColumn();
    }

    public function findAll()
    {
        $req = $this->db->prepare("SELECT * FROM $this->table");
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, "$this->class");
        return $req->fetchAll();
    }
}
