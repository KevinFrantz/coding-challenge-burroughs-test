<?php
namespace model\person;

use Doctrine\Common\Collections\ArrayCollection;
use model\payment\Payment;

/**
 *
 * @author kevinfrantz
 *        
 */
class SalesPerson extends Person implements SalesPersonInterface
{
    /**
     * @var ArrayCollection
     */
    protected $bonuses;
    
    /**
     * @var Payment
     */
    protected $salary;
    
    /**
     * {@inheritDoc}
     * @see \model\person\SalesPersonInterface::getBonuses()
     */
    public function getBonuses(): ArrayCollection
    {
        return $this->bonuses;
    }

    /**
     * {@inheritDoc}
     * @see \model\person\SalesPersonInterface::setBonuses()
     */
    public function setBonuses(ArrayCollection $bonuses): void
    {
        $this->bonuses = $bonuses;
    }
    
    /**
     * {@inheritDoc}
     * @see \model\person\SalesPersonInterface::getSalary()
     */
    public function getSalary(): Payment
    {
        return $this->salary;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \model\person\SalesPersonInterface::setSalary()
     */
    public function setSalary(Payment $payment): void
    {
        $this->salary = $payment;
    }


}

