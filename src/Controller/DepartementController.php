<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Entity\Departement;
use App\Model\DepartementManager;



class DepartementController
{

    private $model;


    public function __construct()
    {
        $this->model = new DepartementManager();
    }

    public function index()
    {

        $departements = $this->model->findAll();
        
        Renderer::render("departement/listing", compact('departements'));
    }

    public function show(int $id)
    {
        $departement = $this->model->findById($id);
        Renderer::render("departement/details", compact('departement'));
    }

    public function newView()
    {        
        Renderer::render("departement/nouveau");
    }

    public function new()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
       

        $manager = $this->model;
        $departement = new Departement;
        $departement->setDepartement($name);
        $manager->add($departement);
    }

    public function editView(int $id)
    {
        $manager = $this->model;
        
        $departement = $manager->findById($id);
              
        Renderer::Render("departement/modifier", compact('departement'));
    }

    public function edit()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        

        $manager = $this->model;
        $departement = new Departement;
        $departement->setId($id);
        $departement->setDepartement($name);
        $manager->update($departement);    
    }

    public function delete(int $id)
    {
        $manager = $this->model;
        $departement = $manager->findById($id);
        $manager->deleteById($departement);
    }
    
}
