<?php 
include 'CalcClass.php';

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operation = $_POST['operation'];

$calculator = new CalcClass($num1, $num2, $operation);

$calculator->displayResult();

