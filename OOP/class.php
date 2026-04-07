<?php
declare(strict_types=1);
trait Logger{
    public function log($message){
        $logEntry = date('Y-m-d h:i:s'). ':'.'('. __CLASS__ .')' . $message .PHP_EOL;
        file_put_contents('log.txt',$logEntry, FILE_APPEND);
    }
}
class Account{
    Use Logger;
    private $accountNumber;
    public function __construct($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        $this->log("new Account is created ". $accountNumber);
    }

    public function getaccountnumber(){
        return $this->accountNumber;
    }
}
class BankAccount {
    Use Logger;
    private float $balance;

    public function __construct(float $balance = 0)
    {
        $this->balance = $balance;
        $this->log("new BankAccount is created ");
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

class SavingAccount extends BankAccount{
    private $interestRate;

    public function __construct($balance, $interestRate){
        parent::__construct($balance);
        $this->interestRate = $interestRate;
    }

    public function getInterestRate(){
        return $this->interestRate;
    }

    public function addInterest(){
        $interest = $this->getbalance() * ($this->interestRate / 100);

        $this->transaction($interest, "deposit");
    }

    public function setInterestRate($interestRate){
        $this->interestRate = $interestRate;
    }
}

class CheckingAccount extends BankAccount{
    private $minBalance;

    public function __construct($balance, $minBalance)
    {
        parent::__construct($balance);
        $this->minBalance = $minBalance;
        
    }

    public function withdraw($amount){
        if($amount > 0 && ($this->getbalance() - $this->minBalance) >= $amount){
            $this->transaction($amount, "withdraw");
            return true;
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
    private $accounts = [];

    public function __construct($name,$email,$address,$contact)
    {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->contact = $contact;
        $this->accounts = [];
    }

    public function OpenAccount($account, $bankaccount){
        $this->accounts[] = ['account' => $account, 'bankaccount' => $bankaccount];
    }

    public function CloseAccount($accountToClose){
        foreach($this->accounts as $index => $accountData){
            if($accountData['account']->getaccountnumber() == $accountToClose->getaccountnumber()){
                unset($this->accounts[$index]);
                return true;
            }
        }
        return false;
    }

    public function getAccounts(){
        return $this->accounts ?? [];
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

class Bank{
    private $customers;

    public function __construct()
    {   
        $this->customers = [];
    }

    public function getCustomers(){
        return $this->customers;
    }

    public function verifyCustomer($customer){
        return in_array($customer, $this->customers);
    }

    public function addCustomer($customer){
        $this->customers[] = $customer;
    }

    public function removeCustomer($customer){
        $index = array_search($customer, $this->customers);
        if($index !== false){
            unset($this->customers[$index]);
            return true;
        }
        return false;
    }

    public function processTransaction($account, $amount){
        if($amount > 0){
            $account->transaction($amount,'deposit');
        }else {
            $account->transaction(abs($amount),'withdraw');
        }
    }
}




