<?php

namespace App\Controller;

use App\Model\EmployeeManager;

class Controller
{

    public $model;

    public function __construct()
    {
        $this->model = new EmployeeManager();
    }

    public function invoke()
    {
        if (!isset($_GET['id'])) {
            $employees = $this->model->findAll();
            include 'src/View/listing.php';
        } else {
            $employee = $this->model->findById($_GET['id']);
            include 'src/View/details.php';
        }
    }
}
