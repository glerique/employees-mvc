<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Entity\Employee;
use App\Model\EmployeeManager;
use App\Model\DepartementManager;


class EmployeeController
{

    private $model;


    public function __construct()
    {
        $this->model = new EmployeeManager();
    }

    public function index()
    {

        $employees = $this->model->findAll();
        foreach ($employees as $employee)
        {
            $departementManager = new DepartementManager();
            $employee->setDepartement($departementManager->findById($employee->getDepartementId()));            
        }
        Renderer::render("employee/listing", compact('employees'));
    }

    public function show(int $id)
    {
        $employee = $this->model->findById($id);
        $departementManager = new DepartementManager();
        $employee->setDepartement($departementManager->findById($employee->getDepartementId())); 
        Renderer::render("employee/details", compact('employee'));
    }

    public function newView()
    {        
        $departementManager = new DepartementManager();
        $departements = $departementManager->findAll();
        Renderer::render("employee/nouveau", compact('departements'));
    }

    public function new()
    {
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $birth_date = filter_input(INPUT_POST, 'birth_date', FILTER_SANITIZE_SPECIAL_CHARS);;
        $hire_date = filter_input(INPUT_POST, 'hire_date', FILTER_SANITIZE_SPECIAL_CHARS);
        $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_SPECIAL_CHARS);
        $departementId = filter_input(INPUT_POST, 'departementId', FILTER_SANITIZE_SPECIAL_CHARS);

        $manager = $this->model;
        $employee = new Employee;
        $employee->setLastname($last_name);
        $employee->setFirstName($first_name);
        $employee->setBirthDate($birth_date);
        $employee->setHireDate($hire_date);
        $employee->setSalary($salary);
        $employee->setDepartementId($departementId);
        $manager->add($employee);
    }

    public function editView(int $id)
    {
        $manager = $this->model;
        $departementManager = new DepartementManager();
        $employee = $manager->findById($id);
        $departements = $departementManager->findAll();         
        Renderer::Render("employee/modifier", compact('employee','departements'));
    }

    public function edit()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $birth_date = filter_input(INPUT_POST, 'birth_date', FILTER_SANITIZE_SPECIAL_CHARS);;
        $hire_date = filter_input(INPUT_POST, 'hire_date', FILTER_SANITIZE_SPECIAL_CHARS);
        $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_SPECIAL_CHARS);
        $departementId = filter_input(INPUT_POST, 'departementId', FILTER_SANITIZE_SPECIAL_CHARS);

        $manager = $this->model;
        $employee = new Employee;
        $employee->setId($id);
        $employee->setLastName($last_name);
        $employee->setFirstName($first_name);
        $employee->setBirthDate($birth_date);
        $employee->setHireDate($hire_date);
        $employee->setSalary($salary);
        $employee->setDepartementId($departementId);
        $manager->update($employee);
    }

    public function delete(int $id)
    {
        $manager = $this->model;
        $employee = $manager->findById($id);
        $manager->deleteById($employee);
    }
}
