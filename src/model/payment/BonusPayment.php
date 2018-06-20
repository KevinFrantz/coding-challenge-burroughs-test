<?php
namespace model\payment;

/**
 *
 * @author kevinfrantz
 *        
 */
class BonusPayment extends Payment implements BonusPaymentInterface
{
    /**
     * @var \DateTime
     */
    protected $date;
    
    /**
     * {@inheritDoc}
     * @see \model\payment\BonusPaymentInterface::setDate()
     */
    public function setDate(\DateTime $datetime): void
    {
        $this->date = $datetime;
    }

    /**
     * {@inheritDoc}
     * @see \model\payment\BonusPaymentInterface::getDate()
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }
}

