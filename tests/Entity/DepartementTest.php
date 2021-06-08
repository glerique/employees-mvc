<?php

namespace App\Tests\Entity;

use App\Entity\Departement;
use PHPUnit\Framework\TestCase;

class DepartementTest extends TestCase

{
    public function testGetId()
    {
        $departement = new Departement();
        $this->assertEquals(null, $departement->getId());
    }

    public function testGetSetTitle()
    {
        $departement = new Departement();
        $departement->setName('Test departement');
        $this->assertEquals('Test departement', $departement->getName());
    }
}
