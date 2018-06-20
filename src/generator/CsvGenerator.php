<?php
namespace generator;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author kevinfrantz
 *        
 */
class CsvGenerator implements GeneratorInterface
{
    /**
     * @var ArrayCollection
     */
    protected $journal;
    
    /**
     * @param ArrayCollection $journal
     */
    public function __construct(ArrayCollection $journal){
       $this->journal = $journal; 
    }
    
    public function getJournalCsv(): string
    {
        $result = 'date,firstname,lastname,payment_categorie,amount_eur'."\n";
        /**
         * @var PaymentJournalElement $payment
         */
        foreach ($this->journal->getValues() as $payment){
            $result .= $payment->getPaymentDate()->format('Y-m-d').",".$payment->getPerson()->getFirstName().','.$payment->getPerson()->getLastName().','.$payment->getPayment()->getCategorie().','.$payment->getPayment()->getAmount()."\n";
        }
        return $result;
    }

}

