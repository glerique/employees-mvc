<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Model\EmployeeManager;


class Controller
{

    public $model;
    public $renderer;

    public function __construct()
    {
        $this->model = new EmployeeManager();
        
    }

    public function invoke()
    {
        if (!isset($_GET['id'])) {
            $employees = $this->model->findAll();            
            Renderer::render("listing", compact('employees'));
            //include 'src/View/listing.php';
        } else {
            $employee = $this->model->findById($_GET['id']);
            Renderer::render("details", compact('employee'));
            //include 'src/View/details.php';
        }
    }
}
