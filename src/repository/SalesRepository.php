<?php
namespace repository;

use model\person\PersonInterface;
use League\Csv\Reader;
use model\payment\PaymentInterface;
use Doctrine\Common\Collections\ArrayCollection;
use model\person\SalesPersonInterface;
use model\person\Person;
use model\payment\Payment;
use model\payment\BonusPayment;

/**
 *
 * @author kevinfrantz
 *        
 */
final class SalesRepository implements SalesRepositoryInterface
{
    const DEPARTMENT = 'sales';
    
    /**
     * @var Reader
     */
    private $salary;
    
    /**
     * @var Reader
     */
    private $employee;
    
    /**
     * @var Reader
     */
    private $bonus;
    
    /**
     * @param string $dataDirectory
     */
    public function __construct(string $dataDirectory){
       $this->bonus = Reader::createFromPath($dataDirectory.'bonus.csv');
       $this->bonus->setHeaderOffset(0);
       $this->salary = Reader::createFromPath($dataDirectory.'salary.csv');
       $this->salary->setHeaderOffset(0);
       $this->employee = Reader::createFromPath($dataDirectory.'employee.csv');
       $this->employee->setHeaderOffset(0);
    }
    
    /**
     * @param int $personId
     * @return PaymentInterface
     */
    private function getSalaryFor(int $personId):PaymentInterface{
        foreach ($this->salary->getRecords() as $salary){
            if((int)$salary['employee_id']===$personId){
                $salaryObject = new Payment();
                $salaryObject->setAmount($salary['amount_euro']);
                return $salaryObject;
            }
        }
        throw new \Exception('No salary defined for user with id: '.$personId);
    }
    
    /**
     * @param int $personId
     * @return ArrayCollection
     */
    private function getBonusesFor(int $personId):ArrayCollection{
       $bonuses = new ArrayCollection();
       foreach ($this->bonus->getRecords() as $bonus){
           if((int)$bonus['employee_id'] === $personId){
               $bonusObject = new BonusPayment();
               $bonusObject->setAmount((int)$bonus['amount_euro']);
               $bonusObject->setDate(\DateTime::createFromFormat('Y-m-d', $bonus['date']));
               $bonuses->add($bonusObject);
           }
       }
       return $bonuses;
    }
    
    /**
     * @return PersonInterface
     */
    public function getAllEmployes(): ArrayCollection
    {
        $employees = new ArrayCollection();
        foreach($this->employee->getRecords() as $employee){
            if($employee['department']===self::DEPARTMENT){
                $employees->add($this->generateEmployee($employee));
            }
        }
        return $employees;
    }

    /**
     * @param int $id
     * @return PersonInterface
     */
    private function generateEmployee(array $employee): SalesPersonInterface
    {
        $employeeObject = Person::createSales();
        $employeeObject->setId($employee['id']);
        $employeeObject->setBonuses($this->getBonusesFor($employee['id']));
        $employeeObject->setSalary($this->getSalaryFor($employee['id']));
        $employeeObject->setFirstName($employee['first']);
        $employeeObject->setLastName($employee['last']);
        return $employeeObject;
    }
}

