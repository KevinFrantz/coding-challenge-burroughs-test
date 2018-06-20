<?php
namespace model\payment;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Selectable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author kevinfrantz
 *        
 */
interface BonusPaymentCollectionInterface extends Collection,Selectable
{
    /**
     * Returns the Bonuses of the last month. 
     * @return ArrayCollection
     */
    public function getMonthBonuses(\DateTime $month):ArrayCollection;
}

