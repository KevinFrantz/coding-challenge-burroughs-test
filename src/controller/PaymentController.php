<?php
namespace controller;

use Doctrine\Common\Collections\ArrayCollection;
use model\journal\PaymentJournalElement;

/**
 * This class should be split up in minimum two classes more
 * That would garantie clean code and avoid sideeffects
 * I'm not happy with this solution. 
 * @author kevinfrantz
 *        
 */
class PaymentController implements PaymentControllerInterface
{
    const MIDTERM_ROUTINE = 1;
    
    const LAST_DAY_ROUTINE = 2;
    
    /**
     * @var ArrayCollection
     */
    private $employees;
    
    /**
     * @var ArrayCollection
     */
    
    private $journal;
    
    /**
     * 
     * @var \DateTime
     */
    private $startDate;
    
    /**
     * 
     * @var \DateTime
     */
    private $endDate;
    
    /**
     * @param ArrayCollection $employees
     */
    public function __construct(ArrayCollection $employees){
        $this->employees = $employees;
        $this->journal = new ArrayCollection();
    }
    
    /**
     * {@inheritDoc}
     * @see \controller\PaymentControllerInterface::getJournal()
     */
    public function getJournal(): ArrayCollection
    {
        return $this->journal;
    }
    
    /**
     * {@inheritDoc}
     * @see \controller\PaymentControllerInterface::setStartDate()
     */
    public function setStartDate(\DateTime $startdate): void
    {
        $this->startDate = $startdate;
    }

    public function sortJournal(): void
    {
        $iterator = $this->journal->getIterator();
        $iterator->uasort(function ($a,$b){
            return ($a->getPaymentDate() < $b->getPaymentDate() )? -1:1;
        });
        $this->journal = new ArrayCollection(iterator_to_array($iterator));
    }

    /**
     * 
     * {@inheritDoc}
     * @see \controller\PaymentControllerInterface::setEndDate()
     */
    public function setEndDate(\DateTime $enddate): void
    {
        $this->endDate = $enddate;
    }
    
    public function createJournal(): void
    {
        $tmpDate = clone $this->startDate;
        while($tmpDate<=$this->endDate){
            if($this->dayRoutine($tmpDate)===self::MIDTERM_ROUTINE){
                $this->midtermRoutine($tmpDate);
            }
            if($this->dayRoutine($tmpDate)===self::LAST_DAY_ROUTINE){
                $this->lastDayRoutine($tmpDate);
            }
            $tmpDate->modify('+ 1 day');
        }
    }
    
    /**
     * Declared this function as static to solve the original purpose.
     * This function has to be public for testing reasons. 
     * @param \DateTime $datetime
     */
    static public function dayRoutine(\DateTime $datetime):?int{
        if((int)$datetime->format('d')===15){
            return self::MIDTERM_ROUTINE;
        }
        if((int)$datetime->format('d')===(int)$datetime->format('t')){
            return self::LAST_DAY_ROUTINE;
        }
        return null;
    }

    /**
     * 
     * @param \Datetime $datetime
     */
    private function lastDayRoutine(\Datetime $datetime):void{
        $this->addSalaryFor($this->getDatetimeForLastDate($datetime));
    }
    
    /**
     * This function is public for testing reasons
     * @return \DateTime
     */
    static public function getDatetimeForLastDate(\DateTime $datetime):\DateTime{
        $tmpDatetime = clone $datetime;
        if($datetime->format('l')==='Sunday'){
            $tmpDatetime->modify('- 2 day');
        }
        if($datetime->format('l')==='Saturday'){
            $tmpDatetime->modify('- 1 day');
        }
        return $tmpDatetime;
    }
    
    /**
     * @param \DateTime $datetime
     */
    private function addSalaryFor(\DateTime $datetime):void {
        /**
         * @var SalesPersonInterface $employee
         */
        foreach($this->employees->getValues() as $employee){
            $this->journal->add(new PaymentJournalElement($employee,$employee->getSalary(),$datetime));
        }
    }
    
    /**
     * 
     * @param \Datetime $datetime
     */
    private function midtermRoutine(\Datetime $datetime):void{
        $this->addBonusFor($this->getMidtermDateTime($datetime));
    }
    
    /**
     * This function has to be public so that it can be tested
     * @param \DateTime $datetime
     * @return \DateTime
     */
    static public function getMidtermDateTime(\DateTime $datetime):\DateTime{
        $tmpDatetime = clone $datetime;
        if($datetime->format('l')==='Sunday'){
            $tmpDatetime->modify('+ 3 day');
        }
        if($datetime->format('l')==='Saturday'){
            $tmpDatetime->modify('+ 4 day');
        }
        return $tmpDatetime;
    }
    
    /**
     * 
     * @param \DateTime $datetime
     */
    private function addBonusFor(\DateTime $datetime):void{
        /**
         * @var SalesPersonInterface $employee
         */
        foreach($this->employees->getValues() as $employee){
            $previousMonth= clone $datetime;
            $previousMonth->modify('- 1 month');
            /**
             * @var BonusPaymentInterface $bonus
             */
            foreach ($employee->getBonuses()->getMonthBonuses($previousMonth)->getValues() as $bonus){
                $this->journal->add(new PaymentJournalElement($employee,$bonus,$datetime));
            }
        }
    }
}

