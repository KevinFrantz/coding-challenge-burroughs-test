<?php
namespace model\person;

/**
 * Containes the values of an abstract person and the methods to create a special person
 * @author kevinfrantz
 *        
 */
class Person implements PersonInterface
{
    /**
     * @var string
     */
    protected $firstname;
    
    /**
     * @var string
     */
    protected $lastname;
    
    /**
     * @var int
     */
    protected $id;

    /**
     * {@inheritDoc}
     * @see \model\person\PersonInterface::setId()
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     * @see \model\person\PersonInterface::getId()
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return SalesPerson
     */
    public static function createSales():SalesPerson{
        return new SalesPerson();
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \model\person\PersonInterface::setLastName()
     */
    public function setLastName(string $name): void
    {
        $this->lastname = $name;
    }

    /**
     * {@inheritDoc}
     * @see \model\person\PersonInterface::setFirstName()
     */
    public function setFirstName(string $name): void
    {
        $this->firstname = $name;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \model\person\PersonInterface::getFirstName()
     */
    public function getFirstName(): string
    {
        return $this->firstname;
    }

    /**
     * {@inheritDoc}
     * @see \model\person\PersonInterface::getLastName()
     */
    public function getLastName(): string
    {
        return $this->lastname;
    }

}

