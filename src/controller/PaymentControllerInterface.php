<?php
namespace controller;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author kevinfrantz
 *        
 */
interface PaymentControllerInterface
{   
    /**
     * @return ArrayCollection
     */
    public function getJournal():ArrayCollection;
    
    /**
     * 
     * @param \DateTime $startdate
     */
    public function setStartDate(\DateTime $startdate):void;
    
    /**
     * 
     * @param \DateTime $enddate
     */
    public function setEndDate(\DateTime $enddate):void;
    
    
    public function sortJournal():void;
    
    public function createJournal():void;
}

