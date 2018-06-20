<?php
namespace model\payment;

use PHPUnit\Framework\TestCase;

/**
 *
 * @author kevinfrantz
 *        
 */
class BonusPaymentTest extends TestCase
{
    const AMOUNT = 1000;
    
    const DATE_TIME = '2001-01-01';
    
    /**
     * @var BonusPaymentInterface
     */
    protected $payment;
    
    protected function setUp():void{
        $this->payment = new BonusPayment();
        $this->payment->setAmount(self::AMOUNT);
        $this->payment->setDate(\Datetime::createFromFormat('Y-m-d', self::DATE_TIME));
    }
    
    public function testAmount(){
        $this->assertEquals($this->payment->getAmount(), self::AMOUNT);
    }
    
    public function testDate(){
        $this->assertEquals((\DateTime::createFromFormat('Y-m-d', self::DATE_TIME))->getTimestamp(),$this->payment->getDate()->getTimestamp());
    }
}

