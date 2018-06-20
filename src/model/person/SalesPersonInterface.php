<?php
namespace model\person;

use Doctrine\Common\Collections\ArrayCollection;
use model\payment\Payment;

/**
 *
 * @author kevinfrantz
 *        
 */
interface SalesPersonInterface extends PersonInterface
{
    /**
     * @return ArrayCollection
     */
    public function getBonuses():ArrayCollection;
    
    /**
     * @param ArrayCollection $bonuses
     */
    public function setBonuses(ArrayCollection $bonuses):void;
    
    /**
     * @param Payment $payment
     */
    public function setSalary(Payment $payment):void;

    /**
     * @return Payment
     */
    public function getSalary():Payment;
}

