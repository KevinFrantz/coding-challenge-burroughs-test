<?php
namespace model\person;

/**
 *
 * @author kevinfrantz
 *        
 */
interface PersonInterface
{
    /**
     * @return int
     */
    public function getId():int;
    
    /**
     * @param int $id
     */
    public function setId(int $id):void;
    
    /**
     * @return string
     */
    public function getFirstName():string;
    
    /**
     * @param string $name
     */
    public function setFirstName(string $name):void;
    
    /**
     * @return string
     */
    public function getLastName():string;
    
    /**
     * @param string $name
     */
    public function setLastName(string $name):void;
}

