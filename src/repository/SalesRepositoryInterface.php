<?php
namespace repository;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author kevinfrantz
 *        
 */
interface SalesRepositoryInterface
{   
    /**
     * @return ArrayCollection
     */
    public function getAllEmployes():ArrayCollection;
}

