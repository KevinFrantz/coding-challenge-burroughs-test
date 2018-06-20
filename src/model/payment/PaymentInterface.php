<?php
namespace model\payment;

/**
 *
 * @author kevinfrantz
 *        
 */
interface PaymentInterface
{
    /**
     * Returns the amount in euros
     * @return int
     */
    public function getAmount():int;
    
    /**
     * Sets the amount in euros
     * @param int $amount
     */
    public function setAmount(int $amount):void;
    
    /**
     * Sets the categorie of the payment.
     * @return string
     */
    public function getCategorie():string;
    
    /**
     * Returns the categorie of the payment
     * @param string $categorie
     */
    public function setCatergorie(string $categorie):void;
}

