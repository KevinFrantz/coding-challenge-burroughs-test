<?php
namespace model\payment;

use PHPUnit\Framework\TestCase;

/**
 *
 * @author kevinfrantz
 *        
 */
class BonusPaymentCollectionTest extends TestCase
{
    /**
     * 
     * @var BonusPaymentCollectionInterface
     */
    protected $collection;
    
    /**
     * 
     * @var \DateTime
     */
    protected $month;
    
    public function setUp():void{
        $this->collection = new BonusPaymentCollection(
            [new BonusPayment(1234,\DateTime::createFromFormat('Y-m-d', '2018-01-30')),
                new BonusPayment(8910,\DateTime::createFromFormat('Y-m-d', '2018-02-01')),
                new BonusPayment(1112,\DateTime::createFromFormat('Y-m-d', '2018-02-25')),
                new BonusPayment(1314,\DateTime::createFromFormat('Y-m-d', '2018-03-01')),
            ]
            );
        $this->month = \DateTime::createFromFormat('Y-m-d', '2018-02-15');
        
    }
    
    public function testAmount():void{
        $this->assertEquals(2, $this->collection->getMonthBonuses($this->month)->count());
    }
    
    public function testFirstElementAmount():void{
        $expected = (int)8910;
        $result = (int)($this->collection->getMonthBonuses($this->month)->get(0)->getAmount());
        $this->assertEquals($expected, $result);
        
    }
}

