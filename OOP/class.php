<?php

class BankAccount {
    public $accountNumber;
    private $balance;

    public function getbalance(){  
        return $this->balance;

    }
    public function getaccountnumber(){
        return $this->accountNumber;
    }

    public function setbalance($balance){
        $this->balance = $balance;
    }

    public function deposit($amount){
        if($amount > 0){
            $this->balance += $amount;
        }
        return $this;
    }

    public function withdraw($amount){
        if($amount <= $this->balance){
            $this->balance -= $amount;
            return true;
        }else {
            echo "Insufficient funds. Withdrawal failed.<br>";
        }
        return false;
    }

}

class Customer
{
	private $name;

	public function setName($name)
	{
		$name = trim($name);

		if ($name == '') {
			return false;
		}
		$this->name = $name;

        return true;

	}

	public function getName()
	{
		return $this->name;
	}
}




