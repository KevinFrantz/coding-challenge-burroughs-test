<?php
namespace model\journal;

use PHPUnit\Framework\TestCase;
use model\person\PersonInterface;
use model\payment\PaymentInterface;
use model\payment\Payment;
use model\person\Person;

/**
 *
 * @author kevinfrantz
 *        
 */
class PaymentJournalElementTest extends TestCase
{
    /**
     * 
     * @var PaymentJournalElementInterface
     */
    protected $element;
    
    /**
     * @var PersonInterface
     */
    protected $person;
    
    /**
     * @var PaymentInterface
     */
    protected $payment;
    
    /**
     * 
     * @var \DateTime
     */
    protected $date;
    
    protected function setUp():void{
        $this->element = new PaymentJournalElement();
        $this->date = new \DateTime();
        $this->element->setPaymentDate($this->date);
        $this->payment= new Payment();
        $this->element->setPayment($this->payment);
        $this->person = new Person();
        $this->element->setPerson($this->person);
    }
    
    public function testPerson():void{
        $this->assertEquals($this->person, $this->element->getPerson());
    }
    
    public function testPayment():void{
        $this->assertEquals($this->payment, $this->element->getPayment());
    }
    
    public function testDate():void{
        $this->assertEquals($this->date, $this->element->getPaymentDate());
    }
}

