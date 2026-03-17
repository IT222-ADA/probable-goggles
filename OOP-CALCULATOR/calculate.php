<?php 
include 'CalcClass.php';

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operation = $_POST['operation'];

if(isset($num1) && isset($num2) && isset($operation)){
    $calculator = new CalcClass($num1, $num2, $operation);
    $calculator->displayResult();
} else {
    echo "Please provide all inputs.";
}


