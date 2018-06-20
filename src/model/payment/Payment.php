<?php
namespace model\payment;

/**
 *
 * @author kevinfrantz
 *        
 */
class Payment implements PaymentInterface
{
    const CATEGORIE_SALARY = 'salary';
    
    /**
     * @var string
     */
    protected $categorie;
    
    /**
     * @param int $amount
     */
    public function __construct(?int $amount = null){
        $this->amount = $amount;
        /**
         * I would make an own salary objekt for salary if i would have the time for it ;)
         */
        $this->categorie = self::CATEGORIE_SALARY;
    }
    
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
    
    /**
     * 
     * {@inheritDoc}
     * @see \model\payment\PaymentInterface::getCategorie()
     */
    public function getCategorie(): string
    {
        return $this->categorie;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \model\payment\PaymentInterface::setCatergorie()
     */
    public function setCatergorie(string $categorie): void
    {
        $this->categorie = $categorie;
    }


}

