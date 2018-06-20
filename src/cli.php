<?php
use repository\SalesRepository;
use controller\PaymentController;
use generator\CsvGenerator;

require __DIR__. '/vendor/autoload.php';

echo "\n\nPAYMENT CALCULATOR\n\n";
    
if(count($argv)<=1){
    /**
     * Expanded Version:
     * This will print a function with all planed transactions
     * It's just there to show OOP, Clean Code and Testing Skills 
     */
    print("This script needs arguments.\n\n");
    echo "The first argument must contain the output file path. To let the standart programm run. \n\n";
    echo "If you don't pass an argument the following \"expanded\" testdata will be printed:\n\n";
    $data = new SalesRepository('../testdata/');
    $controller = new PaymentController($data->getAllEmployes());
    $controller->setStartDate(new DateTime());
    $controller->setEndDate((new DateTime())->modify('+ 1 year'));
    $controller->createJournal();
    $generator = new CsvGenerator($controller->getJournal());
    echo $generator->getJournalCsv();
}else{
    /**
     * Here is the solution to the tasks.  
     */
    include "quick_solution.php"; 
}
?>
