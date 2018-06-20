# coding-challenge-burroughs-test

## Requirements by the recruting company

### Language
As language PHP should be used.

### requirements
When writing your Burroughs Test, you should create a small command-line utility to help a fictional company determine the dates on which they need to pay salaries to their Sales Department.
The company handles their Sales payroll in the following way:
- Sales staff get a regular fixed base monthly salary, plus a monthly bonus
- The base salaries are paid on the last day of the month, unless that day is a Saturday or a Sunday
(weekend). In that case, salaries are paid before the weekend. For the sake of this application, please do not take into account public holidays.
- On the 15th of every month bonuses are paid for the previous month, unless that day is a weekend. In that case, they are paid the first Wednesday after the 15th

### format of the application
The output of the utility should be a CSV file, containing the payment dates for the next twelve months.
The CSV file should contain a column for the month name, a column that contains the salary payment date for that month, and a column that contains the bonus payment date. The file name should be provided as an argument to the cli command.

## Manual

### Testing

Execute ""./test.sh"

### Execute

Execute "php ./src/cli.php" or ./start.sh if you want to use docker."

## Architekture

### Basic

To solve the basic task execute "php cli.sh outputfilename.csv"

### Expanded

Execute the programm without parameter. A journal of the planed transaktions for the next year will be printed.

This part is just there to show PHP, CleanCode and Testing Skills.
