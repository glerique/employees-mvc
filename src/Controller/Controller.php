<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Entity\Employee;
use App\Model\EmployeeManager;


class Controller
{

    private $model;


    public function __construct()
    {
        $this->model = new EmployeeManager();
    }

    public function index()
    {

        $employees = $this->model->findAll();
        Renderer::render("listing", compact('employees'));
    }

    public function show()
    {
        $employee = $this->model->findById($_GET['id']);
        Renderer::render("details", compact('employee'));
    }

    public function newView()
    {
        Renderer::render("nouveau");
    }

    public function new()
    {
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $birth_date = filter_input(INPUT_POST, 'birth_date', FILTER_SANITIZE_SPECIAL_CHARS);;
        $hire_date = filter_input(INPUT_POST, 'hire_date', FILTER_SANITIZE_SPECIAL_CHARS);
        $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_SPECIAL_CHARS);
        $departement = filter_input(INPUT_POST, 'departement', FILTER_SANITIZE_SPECIAL_CHARS);

        $manager = $this->model;
        $employee = new Employee;
        $employee->setLastname($last_name);
        $employee->setFirstName($first_name);
        $employee->setBirthDate($birth_date);
        $employee->setHireDate($hire_date);
        $employee->setSalary($salary);
        $employee->setDepartement($departement);
        $manager->add($employee);
    }

    public function editView()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $manager = $this->model;
        $employee = $manager->findById($id);
        Renderer::Render("modifier", compact('employee'));
    }

    public function edit()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $birth_date = filter_input(INPUT_POST, 'birth_date', FILTER_SANITIZE_SPECIAL_CHARS);;
        $hire_date = filter_input(INPUT_POST, 'hire_date', FILTER_SANITIZE_SPECIAL_CHARS);
        $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_SPECIAL_CHARS);
        $departement = filter_input(INPUT_POST, 'departement', FILTER_SANITIZE_SPECIAL_CHARS);

        $manager = $this->model;
        $employee = new Employee;
        $employee->setId($id);
        $employee->setLastName($last_name);
        $employee->setFirstName($first_name);
        $employee->setBirthDate($birth_date);
        $employee->setHireDate($hire_date);
        $employee->setSalary($salary);
        $employee->setDepartement($departement);
        $manager->update($employee);
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $manager = $this->model;
        $employee = $manager->findById($id);
        $manager->deleteById($employee);
    }
}
