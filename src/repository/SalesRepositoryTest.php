<?php
namespace repository;

use PHPUnit\Framework\TestCase;
use model\person\SalesPersonInterface;

/**
 * Executes some basic test for code stability
 *
 * @author kevinfrantz
 *        
 */
class SalesRepositoryTest extends TestCase
{

    /**
     *
     * @var SalesRepository
     */
    protected $repository;

    /**
     *
     * @var SalesPersonInterface
     */
    protected $firstperson;

    protected function setUp(): void
    {
        $this->repository = new SalesRepository('../testdata/');
        $this->firstPerson = $this->repository->getAllEmployes()->get(0);
    }

    public function testFirstPersonFirstName(): void
    {
        $this->assertEquals('Seth', $this->firstPerson->getFirstName());
    }

    public function testFirstPersonLastName(): void
    {
        $this->assertEquals('Lamb', $this->firstPerson->getLastName());
    }

    public function testFirstPersonId(): void
    {
        $this->assertEquals(1, $this->firstPerson->getId());
    }

    public function testFirstPersonSalary(): void
    {
        $this->assertEquals(50000, $this->firstPerson->getSalary()
            ->getAmount());
    }

    public function testFirstPersonBonus(): void
    {
        #var_dump($this->firstPerson->getBonuses()->get(0));
        $this->assertEquals(1000, $this->firstPerson->getBonuses()
            ->get(0)
            ->getAmount());
    }

    public function testElementAmount(): void
    {
        $this->assertEquals(10, $this->repository->getAllEmployes()
            ->count());
    }
}

