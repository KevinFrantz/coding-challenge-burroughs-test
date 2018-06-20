<?php
namespace model\person;

use Doctrine\Common\Collections\ArrayCollection;
use model\payment\Payment;
use model\payment\BonusPaymentCollectionInterface;

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
    public function getBonuses():BonusPaymentCollectionInterface;
    
    /**
     * @param ArrayCollection $bonuses
     */
    public function setBonuses(BonusPaymentCollectionInterface $bonuses):void;
    
    /**
     * @param Payment $payment
     */
    public function setSalary(Payment $payment):void;

    /**
     * @return Payment
     */
    public function getSalary():Payment;
}

