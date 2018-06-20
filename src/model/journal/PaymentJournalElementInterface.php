<?php
namespace model\journal;


use model\person\PersonInterface;
use model\payment\PaymentInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
interface PaymentJournalElementInterface
{
    /**
     * @return PersonInterface
     */
    public function getPerson(): PersonInterface;
    
    /**
     * @param PersonInterface $person
     */
    public function setPerson(PersonInterface $person);
    
    /**
     * Returns the date when the transaction will be done. 
     * @return \DateTime
     */
    public function getPaymentDate(): \DateTime; 
    
    /**
     * 
     * @param \DateTime $realDate
     */
    public function setPaymentDate(\DateTime $realDate):void; 
    
    /**
     * 
     * @param PaymentInterface $payment
     */
    public function setPayment(PaymentInterface $payment):void;
    
    /**
     * 
     * @return PaymentInterface
     */
    public function getPayment():PaymentInterface;
}

