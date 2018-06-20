<?php
namespace model\payment;

/**
 *
 * @author kevinfrantz
 *        
 */
class Payment implements PaymentInterface
{
    
   /**
    * @var int
    */
    protected $amount;
    
    /**
     * {@inheritDoc}
     * @see \model\payment\PaymentInterface::setAmount()
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * {@inheritDoc}
     * @see \model\payment\PaymentInterface::getAmount()
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

}

