<?php
namespace model\payment;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author kevinfrantz
 *        
 */
class BonusPaymentCollection extends ArrayCollection implements BonusPaymentCollectionInterface
{
    /**
     * 
     * {@inheritDoc}
     * @see \model\payment\BonusPaymentCollectionInterface::getLastMonthBonuses()
     */
    public function getMonthBonuses(\DateTime $month): ArrayCollection
    {
        $monthBonuses = new ArrayCollection();
        /**
         * @var BonusPaymentInterface $bonus
         */
        foreach($this->getValues() as $bonus){
            $actualMonth = (int)$month->format('n');
            $bonusMonth = (int)$bonus->getDate()->format('n');
            if($actualMonth===$bonusMonth){
                $monthBonuses->add($bonus);
            }
        }
        return $monthBonuses;
    }

}
