<?php

namespace App\Controller;

use App\Lib\Renderer;
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

    public function show(){
        $employee = $this->model->findById($_GET['id']);
        Renderer::render("details", compact('employee'));

    }
}
