<?php
namespace model\person;

use model\payment\BonusPayment;
use Doctrine\Common\Collections\ArrayCollection;
use model\payment\BonusPaymentInterface;
use model\payment\PaymentInterface;
use PHPUnit\Framework\TestCase;

/**
 *
 * @author kevinfrantz
 *        
 */
class SalesPersonTest extends TestCase
{
    const FIRST_NAME = 'Max';
    
    const LAST_NAME = 'Müller';
    
    const ID = 5678;
    
    /**
     * 
     * @var SalesPersonInterface
     */
    protected $person;
    
    /**
     * 
     * @var PaymentInterface
     */
    protected $salary;
    
    /**
     * 
     * @var BonusPaymentInterface
     */
    protected $bonus;
    
    protected function setUp():void{
        $this->bonus = new BonusPayment();
        $this->salary = new BonusPayment();
        $this->person = new SalesPerson();
        $this->person->setBonuses(new ArrayCollection([$this->bonus]));
        $this->person->setFirstName(self::FIRST_NAME);
        $this->person->setLastName(self::LAST_NAME);
        $this->person->setId(self::ID);
        $this->person->setSalary($this->salary);
    }
    
    public function testId():void{
        $this->assertEquals(self::ID, $this->person->getId());
    }
    
    public function testFirstName():void{
        $this->assertEquals(self::FIRST_NAME, $this->person->getFirstName());
    }
    
    public function testLastName():void{
        $this->assertEquals(self::LAST_NAME, $this->person->getLastName());
    }
    
    public function testSalary():void{
        $this->assertEquals($this->salary, $this->person->getSalary());
    }
    
    public function testBonuses():void{
        $this->assertEquals($this->bonus, $this->person->getBonuses()->get(0));
    }
}

