<?php 
class CalcClass {
    public $num1;
    public $num2;
    public $calculation;

    public function __construct($num1,$num2,$calculation){
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->calculation = $calculation;
    }

    public function calculate(){
        switch($this->calculation){
            case 'add':
                return $this->num1 + $this->num2;
                break;
            case 'subtract':
                return $this->num1 - $this->num2;
                break;
            case 'multiply':
                return $this->num1 * $this->num2;
                break;
            case 'divide':
                if($this->num2 != 0){
                    return $this->num1 / $this->num2;
                } else {
                    return "Cannot divide by zero";
                }
                break;
            default:
                return "Invalid operation";
        }

        return $result;
    }

    public function displayResult(){
        $result = $this->calculate();
        echo "The result of the calculation is: " . $result;
    }
}