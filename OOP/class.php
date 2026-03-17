<?php

class Account{
    private $accountNumber;
    public function __construct($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    public function getaccountnumber(){
        return $this->accountNumber;
    }
}
class BankAccount {

    private $balance;

    public function __construct($balance = 0)
    {
        $this->balance = $balance;
    }

    public function getbalance(){  
        return $this->balance;

    }
    
    private function deposit($amount){
        if($amount > 0){
            $this->balance += $amount;
        }
        return $this;
    }

    private function withdraw($amount){
        if($amount <= $this->balance){
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function transaction($amount, $type){
        if($type == 'deposit'){
            return $this->deposit($amount);
        } elseif($type == 'withdraw'){
            return $this->withdraw($amount);
        }
        return false;
    }

}

class Customer
{
	private $name;
	private $email;
	private $address;
	private $contact;

    public function __construct($name,$email,$address,$contact)
    {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->contact = $contact;
    }

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

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

     public function getContact()
    {
        return $this->contact;
    }
}




