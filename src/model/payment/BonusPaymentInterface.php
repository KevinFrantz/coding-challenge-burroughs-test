<?php
namespace model\payment;

/**
 *
 * @author kevinfrantz
 *        
 */
interface BonusPaymentInterface extends PaymentInterface
{
    /**
     * @return \DateTime
     */
    public function getDate():\DateTime;
    
    /**
     * @param \DateTime $datetime
     */
    public function setDate(\DateTime $datetime):void;
}

