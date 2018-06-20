<?php
use controller\PaymentController;

error_reporting (0);

/**
 * Here is a fast quick solution for task  
 */
$lines = 'month_name,salary_payment_date,bonus_payment_date';
$date = new DateTime();
$month_count = 0;
$month_array = [];
for ($i=0;  $i<365; $i++){
    if(!array_key_exists($month_count, $month_array)){
        $month_array[$month_count] = [
            'name'=>$date->format('F')
        ];
    }
    if(PaymentController::dayRoutine($date)===PaymentController::LAST_DAY_ROUTINE){
        $month_array[$month_count]['fixed'] = PaymentController::getDatetimeForLastDate($date)->format("Y-m-d");
        $month_count++;
    }
    if(PaymentController::dayRoutine($date)===PaymentController::MIDTERM_ROUTINE){
        $month_array[$month_count]['bonus'] = PaymentController::getMidtermDateTime($date)->format("Y-m-d");
    }
    $date->modify("+ 1 day");
}

$lines = "month_name,bonus_payment_date,salary_payment_date\n";
for ($i=0;  $i<12; $i++){
    $lines .= $month_array[$i]['name'].','.$month_array[$i]['bonus'].','.$month_array[$i]['fixed']."\n";
}
echo "File will be created under \"".$argv[1]."\"...\n";
try{
    file_put_contents($argv[1],$lines);
    print("File successfull created!\n");
}catch(\Exception $exception){
    print("An Error occured!\n");
}
?>