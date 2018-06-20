<?php
namespace model\journal;

use model\payment\PaymentInterface;
use model\person\PersonInterface;


/**
 *
 * @author kevinfrantz
 *        
 */
class PaymentJournalElement implements PaymentJournalElementInterface
{
    /**
     * @var \DateTime
     */
    protected $realDateTime;
    
    /**
     * @var PersonInterface
     */
    protected $person;
    
    /**
     * 
     * @var PaymentInterface
     */
    protected $payment;

    /**
     * @param PersonInterface $person
     * @param PaymentInterface $payment
     * @param \DateTime $date
     */
    public function __construct(?PersonInterface $person=null, ?PaymentInterface $payment=null, \DateTime $date=null){
        $this->person = $person;
        $this->realDateTime = $date;
        $this->payment = $payment;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \model\journal\PaymentJournalElementInterface::getPerson()
     */
    public function getPerson(): PersonInterface
    {
        return $this->person;
    }

    /**
     * {@inheritDoc}
     * @see \model\journal\PaymentJournalElementInterface::setPerson()
     */
    public function setPerson(PersonInterface $person)
    {
        $this->person = $person;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \model\journal\PaymentJournalElementInterface::getPayment()
     */
    public function getPayment(): PaymentInterface
    {
        return $this->payment;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \model\journal\PaymentJournalElementInterface::setPayment()
     */
    public function setPayment(PaymentInterface $payment): void
    {
        $this->payment = $payment;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \model\journal\PaymentJournalElementInterface::getPaymentDate()
     */
    public function getPaymentDate(): \DateTime
    {
        return $this->realDateTime;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \model\journal\PaymentJournalElementInterface::setPaymentDate()
     */
    public function setPaymentDate(\DateTime $realDate): void
    {
        $this->realDateTime = $realDate;
    }
}

