<?php
namespace controller;

use PHPUnit\Framework\TestCase;
use Doctrine\Common\Collections\ArrayCollection;
use model\payment\Payment;
use model\payment\BonusPaymentCollection;
use model\payment\BonusPayment;
use model\person\SalesPerson;

/**
 *
 * @author kevinfrantz
 *        
 */
class PaymentControllerTest extends TestCase
{
    /**
     * @var PaymentController
     */
    protected $controller;
    
    public function setUp(){
        $person1 = new SalesPerson();
        $person1->setFirstName('Dummer');
        $person1->setLastName('Dummy');
        $person1->setId(1);
        $person1->setSalary(new Payment(100));
        $person1->setBonuses(new BonusPaymentCollection(
            [
                new BonusPayment(1000, \DateTime::createFromFormat('Y-m-d', '2018-03-15')),
            new BonusPayment(1000, \DateTime::createFromFormat('Y-m-d', '2018-06-15')),
                new BonusPayment(1000, \DateTime::createFromFormat('Y-m-d', '2018-08-15')),
                new BonusPayment(1000, \DateTime::createFromFormat('Y-m-d', '2018-01-15')),
            ]
            )
            );
        $this->dummyData = new ArrayCollection(
            [
                $person1
            ]
            );
        $this->controller = new PaymentController($this->dummyData);
        $this->controller->setStartDate(\DateTime::createFromFormat('Y-m-d', '2018-01-01'));
        $this->controller->setEndDate(\DateTime::createFromFormat('Y-m-d', '2018-12-31'));
        $this->controller->createJournal();
    }
    
    public function testPrintResults():void{
        $this->controller->sortJournal();
        /**
         * @var PaymentJournalElementInterface $element
         */
        foreach($this->controller->getJournal() as $element){
            print('Datum: '.$element->getPaymentDate()->format("Y-m-d,F,l").' Catagory:'.$element->getPayment()->getCategorie().' Amount:'.$element->getPayment()->getAmount()."\n");
        }
    }
    
    public function testDayRoutineMidterm():void{
        $datetime = \DateTime::createFromFormat("Y-m-d", '2018-03-15');
        $this->assertEquals($this->controller::MIDTERM_ROUTINE, $this->controller->dayRoutine($datetime));
    }
    
    public function testDayRoutineLastDay():void{
        $datetime = \DateTime::createFromFormat("Y-m-d", '2018-01-31');
        $this->assertEquals($this->controller::LAST_DAY_ROUTINE, $this->controller->dayRoutine($datetime));
    }
    
    public function testGetDatetimeForLastDateSunday():void{
        $datetime = \DateTime::createFromFormat("Y-m-d", '2018-07-22');
        $day = $this->controller->getDatetimeForLastDate($datetime)->format('l');
        $this->assertEquals('Friday',$day);
    }
    
    public function testGetDatetimeForLastDateSaturday():void{
        $datetime = \DateTime::createFromFormat("Y-m-d", '2018-06-23');
        $day = $this->controller->getDatetimeForLastDate($datetime)->format('l');
        $this->assertEquals('Friday',$day);
    }
    
    public function testMidtermDateTimeSunday():void{
        $datetime = \DateTime::createFromFormat("Y-m-d", '2018-07-22');
        $day = $this->controller->getMidtermDateTime($datetime)->format('l');
        $this->assertEquals('Wednesday',$day);
    }
    
    public function testMidtermDateTimeSaturday():void{
        $datetime = \DateTime::createFromFormat("Y-m-d", '2018-06-23');
        $day = $this->controller->getMidtermDateTime($datetime)->format('l');
        $this->assertEquals('Wednesday',$day);
    }
}

