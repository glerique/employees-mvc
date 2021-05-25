<?php

namespace App\Model;

use PDO;
use \App\Model\Bdd;
use App\Entity\Employee;



class EmployeeManager
{

        private $db;

        public function __construct()
        {
                $this->db = Bdd::dbConnect();
        }

        
        public function findAll()
        {
                $req = $this->db->prepare('SELECT id, last_name, first_name, DATE_FORMAT(birth_date, "%d/%m/%Y") AS birth_date,
                                                         DATE_FORMAT(hire_date, "%d/%m/%Y") AS hire_date, salary, departement FROM employee');
                $req->execute();
                $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Employee');
                $employees =  $req->fetchAll();
                return $employees;
        }

        public function findById($id)
        {

                $req = $this->db->prepare('SELECT id, last_name, first_name, birth_date, hire_date, salary, departement FROM employee WHERE id = :id');
                $req->bindValue(':id', (int)$id);
                $req->execute();
                $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Employee');
                $employee =  $req->fetch();
                return $employee;
        }

        public function add(Employee $employee)
        {
                $req = $this->db->prepare('INSERT INTO employee (last_name, first_name, birth_date, hire_date, salary, departement) 
                VALUES (:last_name, :first_name, :birth_date, :hire_date, :salary, :departement)');
                $req->bindvalue(':last_name', $employee->getLastName());
                $req->bindvalue(':first_name', $employee->getFirstName());
                $req->bindvalue(':birth_date', $employee->getBirthDate());
                $req->bindvalue(':hire_date', $employee->getHiredate());
                $req->bindvalue(':salary', $employee->getSalary());
                $req->bindvalue(':departement', $employee->getDepartement());
                $req->execute();
        }

        public function update(Employee $employee)
        {
                $req = $this->db->prepare('UPDATE employee SET last_name = :last_name, first_name = :first_name, birth_date = :birth_date,   
                                                 hire_date = :hire_date, salary = :salary, departement = :departement WHERE id = :id');
                $req->bindvalue(':last_name', $employee->getLastName());
                $req->bindvalue(':first_name', $employee->getFirstName());
                $req->bindvalue(':birth_date', $employee->getBirthDate());
                $req->bindvalue(':hire_date', $employee->getHiredate());
                $req->bindvalue(':salary', $employee->getSalary());
                $req->bindvalue(':departement', $employee->getDepartement());
                $req->bindvalue(':id', $employee->getId());
                $req->execute();
        }

        public function deleteById(Employee $employee)
        {
                $req = $this->db->prepare('DELETE FROM employee WHERE id = :id');
                $req->bindvalue(':id', $employee->getId());
                $req->execute();
                
        }
}
